<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Reviews</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>

  {{-- blade-formatter-disable --}}
  <style type="text/tailwindcss">
    body {
      @apply bg-gradient-to-br from-slate-50 to-slate-100;
    }

    .btn {
      @apply bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 h-10 transition-all duration-200;
    }

    .btn-primary {
      @apply bg-blue-600 text-white hover:bg-blue-700 ring-0;
    }

    .input {
      @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none rounded-md border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200;
    }

    .filter-container {
      @apply mb-6 flex space-x-2 rounded-lg bg-white p-3 shadow-sm ring-1 ring-slate-200;
    }

    .filter-item {
      @apply flex w-full items-center justify-center rounded-md px-4 py-2 text-center text-sm font-medium text-slate-500 hover:text-slate-700 transition-colors duration-200;
    }

    .filter-item-active {
      @apply bg-blue-50 text-blue-600 flex w-full items-center justify-center rounded-md px-4 py-2 text-center text-sm font-medium shadow-sm ring-1 ring-blue-200;
    }

    .book-item {
      @apply text-sm rounded-lg bg-white p-5 leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-200 hover:shadow-lg hover:ring-slate-300 transition-all duration-200;
    }

    .book-title {
      @apply text-lg font-semibold text-slate-900 hover:text-blue-600 transition-colors duration-200;
    }

    .book-author {
      @apply block text-slate-600 text-sm;
    }

    .book-rating {
      @apply text-sm font-medium text-slate-700;
    }

    .book-review-count {
      @apply text-xs text-slate-500;
    }

    .empty-book-item {
      @apply text-sm rounded-lg bg-white py-12 px-4 text-center leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-200;
    }

    .empty-text {
      @apply font-medium text-slate-500;
    }

    .reset-link {
      @apply text-blue-600 hover:text-blue-700 underline transition-colors duration-200;
    }

    .header {
      @apply bg-white shadow-sm ring-1 ring-slate-200 mb-8;
    }

    .header-content {
      @apply container mx-auto max-w-3xl px-4 py-6;
    }

    .header-title {
      @apply text-3xl font-bold bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent;
    }

    .header-subtitle {
      @apply text-slate-600 text-sm mt-1;
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