@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div>
                <h2 class="uppercase text-center font-hairline mb-4 text-2xl cursor-pointer underline">
                    Library Books
                </h2>
            </div>
            <div class="flex flex-col overflow-x-auto">
                <div class="sm:-mx-6 md:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm bg-transparent w-full mx-auto justify-evenly">        
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr class="font-bold">
                                        <td scope="col" class="px-2 py-4">NO</td>
                                        <td scope="col" class="px-2 py-4">TITLE</td>
                                        <td scope="col" class="px-2 py-4">CATEGORY</td>
                                        <td scope="col" class="px-2 py-4">AUTHOR</td>
                                        <td scope="col" class="px-2 py-4">LIBRARY</td>
                                        <td scope="col" class="px-2 py-4">ROW NO</td>
                                        <td scope="col" class="px-2 py-4">RACK NO</td>
                                        <td scope="col" class="px-2 py-4">AVAILABLE</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($books))
                                    @forelse($books as $key => $book)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">{{ $loop->iteration }}</td>
                                        <td class="whitespace-nowrap p-2">{{ $book->title }}</td>
                                        <td class="whitespace-nowrap p-2">{{ $book->category_book->name }}</td>
                                        <td class="whitespace-nowrap p-2">{{ $book->author }}</td>
                                        <td class="whitespace-nowrap p-2">{{ $book->library->name }}</td>
                                        <td class="whitespace-nowrap p-2">{{ $book->row_no }}</td>
                                        <td class="whitespace-nowrap p-2">{{ $book->rack_no }}</td>
                                        <td class="whitespace-nowrap p-2">
                                            @if($book->issued_books_count >= $book->units)
                                                <span class="text-red-800 dark:text-red-700">{{ __('NO') }}</span>
                                            @else
                                                <span class="text-green-800 dark:text-green-600">{{ __('YES') }}</span>
                                            @endif
                                        </td>
                                    @empty
                                        <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12">
                                            Library books notyet populated.
                                        </td>
                                    </tr>
                                    @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection



