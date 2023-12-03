@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')  
  <!-- frontend-main view -->
  <x-frontend-main>
        <div>
            <h1 class="uppercase">{{ Auth::user()->stream->name }} Exam Schedule</h1>
        </div>
        <div class="flex flex-col overflow-x-auto mt-12">
            <div class="sm:-mx-6 md:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">        
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <td scope="col" class="px-2 py-4">NO</td>
                                    <td scope="col" class="px-2 py-4">NAME</td>
                                    <td scope="col" class="px-2 py-4">START</td>
                                    <td scope="col" class="px-2 py-4">END</td>
                                    <td scope="col" class="px-2 py-4">TIMETABLE</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($streamExams))
                                @forelse($streamExams as $exam)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">{{ $loop->iteration }}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{ $exam->name }}</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        {{ $exam->start_date }}
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        {{ $exam->end_date }}
                                    </td>
                                    @if(!empty($exam->timetables))
                                    @foreach($exam->timetables as $timetable)
                                    @if(($timetable->exam->name === $exam->name) && ($timetable->stream->name === Auth::user()->stream->name))
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <a href="{{route('student.timetable.download',$timetable->id)}}" class="items-center justify-center">
                                            <button class="bg-[#fc5113] text-white py-1 px-2 rounded"> Download </button>
                                        </a>
                                    </td>
                                    @else
                                    <td class="whitespace-nowrap px-2 py-4">
                                        {{ __('Exam Timetable Notyet Uploaded') }}
                                    </td>
                                    @endif
                                    @endforeach
                                    @endif
                                @empty
                                    <td colspan="12" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter dark:bg-gray-800 dark:text-slate-400">
                                        This class has no exam schedule at the moment.
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
  </x-frontend-main>
@endsection
