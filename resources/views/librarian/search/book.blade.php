@extends('layouts.librarian')
@section('title', '| Book Details')

@section('content') 
  <!-- frontend-main view -->
  <x-frontend-main>
    <div class="max-w-full h-screen">
        <div class="w-full">
            <div class="flex flex-col">
                <div class="mb-2">
                    <h2 class="uppercase text-center font-bold text-2xl">{{ $book->title }} Book Details</h2>
                </div>
                <div class="mt-4 w-full">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
        </div>
        <div class="flex flex-col overflow-x-auto md:mx-8">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="10%">IMAGE</th>
                                    <th scope="col" class="px-2 py-4" width="20%">TITLE</th>
                                    <th scope="col" class="px-2 py-4" width="15%">AUTHOR</th>
                                    <th scope="col" class="px-2 py-4" width="10%">CATEGORY</th>
                                    <th scope="col" class="px-2 py-4" width="5%">RACK</th>
                                    <th scope="col" class="px-2 py-4" width="5%">ROW</th>
                                    <th scope="col" class="px-2 py-4" width="10%">LIBRARY</th>
                                    <th scope="col" class="px-2 py-4" width="5%">UNITS</th>
                                    <th scope="col" class="px-2 py-4" width="5%">ISSUED</th>
                                    <th scope="col" class="px-2 py-4" width="10%">AVAILABLE</th>
                                    <th scope="col" class="px-2 py-4" width="5%">RETURN</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                    <td class="whitespace-nowrap p-2">
                                        <div></div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $book->title  }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $book->author  }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $book->category_book->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $book->rack_no }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $book->row_no }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $book->library->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $book->units }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $book->issued_books_count }}</div>
                                    </td>
                                    @if(!empty($book->issued_books))
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $book->available_books }}</div>
                                    </td>
                                    @else
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $book->units }}</div>
                                    </td>
                                    @endif

                                    @if(!empty($book->issued_books))
                                    <td class="whitespace-nowrap p-2">
                                        <div>
                                            <ul>
                                                @forelse($book->issued_books as $book)
                                                <li>{{ $book->return_date }}</li>
                                                @empty
                                                <div>Null</div>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </td>
                                    @else
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $book->units }}</div>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-frontend-main>
@endsection





