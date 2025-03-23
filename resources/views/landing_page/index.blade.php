<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
                              
        <!-- Main Content -->
        <div class="container mx-auto px-4">
            <!-- Filter Section -->
            <section class="bg-white rounded-lg shadow-md mb-8">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-700">Find Your Perfect Book</h2>
                </div>
                <div class="p-6">
                    <form action="{{ route('landing_page') }}" method="GET">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                    id="title" name="title" value="{{ request('title') }}" placeholder="Search by title">
                            </div>
                            <div>
                                <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                                <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                    id="author" name="author" value="{{ request('author') }}" placeholder="Search by author">
                            </div>
                            <div>
                                <label for="min_rating" class="block text-sm font-medium text-gray-700 mb-1">Min Rating</label>
                                <input type="number" step="0.1" min="0" max="5" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                    id="min_rating" name="min_rating" value="{{ request('min_rating') }}" placeholder="Minimum rating">
                            </div>
                            <div>
                                <label for="max_rating" class="block text-sm font-medium text-gray-700 mb-1">Max Rating</label>
                                <input type="number" step="0.1" min="0" max="5" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                    id="max_rating" name="max_rating" value="{{ request('max_rating') }}" placeholder="Maximum rating">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                            <div>
                                <label for="sort" class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                                <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                    id="sort" name="sort">
                                    <option value="id_books" {{ request('sort') == 'id_books' ? 'selected' : '' }}>Newest</option>
                                    <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Title</option>
                                    <option value="author" {{ request('sort') == 'author' ? 'selected' : '' }}>Author</option>
                                    <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Rating</option>
                                </select>
                            </div>
                            <div>
                                <label for="direction" class="block text-sm font-medium text-gray-700 mb-1">Direction</label>
                                <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                    id="direction" name="direction">
                                    <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                                    <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                                </select>
                            </div>
                            <div>
                                <label for="per_page" class="block text-sm font-medium text-gray-700 mb-1">Books Per Page</label>
                                <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                    id="per_page" name="per_page">
                                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                    <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15</option>
                                    <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mt-6 flex space-x-2">
                            <button type="submit" class="px-4 py-2 mx-1 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Search Books
                            </button>
                            <a href="{{ route('landing_page') }}" class="px-4 py-2 mx-1 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Reset
                            </a>
                        </div>
                    </form>
                </div>
            </section>

            <!-- Results Count and Pagination Info -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Book Collection</h2>
                <div class="text-sm text-gray-600">
                    Showing {{ $books->firstItem() ?? 0 }} to {{ $books->lastItem() ?? 0 }} of {{ $books->total() }} books
                </div>
            </div>

            <!-- Book Cards Grid -->
            @if($books->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
                @foreach($books as $book)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:scale-105">
                    <div class="relative pb-2/3 h-48">
                        @if ($book->cover != '' || $book->cover != null || $book->cover || !empty($book->cover) )
                            <img src="{{asset('/storage/' . $book->cover)}}" width="100">    
                        @else
                            <img src="https://store.bookbaby.com/BookShop/CommonControls/BookshopThemes/bookshop/OnePageBookCoverImage.jpg?BookID=BK90023891&abOnly=False&ImageType=Back" width="100">   
                        @endif
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            Rating<span class="text-sm text-gray-600 ml-1">({{ $book->rating }})</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 line-clamp-1 mb-1">{{ $book->title }}</h3>
                        <p class="text-sm text-gray-600 mb-3">by {{ $book->author }}</p>
                        <div class="line-clamp-3 text-sm text-gray-700 mb-4 h-16">
                            {{ $book->description ?? 'No description available.' }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="bg-white rounded-lg shadow p-8 text-center">
                <i class="fas fa-book-open text-5xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">No Books Found</h3>
                <p class="text-gray-500 mb-4">We couldn't find any books matching your search criteria.</p>
                <a href="{{ route('landing_page') }}" class="inline-block py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                    Clear Filters
                </a>
            </div>
            @endif

            <!-- Pagination -->
            <div class="mt-8">
                {{ $books->links() }}
            </div>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif

    </body>
</html>
