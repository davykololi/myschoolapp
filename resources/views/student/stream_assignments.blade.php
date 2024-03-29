@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
  <!-- frontend-main view -->
  <x-frontend-main>
    <div class="mt-4 mb-8">
      <h1 class="uppercase text-2xl font-bold text-center underline">{{ Auth::user()->stream->name}} Assignments</h1>
    </div>
    <div class="flex flex-col md:flex-row">
        @if(\Auth::user()->assignments->isNotEmpty())
        <span class="animate-ping text-[red] text-4xl w-full md:w-auto">*</span>
        <span class="italic w-full md:w-auto">{{ __('You have an Individual Assignment')}}</span>
        @endif
    </div>
        <div class="flex flex-col overflow-x-auto">
            <div class="sm:-mx-6 md:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">        
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <td scope="col" class="px-2 py-4">NO</td>
                                    <td scope="col" class="px-2 py-4">NAME</td>
                                    <td scope="col" class="px-2 py-4">BY</td>
                                    <td scope="col" class="px-2 py-4">PHONE</td>
                                    <td scope="col" class="px-2 py-4">EMAIL</td>
                                    <td scope="col" class="px-2 py-4">GIVEN ON</td>
                                    <td scope="col" class="px-2 py-4">DEADLINE</td>
                                    <td scope="col" class="px-2 py-4">DOWNLOAD</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($streamAssignments))
                                @forelse($streamAssignments as $assignment)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">{{ $loop->iteration }}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{ $assignment->name }}</td>
                                    @foreach($assignment->teachers as $teacher)
                                    <td class="whitespace-nowrap px-2 py-4">
                                        {{ $teacher->salutation }} {{ $teacher->full_name }}
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">{{ $teacher->phone_no }}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{ $teacher->email }}</td>
                                    @endforeach
                                    <td class="whitespace-nowrap px-2 py-4">{{ $assignment->getDate() }}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{ $assignment->getDeadline() }}</td>
                                    <td class="whitespace-nowrap px-2 py-4 items-center justify-center">
                                        <a href="{{route('student.assignment.download',$assignment->id)}}" class="bg-orange-500 hover:bg-orange-400 border-b-4 border-orange-700 hover:border-orange-500 text-white text-white text-center py-2 px-4 rounded">
                                            Download
                                        </a>
                                    </td>
                                @empty
                                    <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter dark:text-slate-400 dark:bg-stone-900">
                                        No assignments given to this stream at the moment.
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




