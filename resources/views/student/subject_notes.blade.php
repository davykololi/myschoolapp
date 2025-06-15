@extends('layouts.student')
 
@section('title')
    {{ $streamSubject->subject->name }} {{ __('Notes By')}} {{ $streamSubject->teacher->user->salutation }} {{ $streamSubject->teacher->user->full_name }}
@endsection

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="mb-8">
                <h2 class="uppercase text-center font-hairline text-2xl mb-4 underline">
                    {{ $user->student->stream->name}} Notes
                </h2>
                <h4 class="uppercase text-center font-hairline text-base">
                    {{ $streamSubject->subject->name }} Notes By {{ $streamSubject->teacher->user->salutation }} {{ $streamSubject->teacher->user->full_name }}
                </h4>
            </div>
            <div style="float: right;margin-right: 108px;">
                <div class="absolute mb-6">
                    <x-button class="back-button" data-te-ripple-init data-te-ripple-color="light">
                        <x-back-svg-n-url/>
                    </x-button>
                </div>
            </div>
            <div class="justify-right items-center">
                <form action="{{ route('student.subject.notes',[$subject->id, $teacher->id])}}" method="GET">
                    <x-search-input/>
                </form>
            </div>
            <div class="flex flex-col overflow-x-auto mt-8">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="30%">NOTES</th>
                                    <th scope="col" class="px-2 py-4" width="25%">TEACHER</th>
                                    <th scope="col" class="px-2 py-4" width="15%">TEACHER PHONE</th>
                                    <th scope="col" class="px-2 py-4" width="15%">DOWNLOAD</th>
                                    <th scope="col" class="px-2 py-4" width="10%">READ</th>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if($streamSubjectNotes->isNotEmpty())
                                    @foreach($streamSubjectNotes as $note)
                                    @if(($note->stream_id === $user->student->stream->id) && ($note->subject_id === $streamSubject->subject_id) && ($note->teacher_id === $streamSubject->teacher_id))
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $loop->iteration }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$note->desc}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                {{ $note->teacher->user->salutation }} {{ $note->teacher->user->first_name }} {{ $note->teacher->user->last_name }} 
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $note->teacher->phone_no }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <a href="{{route('student.notes.download',$note->id)}}">
                                                <x-download-button/>
                                            </a>
                                        </td>
                                        <td class="whitespace-nowrap p-2 items-center justify-center">
                                            <button type="button" class="view-button">
                                                <a href="{{route('student.online.notes',$note->id)}}">View</a>
                                            </button>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($streamSubjectNotes->isEmpty())
                                    <tr>
                                        <td colspan="16" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter h-12 dark:bg-[#3a3a3f] dark:text-slate-400 text-2xl">
                                           {{ $streamSubject->teacher->user->salutation }} {{ $streamSubject->teacher->user->first_name }} has notyet uploaded {{ $streamSubject->subject->name }} notes.
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
</x-frontend-main>
@endsection

@push('scripts')
<script src="{{ asset('assets/dist/pspdfkit.js') }}"></script>
@endpush