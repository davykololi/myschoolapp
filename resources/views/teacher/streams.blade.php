@extends('layouts.teacher')
@section('title')
{{ Auth::user()->school-> name}} {{ __('Streams') }}
@endsection

@section('content')
@role('teacher')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <!-- Posts list -->
            <div>
                <div>
                    <div>
                        <h2 class="uppercase text-center font-bold text-2xl">STREAMS LIST</h2>
                    </div>
                    <div class="text-center mt-4">
                        @include('partials.messages')
                        @include('partials.errors')
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center">
                <x-search-form/>
            </div>
            <div class="flex flex-col overflow-x-auto mt-12 mb-6">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                        <th scope="col" class="px-2 py-4" width="25%">STREAM</th>
                                        <th scope="col" class="px-2 py-4" width="20%">ASSIGNED?</th>
                                        <th scope="col" class="px-2 py-4" width="20%">SUBJECT</th>
                                        <th scope="col" class="px-2 py-4" width="10%">STUDENTS</th>
                                        <th scope="col" class="px-2 py-4" width="10%">MALES</th>
                                        <th scope="col" class="px-2 py-4" width="10%">FEMALES</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if($streams->isNotEmpty())
                                    @foreach($streams as $key => $stream)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-800">
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>
                                                {{ $streams->perPage() * ($streams->currentPage() - 1) + $key + 1 }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <a href="{{ route('teacher.stream.show', $stream->id) }}" class="hover:underline hover:text-purple-500">
                                                <div>{{ $stream->name }}</div>
                                            </a>
                                        </td>
                                    
                                        <td class="whitespace-nowrap p-2 items-center justify-center">
                                            @if($stream->teacherAssignedToStream())
                                            <div class="bg-[green] w-12 px-2 py-1 text-white rounded dark:bg-green-900 dark:text-slate-400 text-center animate-pulse">
                                                <a href="{{ route('teacher.stream.show', $stream->id) }}">
                                                    {{ __('YES') }}
                                                </a>
                                            </div>
                                            @else
                                            <div class="bg-[red] w-12 px-2 py-1 text-white rounded dark:bg-red-900 dark:text-slate-400 text-center">
                                                <a href="{{ route('teacher.stream.show', $stream->id) }}">
                                                    {{ __('NO') }}
                                                </a>
                                            </div>
                                            @endif
                                            
                                        </td>
                                        
                                        <td class="whitespace-nowrap p-2">
                                            @if($stream->teacherAssignedToStream())
                                            @foreach($teacherStreamSubjects as $teacherStreamSubject)
                                            @if($stream->id === $teacherStreamSubject->stream_id)
                                            <div>{{ $teacherStreamSubject->subject->name }}</div>
                                            @endif
                                            @endforeach
                                            @else
                                            <div>{{ __('---------------') }}</div>
                                            @endif
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
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($streams->isEmpty())
                                    <td colspan="12" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter dark:bg-gray-800 dark:text-slate-400 h-12 text-2xl">
                                        {{ __('Not Available')}}.
                                    </td>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                        <div class="my-4">
                            {{ $streams->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
