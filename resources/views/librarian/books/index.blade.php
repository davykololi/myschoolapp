@extends('layouts.librarian')
@section('title', '| All Books')

@section('content')
<x-frontend-main>
<div class="max-w-full">
    <div class="w-full">
    @include('partials.messages')
    @include('partials.errors')
    <!-- Posts list -->
    @if(!empty($books))
        <div class="w-full">
            <div class="col-lg-12 margin-tb">
                <div class="mb-8">
                    <h2 class="text-center font-bold uppercase text-2xl">BOOKS LIST</h2>
                </div>
            </div>
            <div style="float:right;">
                <a class="bg-blue-500 text-white p-2 rounded md:hover:text-blue-500 md:hover:bg-white dark:bg-black dark:text-slate-400 mx-2" href="{{route('librarian.books.create')}}">
                    CREATE
                </a>
                <a class="bg-green-800 text-white p-2 rounded mx-2" href="{{route('librarian.export.books')}}">
                    EXCEL
                </a>
                <a class="bg-orange-700 text-white p-2 rounded mx-2" href="{{route('librarian.library.books',$user->school->id)}}">
                    PDF
                </a> 
            </div>
        </div>
        <div class="flex flex-col overflow-x-auto mt-20">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="15%">TITLE</th>
                                    <th scope="col" class="px-2 py-4" width="15%">CATEGORY</th>
                                    <th scope="col" class="px-2 py-4" width="10%">LIBRARY</th>
                                    <th scope="col" class="px-2 py-4" width="15%">AUTHOR</th>
                                    <th scope="col" class="px-2 py-4" width="10%">UNITS</th>
                                    <th scope="col" class="px-2 py-4" width="10%">RACK NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($books as $key => $book)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $book->title }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $book->category_book->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $book->library->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $book->author }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $book->units }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $book->rack_no }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('librarian.books.destroy',$book->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('librarian.books.show', $book->id) }}" class="bg-green-800 text-white px-2 py-1 transition delay-300 duration-300 ease-in-out inline-flex mx-0.5 rounded">
                                                Details
                                            </a>
                                            <a href="{{ route('librarian.books.edit', $book->id) }}" class="bg-yellow-500 text-white py-1 px-2 inline-flex mx-0.5 rounded">
                                                Edit
                                            </a>
                                            <button type="submit" class="bg-red-700 text-white py-1 px-2 inline-flex mx-0.5 rounded" onclick="return confirm('Are you sure to delete {{$book->title}}?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
</div>
</x-frontend-main>
@endsection
