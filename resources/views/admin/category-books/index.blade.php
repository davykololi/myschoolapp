@extends('layouts.admin')
@section('title', '| Book Categories')

@section('content')
@role('admin')
@can('libraryAdmin')
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            <div class="w-full">
                <div class="col-lg-12 margin-tb">
                    <div class="items-center justify-center">
                        <h2 class="text-center font-bold uppercase text-2xl">BOOKS CATEGORIES</h2>
                    </div>
                    <div style="float:right;" class="items-center justify-center">
                        <a class="bg-blue-500 text-white p-2 rounded md:hover:text-blue-500 md:hover:bg-white dark:bg-black dark:text-slate-400 mx-2" href="{{route('admin.category-books.create')}}"> 
                            Create
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col overflow-x-auto mt-16">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
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
                                    @if(!empty($categoryBooks))
                                    @forelse($categoryBooks as $key => $categoryBook)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$loop->iteration}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$categoryBook->name}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$categoryBook->desc}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$categoryBook->slug}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('admin.category-books.destroy',$categoryBook->id)}}" method="POST" class="inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('admin.category-books.show',$categoryBook->id)}}">
                                                    <x-show-svg/>
                                                </a>
                                                <a href="{{route('admin.category-books.edit',$categoryBook->id)}}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete {{$categoryBook->name}}?')">
                                                    <x-delete-svg/>
                                                </button>
                                            </form>
                                        </td>
                                    @empty
                                        <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                                            The categories books belongs to notyet initialized.
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
@endcan
@endrole
@endsection
