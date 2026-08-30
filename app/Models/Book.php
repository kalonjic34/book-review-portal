<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['review', 'rating'];

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function scopeTitle(Builder $query, string $title): Builder{
        return $query->where('title','LIKE','%'. $title. '%');
    }

    public function scopePopular(Builder $query, $from = null, $to = null):Builder{
        return $query->withCount([
            'reviews'=> fn(Builder $q) => $this->dateRangeFilter($q,$from, $to)
        ])->withAvg([
            'reviews'=> fn(Builder $q) => $this->dateRangeFilter($q,$from, $to)
        ],'rating')
        ->orderBy('reviews_count','desc');
    }

    public function scopeHighestRated(Builder $query, $from = null, $to = null): Builder
    {
        return $query->withCount([
            'reviews'=> fn(Builder $q) => $this->dateRangeFilter($q,$from, $to)
        ])->withAvg([
            'reviews'=> fn(Builder $q) => $this->dateRangeFilter($q,$from, $to)
        ],'rating')
        ->orderBy('reviews_avg_rating','desc');
    }

    public function scopeMinReviews(Builder $query, int $minReviews, $from = null, $to = null): Builder
    {
        return $query->whereHas('reviews', function (Builder $reviewQuery) use ($from, $to) {
            $this->dateRangeFilter($reviewQuery, $from, $to);
        }, '>=', $minReviews);
    }

    private function dateRangeFilter(Builder $query, $from = null, $to = null): Builder {
        if ($from && !$to) {
            $query->where('created_at','>=',$from);
        } elseif (!$from && $to) {
            $query->where('created_at','<=',$to);
        } elseif ($from && $to) {
            $query->whereBetween('created_at',[$from, $to]);
        }
        return $query;
    }
    
    public function scopePopularLastMonth(Builder $query): Builder {
        $from = now()->subMonth();

        return $query->popular($from, now())->minReviews(2, $from, now());
    }
    
    public function scopePopularLast6Month(Builder $query): Builder {
        $from = now()->subMonths(6);

        return $query->popular($from, now())->minReviews(5, $from, now());
    }
    
    public function scopeHighestRatedLastMonth(Builder $query): Builder {
        $from = now()->subMonth();

        return $query->highestRated($from, now())->minReviews(2, $from, now());
    }
    
    public function scopeHighestRatedLast6Months(Builder $query): Builder {
        $from = now()->subMonths(6);

        return $query->highestRated($from, now())->minReviews(5, $from, now());
    }
    }

