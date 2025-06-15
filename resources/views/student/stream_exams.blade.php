@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')  
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx8">
            <div>
                <h2 class="uppercase text-center font-hairline text-2xl mb-4">
                    {{ Auth::user()->student->stream->name }} Exam Schedule
                </h2>
            </div>
            <div style="float: right;margin-right: 108px;">
                <div class="absolute mb-6">
                    <x-button class="back-button" data-te-ripple-init data-te-ripple-color="light">
                        <x-back-svg-n-url/>
                    </x-button>
                </div>
            </div>
            <div class="flex flex-col overflow-x-auto mt-12">
                <div class="sm:-mx-6 md:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="text-left text-sm font-light bg-transparent w-full mx-auto">        
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <td width="10%" scope="col" class="px-2 py-4">NO</td>
                                        <td width="35%" scope="col" class="px-2 py-4">NAME</td>
                                        <td width="20%" scope="col" class="px-2 py-4">START</td>
                                        <td width="20%" scope="col" class="px-2 py-4">END</td>
                                        <td width="15%" scope="col" class="px-2 py-4">TIMETABLE</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($streamExams))
                                    @foreach($streamExams as $exam)
                                    @if($exam->status === 1)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap px-2 py-4">{{ $loop->iteration }}</td>
                                        <td class="whitespace-nowrap px-2 py-4">{{ $exam->name }}</td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            {{ $exam->start_date }}
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            {{ $exam->end_date }}
                                        </td>

                                        @if($examTimetables->isNotEmpty())
                                        @foreach($examTimetables as $timetable)
                                        @if(($timetable->exam->name === $exam->name) && ($timetable->stream->name === Auth::user()->student->stream->name))
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <a href="{{route('student.timetable.download',$timetable->id)}}" class="items-center justify-center">
                                                <button class="bg-[#fc5113] text-white py-1 px-2 rounded"> Download </button>
                                            </a>
                                        </td>
                                        @else
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <x-button class="bg-red-700 text-white py-1 px-2 rounded">
                                                {{ __('Notyet Uploaded') }}
                                            </x-button>
                                        </td>
                                        @endif
                                        @endforeach
                                        @endif

                                        @if($examTimetables->isEmpty())
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <button class="bg-red-700 text-white py-1 px-2 rounded">
                                                {{ __('Notyet Uploaded') }}
                                            </button>
                                        </td>
                                        @endif
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($streamExams->isEmpty())
                                    <td colspan="12" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter dark:bg-gray-800 dark:text-slate-400 h-12 text-2xl">
                                        {{ Auth::user()->student->stream->name }} has no exam schedule at the moment.
                                    </td>
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
