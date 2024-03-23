@extends('layouts.superadmin')
@section('title', '| Terms List')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            @if(!empty($terms))
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>TERMS LIST</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{route('superadmin.terms.create')}}">Create Term</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col overflow-x-auto mt-12">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow  dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <th scope="col" class="px-2 py-4" width="10%">NO</th>
                                        <th scope="col" class="px-2 py-4" width="35%">NAME</th>
                                        <th scope="col" class="px-2 py-4" width="20%">STATUS</th>
                                        <th scope="col" class="px-2 py-4" width="25%">CODE</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @foreach($terms as $key => $term)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$loop->iteration}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$term->name}}</div>
                                        </td>
                                        @if($term->status === 1)
                                        <td class="whitespace-nowrap p-2 items-center justify-center">
                                            <div class="bg-red-700 px-2 py-1 text-white text-center rounded w-[150px]">
                                                {{ __('Current') }}
                                            </div>
                                        </td>
                                        @else
                                        <td class="whitespace-nowrap p-2">
                                            <div class="bg-[green] px-2 py-1 text-white text-center rounded w-[150px]">
                                                {{ __('Reserved') }}
                                            </div>
                                        </td>
                                        @endif
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$term->code}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('superadmin.terms.destroy',$term->id)}}" method="POST" class="flex flex-row">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('superadmin.terms.show', $term->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a href="{{ route('superadmin.terms.edit', $term->id) }}">
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
