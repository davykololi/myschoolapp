@extends('layouts.admin')
@section('title', '| Book Genres')

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
                        <h2 class="text-center font-bold uppercase text-2xl">BOOKS GENRES</h2>
                    </div>
                    <div style="float:right;" class="items-center justify-center">
                        <a href="{{route('admin.book-genres.create')}}"> 
                            <x-button class="style-one-button"> CREATE </x-button>
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
                                        <th scope="col" class="px-2 py-4" width="25%">GENRE</th>
                                        <th scope="col" class="px-2 py-4" width="25%">DESCRIPTION</th>
                                        <th scope="col" class="px-2 py-4" width="25%">SLUG</th>
                                        <th scope="col" class="px-2 py-4" width="25%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if($bookGenres->isNotEmpty())
                                    @foreach($bookGenres as $key => $bookGenre)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                {{ $bookGenres->perPage() * ($bookGenres->currentPage() - 1) + $key + 1 }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $bookGenre->name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $bookGenre->desc }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $bookGenre->slug }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('admin.book-genres.destroy',$bookGenre->id)}}" method="POST" class="inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('admin.book-genres.show',$bookGenre->id)}}">
                                                    <x-show-svg/>
                                                </a>
                                                <a href="{{route('admin.book-genres.edit',$bookGenre->id)}}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete {{ $bookGenre->name }}?')">
                                                    <x-delete-svg/>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($bookGenres->isEmpty())
                                    <td colspan="12" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter dark:bg-gray-800 dark:text-slate-400 h-12 text-2xl">
                                        {{ __('NOT AVAILABLE')}}.
                                    </td>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                        <div class="my-4">
                            {{ $bookGenres->links() }}
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
