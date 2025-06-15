@extends('layouts.admin')
@section('title', '| Timetables List')

@section('content')
@role('admin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen max-h-screen md:min-h-screen lg:min-h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="">
                <div>
                    <h2 class="text-center text-2xl font-bold">TIMETABLES LIST</h2>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center">
                <x-search-form/>
                <a href="{{route('admin.timetables.create')}}" class="sm:mt-4">
                    <x-button class="create-button">CREATE</x-button>
                </a>
            </div>
            <div class="flex flex-col overflow-x-auto mt-12">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900 flex-grow">
                                    <tr>
                                        <th scope="col" class="px-2 py-4" width="10%">NO</th>
                                        <th scope="col" class="px-2 py-4" width="30%">NAME</th>
                                        <th scope="col" class="px-2 py-4" width="15%">TIMETABLE</th>
                                        <th scope="col" class="px-2 py-4" width="15%">FOR</th>
                                        <th scope="col" class="px-2 py-4" width="15%">SECTION</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                @if(!empty($timetables))
                                @foreach($timetables as $key => $timetable)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>
                                                {{ $timetables->perPage() * ($timetables->currentPage() - 1) + $key + 1 }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{$timetable->desc}}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>
                                                <a href="{{route('admin.timetable.download',$timetable->id)}}">
                                                    <x-pdf-svg/>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>
                                                {{$timetable->stream->name}}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>
                                                @if(($timetable->stream->name != null) && ($timetable->exam->name === null)))
                                                {{ __('Class Timetable') }}
                                                @elseif($timetable->exam->name != null)
                                                {{$timetable->exam->name }}
                                                @elseif(($timetable->stream->name != null) && ($timetable->exam->name != null) && ($timetable->class->name != null) && ($timetable->stream->class->name === $timetable->class->name))
                                                {{ $timetable->exam->name }} {{ __('Timetable')}}
                                                @else
                                                {{ __('Undefined') }}
                                                @endif
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <form action="{{route('admin.timetables.destroy',$timetable->id)}}" method="POST" class="flex flex-row">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" href="{{ route('admin.timetables.show', $timetable->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a type="button" href="{{ route('admin.timetables.edit', $timetable->id) }}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete {{$timetable->desc}}?')">
                                                    <x-delete-svg/>
                                                </button>
                                            </form> 
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                    @if($timetables->isEmpty())
                                    <tr>
                                        <td colspan="16" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter h-12 dark:bg-[#3a3a3f] dark:text-slate-400">
                                           Timetables Notyet Uploaded.
                                        </td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                        <div class="my-4">
                            {{ $timetables->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endrole
@endsection
