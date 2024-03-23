@extends('layouts.admin')
@section('title', '| Meetings List')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>MEETING LIST</h2>
                    </div>
                    <div style="float:right;">
                        <a type="button" class="bg-blue-700 text-white px-2 py-1 rounded md:hover:bg-blue-500" href="{{route('admin.meetings.create')}}">Create</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col overflow-x-auto mt-12">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900 flex-grow">
                                    <tr>
                                        <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                        <th scope="col" class="px-2 py-4" width="25%">NAME</th>
                                        <th scope="col" class="px-2 py-4" width="15%">DATE</th>
                                        <th scope="col" class="px-2 py-4" width="20%">VENUE</th>
                                        <th scope="col" class="px-2 py-4" width="20%">AGENDA</th>
                                        <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if(!empty($meetings))
                                    @foreach($meetings as $key => $meeting)
                                    <tr class="border-b dark:border-neutral-500 bg-transparent dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$loop->iteration}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$meeting->name}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $meeting->date }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$meeting->venue}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$meeting->agenda}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('admin.meetings.destroy',$meeting->id)}}" method="POST" class="flex flex-row">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.meetings.show', $meeting->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a href="{{ route('admin.meetings.edit', $meeting->id) }}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete {{$meeting->name}}?')">
                                                    <x-delete-svg/>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($meetings->isEmpty())
                                    <tr>
                                        <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                                            <div>The school has no meetings at the moment.</div>
                                        </td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
