@extends('layouts.admin')
@section('title', '| Image Gallery List')

@section('content')
@role('admin')
@can('dataOfficer')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen min-h-screen">
    <div class="w-full mx-2 md:mx-8 lg:mx-8">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($imageGalleries))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>SCHOOL IMAGE GALLERY</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.image-galleries.create')}}">Create</a>
                </div>
            </div>
        </div>
        <div class="flex flex-col overflow-x-auto mt-12">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="10%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="35%">TITLE</th>
                                    <th scope="col" class="px-2 py-4" width="20%">IMAGE</th>
                                    <th scope="col" class="px-2 py-4" width="20%">SECTION</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($imageGalleries as $imageGallery)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $imageGallery->title }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>
                                            <img style="width: 50%" src="{{ $imageGallery->image_url }}" alt="{{ $imageGallery->title }}">
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $imageGallery->section->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <form action="{{route('admin.image-galleries.destroy',$imageGallery->id)}}" method="POST" class="flex flex-row">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('admin.image-galleries.show', $imageGallery->id) }}">
                                                <x-show-svg/>
                                            </a>
                                            <a type="button" href="{{ route('admin.image-galleries.edit', $imageGallery->id) }}">
                                                <x-edit-svg/>
                                            </a>
                                            <button type="submit" onclick="return confirm('Are you sure to delete {{$imageGallery->title}}?')">
                                                <x-delete-svg/>
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
</x-backend-main>
@endcan
@endrole
@endsection
