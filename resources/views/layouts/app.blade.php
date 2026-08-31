<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Reviews</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

  {{-- blade-formatter-disable --}}
  <style type="text/tailwindcss">
    :root {
      --ink: #17202a;
      --muted: #66727d;
      --paper: #f7f5f0;
      --surface: #fffdf9;
      --line: #e7e1d7;
      --accent: #bd5b3c;
      --accent-dark: #913e29;
      --gold: #c99128;
    }

    * {
      letter-spacing: 0;
    }

    body {
      @apply text-slate-900 antialiased;
      background-color: var(--paper);
      background-image: radial-gradient(#ded7cc 0.7px, transparent 0.7px);
      background-size: 18px 18px;
      font-family: 'DM Sans', sans-serif;
    }

    .btn {
      @apply inline-flex items-center justify-center rounded-md px-4 py-2 text-center text-sm font-semibold h-11 transition-all duration-200;
      background: var(--surface);
      color: var(--ink);
      border: 1px solid var(--line);
      box-shadow: 0 2px 5px rgba(35, 31, 25, 0.04);
    }

    .btn-primary {
      background: var(--accent);
      color: white;
      border-color: var(--accent);
    }

    .btn:hover {
      transform: translateY(-1px);
      border-color: #c9bcae;
      box-shadow: 0 5px 12px rgba(35, 31, 25, 0.08);
    }

    .btn-primary:hover {
      background: var(--accent-dark);
      border-color: var(--accent-dark);
    }

    .input {
      @apply w-full rounded-md px-3 py-2 leading-tight transition-all duration-200;
      background: rgba(255, 253, 249, 0.9);
      color: var(--ink);
      border: 1px solid var(--line);
      box-shadow: inset 0 1px 2px rgba(35, 31, 25, 0.03);
    }

    .input:focus {
      outline: none;
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(189, 91, 60, 0.12);
    }

    .filter-container {
      @apply mb-6 flex flex-wrap gap-2 rounded-lg p-2;
      background: rgba(255, 253, 249, 0.76);
      border: 1px solid var(--line);
    }

    .filter-item {
      @apply flex flex-1 items-center justify-center rounded-md px-3 py-2 text-center text-sm font-semibold transition-colors duration-200;
      min-width: 130px;
      color: var(--muted);
    }

    .filter-item-active {
      @apply flex flex-1 items-center justify-center rounded-md px-3 py-2 text-center text-sm font-semibold;
      min-width: 130px;
      color: var(--accent-dark);
      background: #f4e2d9;
      box-shadow: 0 1px 2px rgba(35, 31, 25, 0.05);
    }

    .book-item {
      @apply rounded-lg p-5 text-sm leading-6 transition-all duration-200;
      background: rgba(255, 253, 249, 0.94);
      border: 1px solid var(--line);
      box-shadow: 0 4px 12px rgba(35, 31, 25, 0.05);
    }

    .book-item:hover {
      transform: translateY(-2px);
      border-color: #d2c5b6;
      box-shadow: 0 9px 20px rgba(35, 31, 25, 0.08);
    }

    .book-title {
      @apply text-lg font-semibold transition-colors duration-200;
      color: var(--ink);
      font-family: 'Playfair Display', Georgia, serif;
    }

    .book-author {
      @apply block text-sm;
      color: var(--muted);
    }

    .book-rating {
      @apply text-sm font-semibold;
      color: var(--gold);
    }

    .book-review-count {
      @apply text-xs;
      color: var(--muted);
    }

    .empty-book-item {
      @apply rounded-lg px-4 py-12 text-center text-sm leading-6;
      background: rgba(255, 253, 249, 0.94);
      border: 1px solid var(--line);
    }

    .empty-text {
      @apply font-medium;
      color: var(--muted);
    }

    .reset-link {
      @apply font-semibold underline transition-colors duration-200;
      color: var(--accent);
    }

    .header {
      @apply mb-8;
      background: var(--ink);
      color: #fffaf2;
      border-bottom: 4px solid var(--accent);
    }

    .header-content {
      @apply container mx-auto flex max-w-3xl items-end justify-between px-4 py-7;
    }

    .header-title {
      @apply text-3xl font-bold;
      color: #fffaf2;
      font-family: 'Playfair Display', Georgia, serif;
    }

    .header-subtitle {
      @apply mt-1 text-sm;
      color: #bfc3bf;
    }

    .page-heading {
      color: var(--ink);
      font-family: 'Playfair Display', Georgia, serif;
    }

    .section-heading {
      color: var(--ink);
      font-family: 'Playfair Display', Georgia, serif;
    }

    @media (max-width: 640px) {
      .header-content {
        @apply block py-6;
      }

      .header-title {
        @apply text-2xl;
      }

      .filter-item,
      .filter-item-active {
        min-width: calc(50% - 0.25rem);
      }
    }
  </style>
  {{-- blade-formatter-enable --}}
</head>

<body>
  <header class="header">
    <div class="header-content">
      <h1 class="header-title">📚 Book Reviews</h1>
      <p class="header-subtitle">Discover and share your favorite books</p>
    </div>
  </header>

  <main class="container mx-auto px-4 mb-12 max-w-3xl">
    @yield('content')
  </main>

  <footer class="bg-white border-t border-slate-200 mt-12 py-6">
    <div class="container mx-auto max-w-3xl px-4 text-center text-slate-500 text-sm">
      <p>&copy; 2026 Book Review Portal. All rights reserved.</p>
    </div>
  </footer>
</body>

</html>