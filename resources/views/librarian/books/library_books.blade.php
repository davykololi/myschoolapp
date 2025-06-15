@extends('layouts.librarian')
@section('title', '| Librarian Library Books List')

@section('content')
@role('librarian')
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            @include('partials.errors')
            <!-- Posts list -->
            <div class="w-full">
                <div class="col-lg-12 margin-tb">
                    <div class="mb-8">
                        <h2 class="text-center font-bold uppercase text-2xl">BOOKS LIST</h2>
                    </div>
                </div>
            </div>
            <div class="mt-12">
                TOTAL NUMBER OF BOOKS: {{ $numberOfAllBooks }}, NUMBER OF ISSUED BOOKS: {{ $numberOfissuedBooks }}, CURRENT BOOKS AVAILABLE: {{ $numberOfAvailableBooks }}.
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center mt-8 mx-2">
                <x-search-form/>
            </div>
            <div class="flex flex-col overflow-x-auto mt-6">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                        <th scope="col" class="px-2 py-4" width="20%">TITLE</th>
                                        <th scope="col" class="px-2 py-4" width="15%">CATEGORY</th>
                                        <th scope="col" class="px-2 py-4" width="20%">LIBRARY</th>
                                        <th scope="col" class="px-2 py-4" width="20%">AUTHOR</th>
                                        <th scope="col" class="px-2 py-4" width="5%">UNITS</th>
                                        <th scope="col" class="px-2 py-4" width="5%">ROW</th>
                                        <th scope="col" class="px-2 py-4" width="5%">RACK</th>
                                        <td scope="col" class="px-2 py-4" width="5%">AVAILABLE</td>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if(!empty($books))
                                    @foreach($books as $key => $book)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                {{ $books->perPage() * ($books->currentPage() - 1) + $key + 1 }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $book->title }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $book->category_book->name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $book->library->name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $book->author }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $book->units }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $book->row_no }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $book->rack_no }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if($book->issued_books_count >= $book->units)
                                            <button class="w-full text-white text-center bg-red-700 dark:text-slate-300">
                                                {{ __('NO') }}
                                            </button>
                                            @else
                                            <button class="w-full text-white text-center bg-green-800 dark:text-slate-300">
                                                {{ __('YES') }}
                                            </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($books->isEmpty())
                                    <tr>
                                        <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                                            <div>Books Notyet populated.</div>
                                        </td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                        <div class="my-4">
                            {{ $books->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
