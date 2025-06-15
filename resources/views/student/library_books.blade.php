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
                    {{ $title }}
                </h2>
            </div>
            <div class="justify-right items-center">
                <x-search-form/>
            </div>
            <div class="flex flex-col overflow-x-auto py-8">
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
                                    @foreach($books as $key => $book)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            {{ $books->perPage() * ($books->currentPage() - 1) + $key + 1 }}
                                        </td>
                                        <td class="whitespace-nowrap p-2">{{ $book->title }}</td>
                                        <td class="whitespace-nowrap p-2">{{ $book->category_book->name }}</td>
                                        <td class="whitespace-nowrap p-2">{{ $book->author }}</td>
                                        <td class="whitespace-nowrap p-2">{{ $book->library->name }}</td>
                                        <td class="whitespace-nowrap p-2">{{ $book->row_no }}</td>
                                        <td class="whitespace-nowrap p-2">{{ $book->rack_no }}</td>
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
                                    <td colspan="12" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter dark:bg-gray-800 dark:text-slate-400 h-12 text-2xl">
                                        {{ Auth::user()->school->name }} {{ __('Libraries have no books at the moment.') }}
                                    </td>
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
@endsection



