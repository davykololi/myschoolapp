
            <form action="{{ route('librarian.search.book')}}"> 
              <div class="relative">
                @include('ext._search_books')
                <button type="submit" class="text-white absolute right-1 bottom-1 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Search
                </button>
              </div>
            </form>