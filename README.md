# Book Review Portal

A simple **book review web application built with Laravel**. The application allows users to browse a collection of books, search for specific titles, explore books by popularity or rating, view individual book details, and submit reviews with ratings.

This project was built as a practical Laravel project to develop experience with **Eloquent relationships, query scopes, database-driven filtering, form validation, Blade templates, caching, and Laravel resource routing**.

## Features

* Browse available books
* Search books by title
* View individual book details
* Read reviews for each book
* Submit reviews for books
* Rate books from 1–5
* Display average book ratings
* Display the number of reviews
* Sort by recently added books
* Find popular books from the last month
* Find popular books from the last 6 months
* Find highest-rated books from the last month
* Find highest-rated books from the last 6 months
* Validation for submitted reviews
* Eloquent model relationships
* Database-backed caching

## Tech Stack

* **PHP 8.3+**
* **Laravel 13**
* **Blade**
* **Eloquent ORM**
* **SQLite**
* **Tailwind CSS**
* **Alpine.js**
* **Vite**
* **Composer**
* **npm**

The project currently requires PHP `^8.3` and Laravel `^13.17`.

## How It Works

The application is built around two main models:

* `Book`
* `Review`

A **Book** can have many reviews, while each **Review** belongs to a single book. This relationship is handled using Laravel's Eloquent ORM.

### Books

The book listing supports searching and several different filtering options.

Users can search for a book by title and filter results by:

* Most popular in the last month
* Most popular in the last 6 months
* Highest rated in the last month
* Highest rated in the last 6 months
* Latest books by default

The `Book` model contains reusable Eloquent query scopes for these operations.

### Reviews

Users can open a book and submit a review containing:

* Review text
* Rating from 1–5

Reviews must contain at least 15 characters, while ratings must be an integer between 1 and 5. After submission, the user is redirected back to the relevant book page.

## Rating System

Book ratings are calculated from the ratings submitted by users.

The application uses Eloquent's `withAvg()` functionality to calculate the average rating and `withCount()` to calculate the number of reviews associated with a book. These values are then available to the views for displaying book statistics.

## Filtering & Sorting

One of the main features of the project is the ability to retrieve books based on different criteria.

### Search by Title

The application uses a custom Eloquent scope to search for titles:

```php
Book::query()->title($title);
```

The search performs a partial match, meaning searching for part of a title can return matching books.

### Popular Books

The application can determine popularity based on the number of reviews a book has received.

For example, the **popular last month** filter considers books with at least two reviews during the previous month. The six-month version requires at least five reviews during that period.

### Highest Rated Books

The application can also sort books according to their average rating.

The time-based highest-rated filters use the same review-count requirements as the popularity filters to help prevent books with very few reviews from dominating the results.

## Caching

The application includes cache invalidation for books and reviews.

When a book is updated or deleted, its associated cache entry is cleared. Likewise, when a review is created, updated, or deleted, the cache for its associated book is invalidated.

This helps ensure that cached book information doesn't become stale after review changes.

## Routes

The application uses Laravel resource routing.

| Method | Route                          | Purpose                      |
| ------ | ------------------------------ | ---------------------------- |
| GET    | `/`                            | Redirects to the books index |
| GET    | `/books`                       | Display the book collection  |
| GET    | `/books/{book}`                | Display a specific book      |
| GET    | `/books/{book}/reviews/create` | Display the review form      |
| POST   | `/books/{book}/reviews`        | Submit a review              |

The review routes use scoped route model binding so that reviews are associated with their corresponding books.

## Project Structure

```text
book-review-portal/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── BookController.php
│   │       └── ReviewController.php
│   │
│   ├── Models/
│   │   ├── Book.php
│   │   ├── Review.php
│   │   └── User.php
│   │
│   └── Providers/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   └── web.php
│
├── storage/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── package.json
└── vite.config.js
```

The repository follows Laravel's standard application structure, with controllers under `app/Http/Controllers`, models under `app/Models`, database migrations and seeders under `database`, and Blade views under `resources/views`.

## Getting Started

### Prerequisites

Make sure you have the following installed:

* PHP 8.3 or higher
* Composer
* Node.js
* npm
* SQLite

### 1. Clone the Repository

```bash
git clone https://github.com/kalonjic34/book-review-portal.git
cd book-review-portal
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Create the Environment File

```bash
cp .env.example .env
```

On Windows Command Prompt:

```cmd
copy .env.example .env
```

### 4. Generate the Application Key

```bash
php artisan key:generate
```

### 5. Create the SQLite Database

If the SQLite database does not already exist, create an empty database file:

```bash
touch database/database.sqlite
```

On Windows Command Prompt:

```cmd
type nul > database\database.sqlite
```

### 6. Run the Migrations

```bash
php artisan migrate
```

### 7. Install Frontend Dependencies

```bash
npm install
```

### 8. Start the Application

Run the Laravel development server:

```bash
php artisan serve
```

Then visit:

```text
http://127.0.0.1:8000
```

For frontend development, run:

```bash
npm run dev
```

## Quick Setup

The project also includes a Composer setup script that can automate much of the installation process:

```bash
composer run setup
```

The setup script installs Composer dependencies, creates the `.env` file when necessary, generates the application key, runs migrations, installs npm dependencies, and builds the frontend assets.

## Example Workflow

A typical user workflow looks like this:

```text
Browse Books
     ↓
Search / Filter
     ↓
Select a Book
     ↓
Read Existing Reviews
     ↓
Submit a Review
     ↓
Give a Rating (1–5)
     ↓
Return to Book Details
     ↓
Updated Rating & Review Count
```

## What I Learned

This project provided practical experience with several Laravel concepts:

* Laravel project structure
* Resource controllers
* Resource routing
* Route model binding
* Scoped route model binding
* Blade templates
* Eloquent ORM
* Eloquent relationships
* One-to-many relationships
* Query scopes
* Database migrations
* Form validation
* Aggregate queries
* Average calculations
* Review counts
* Conditional filtering
* Date-based queries
* Laravel caching
* Cache invalidation
* Tailwind CSS
* Vite
* SQLite

## Future Improvements

Possible improvements for future versions include:

* User authentication
* User-specific reviews
* Edit and delete reviews
* User profiles
* Book cover images
* Genres and categories
* Pagination
* Advanced search
* Multiple sorting options
* Favorite books
* Reading lists
* Review likes
* Review comments
* REST API endpoints
* Improved automated testing
* Admin dashboard
* External book API integration

## License

This project is intended as a learning and portfolio project.

---

**Built with Laravel, PHP, Blade, Eloquent, SQLite, Tailwind CSS, and Alpine.js.**
