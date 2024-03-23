@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content') 
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div>
                <h1 class="uppercase text-center text-2xl font-bold underline mt-2 mb-4">{{$user->student->stream->name}} Meetings</h1>
            </div>
            <div class="flex flex-col overflow-x-auto">
                <div class="sm:-mx-6 md:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">        
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900 flex-grow">
                                    <tr>
                                        <td scope="col" class="px-2 py-4">NO</td>
                                        <td scope="col" class="px-2 py-4">NAME</td>
                                        <td scope="col" class="px-2 py-4">DATE</td>
                                        <td scope="col" class="px-2 py-4">VENUE</td>
                                        <td scope="col" class="px-2 py-4">AGENDA</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($user->student->stream->meetings))
                                    @forelse($user->student->stream->meetings as $meeting)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-2 py-4">{{ $loop->iteration }}</td>
                                        <td class="whitespace-nowrap px-2 py-4">{{ $meeting->name }}</td>
                                        <td class="whitespace-nowrap px-2 py-4">{{ date("jS,F,Y",strtotime($meeting->date)) }}</td>
                                        <td class="whitespace-nowrap px-2 py-4">{{ $meeting->venue }}</td>
                                        <td class="whitespace-nowrap px-2 py-4">{{ $meeting->agenda }} </td>
                                    @empty
                                        <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter dark:text-slate-400 dark:bg-stone-900">
                                            This stream has no meeting schedule at the moment.
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
        </div>
    </div>
</div>
</x-frontend-main>
@endsection

