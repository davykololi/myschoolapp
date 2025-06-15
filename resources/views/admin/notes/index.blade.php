@extends('layouts.admin')
@section('title', '| Admin Notes List')

@section('content')
@role('admin')
@can('academicRegistrar')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            @include('partials.errors')
            <!-- Posts list -->
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>NOTES LIST</h2>
                    </div>
                    <div style="float:right">
                        <a type="button" class="bg-blue-700 text-white px-2 py-1 rounded" href="{{route('admin.notes.create')}}">Create</a>
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
                                        <th scope="col" class="px-2 py-4" width="20%">TEACHER</th>
                                        <th scope="col" class="px-2 py-4" width="25%">CLASS</th>
                                        <th scope="col" class="px-2 py-4" width="10%">SUBJECT</th>
                                        <th scope="col" class="px-2 py-4" width="20%">TOPIC</th>
                                        <th scope="col" class="px-2 py-4" width="10%">FILE</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if(!empty($notes))
                                    @foreach($notes as $note)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $loop->iteration }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$note->teacher->user->salutation}} {{$note->teacher->user->full_name}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$note->stream->name}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$note->subject->name}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$note->desc}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                <a href="{{route('admin.notes.download',$note->id)}}" class="btn btn-outline-warning">
                                                    Download
                                                </a>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('admin.notes.destroy',$note->id)}}" method="POST" class="inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" href="{{ route('admin.notes.show', $note->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a type="button" href="{{ route('admin.notes.edit', $note->id) }}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete?')">
                                                    <x-delete-svg/>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($notes->isEmpty())
                                    <tr>
                                        <td colspan="16" class="w-full text-2xl font-bold text-center text-white bg-red-700 uppercase tracking-tighter h-12 dark:bg-[#3a3a3f] dark:text-slate-400">
                                            Notes notyet given at the moment.
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
@endcan
@endrole
@endsection
