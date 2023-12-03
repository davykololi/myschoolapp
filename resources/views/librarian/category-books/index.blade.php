@extends('layouts.librarian')
@section('title', '| Book Categories')

@section('content')
<x-frontend-main>
<div class="max-w-full">
    <div class="w-full">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($categoryBooks))
        <div class="w-full">
            <div class="col-lg-12 margin-tb">
                <div class="items-center justify-center">
                    <h2 class="text-center font-bold uppercase text-2xl">BOOKS CATEGORIES</h2>
                </div>
                <div style="float:right;" class="items-center justify-center">
                    <a class="bg-blue-500 text-white p-2 rounded md:hover:text-blue-500 md:hover:bg-white dark:bg-black dark:text-slate-400 mx-2" href="{{route('librarian.category-books.create')}}"> 
                        Create
                    </a>
                </div>
            </div>
        </div>
        <br/>
        <div class="flex flex-col overflow-x-auto mt-16">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="25%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="25%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="25%">DESCRIPTION</th>
                                    <th scope="col" class="px-2 py-4" width="25%">SLUG</th>
                                    <th scope="col" class="px-2 py-4" width="25%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @forelse($categoryBooks as $key => $categoryBook)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$categoryBook->name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$categoryBook->desc}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$categoryBook->slug}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('librarian.category-books.destroy',$categoryBook->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('librarian.category-books.show',$categoryBook->id)}}" class="bg-green-800 text-white px-2 py-1 transition delay-300 duration-300 ease-in-out inline-flex mx-0.5 rounded">
                                                Details
                                            </a>
                                            <a href="{{route('librarian.category-books.edit',$categoryBook->id)}}" class="bg-yellow-500 text-white py-1 px-2 inline-flex mx-0.5 rounded">
                                                Edit
                                            </a>
                                            <button type="submit" class="bg-red-700 text-white py-1 px-2 inline-flex mx-0.5 rounded" onclick="return confirm('Are you sure to delete {{$categoryBook->name}}?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                            @empty
                                    <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                                        The categories books belongs to notyet initialized.
                                    </td>
                                </tr>
                            @endforelse
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
