@extends('layouts.superadmin')
@section('title', '| Streams List')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            @if(!empty($streams))
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="mb-4">
                        <h2 class="text-center uppercase text-2xl font-bold underline">{{Auth::user()->school->name }} STREAMS</h2>
                    </div>
                    <x-create-button>
                        <a href="{{route('superadmin.streams.create')}}">
                            CREATE
                        </a>
                    </x-create-button>
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
                                        <th scope="col" class="px-2 py-4" width="30%">STREAM</th>
                                        <th scope="col" class="px-2 py-4" width="20%">STUDENTS</th>
                                        <th scope="col" class="px-2 py-4" width="15%">MALES</th>
                                        <th scope="col" class="px-2 py-4" width="15%">FEMALES</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @foreach($streams as $stream)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $loop->iteration }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $stream->name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $stream->students->count() }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $stream->males() }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $stream->females() }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('superadmin.streams.destroy',$stream->id)}}" method="POST" class="inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" href="{{ route('superadmin.streams.show',$stream->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a href="{{ route('superadmin.streams.edit',$stream->id) }}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete?')">
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
</div>
</x-backend-main>
@endsection
