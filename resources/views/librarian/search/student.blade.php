@extends('layouts.librarian')
@section('title', '| Student Library Profile')

@section('content')
@role('librarian') 
  <!-- frontend-main view -->
  <x-frontend-main>
    <div class="max-w-screen mb-8">
        <div class="w-full">
            <div class="flex flex-col">
                <div class="mb-2">
                    <h2 class="uppercase text-center font-bold text-2xl">{{ $student->user->full_name }} Library Profile</h2>
                </div>
                <div class="mx-2 md:mx-8">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
        </div>
        <div><h3 class="uppercase text-center text-lg font-bold underline">{{ __('Personal Details') }}</h3></div>
        <div class="flex flex-col overflow-x-auto md:mx-8">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="20%">AVATAR</th>
                                    <th scope="col" class="px-2 py-4" width="20%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ADM NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">STREAM</th>
                                    <th scope="col" class="px-2 py-4" width="20%">DORMITORY</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-800">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div class="ml-2">@include('partials.student-avatar')</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->user->full_name  }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->admission_no  }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->stream->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->dormitory->name }}</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full mt-8">
            <h3 class="uppercase text-lg text-center font-bold underline">{{ __('Issued Books')}}</h3>
        </div>
        <div class="flex flex-col overflow-x-auto md:mx-8">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="25%">TITLE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">SERIAL</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ISSUED</th>
                                    <th scope="col" class="px-2 py-4" width="10%">RETURN</th>
                                    <th scope="col" class="px-2 py-4" width="10%">RETURNED</th>
                                    <th scope="col" class="px-2 py-4" width="15%">STATUS</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @if(!empty($issuedBooks))
                            @forelse($issuedBooks as $key => $issuedBook)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$issuedBook->book->title}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$issuedBook->serial_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $issuedBook->issued_date }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $issuedBook->return_date }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($issuedBook->returned == 0)
                                        <button class="w-full text-white text-center bg-[red] dark:text-slate-300">
                                                {{$issuedBook->returned ? 'YES':'NO'}}
                                        </button>
                                        @else
                                        <button class="w-full text-white text-center bg-[green] dark:text-slate-300">
                                            {{$issuedBook->returned ? 'YES':'NO'}}
                                        </button>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($issuedBook->returned_status == 1)
                                        <button class="w-full text-white text-center bg-[green] dark:text-slate-300">
                                            {{$issuedBook->returned_status ? 'GOOD' : 'POOR' }}
                                        </button>
                                        @else
                                        <button class="w-full text-white text-center bg-[red] dark:text-slate-300">
                                            {{$issuedBook->returned_status ? 'GOOD':'POOR'}}
                                        </button>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('librarian.issued-books.destroy',$issuedBook->id)}}" method="POST" class="inline-flex">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('librarian.issued-books.show', $issuedBook->id) }}">
                                                <x-show-svg/>
                                            </a>
                                            <a href="{{ route('librarian.issued-books.edit', $issuedBook->id) }}">
                                                <x-edit-svg/>
                                            </a>
                                            <button type="submit" onclick="return confirm('Are you sure to delete {{$issuedBook->book->title}}?')">
                                                <x-delete-svg/>
                                            </button>
                                        </form>
                                    </td>
                            @empty
                                    <td colspan="10" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                                        No books issued to {{ $student->user->full_name }} at the moment.
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
        <div class="flex flex-col overflow-x-auto md:mx-8">
            <div class="mt-8 -mb-8">
                <h4 class="text-center uppercase font-bold underline">Issue Book To {{ $student->user->full_name }}</h4>
            </div>
            <div class="mt-16 border rounded p-4">
                <form action="{{ route('librarian.issued-books.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="flex flex-col md:flex-row gap-2 md:mb-4">
                        <div class="block">
                            <input type="hidden" name="student_id" value="{{ $student->id}}">
                        </div>
                        <div class="w-full md:w-1/3 lg:1/3 md:ml-2">
                            <label class="" >Select Book</label>
                            <div class="block">
                                @include('ext._attach_bookdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:1/3">
                            <label class="" >Serial No</label>
                            <div class="block">
                                <input type="text" name="serial_no" id="serial_no" class="lib-form-input" autocomplete="off" placeholder="Serial Number">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-2">
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Issued Date</label>
                            <div class="block">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="issued_date" id="issued_date" class="lib-form-input" placeholder="Issued Date">
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Return Date</label>
                            <div class="block">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="return_date" id="return_date" class="lib-form-input" placeholder="Return Date">
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Recommentation</label>
                            <div class="block">
                                <input type="text" name="recommentation" id="recommentation" class="lib-form-input" placeholder="Recommentation">
                            </div>
                        </div>
                    </div>
                    <div class="mx-4 mt-4">
                        <button type="submit" class="issue-button">ISSUE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-frontend-main>
@endrole
@endsection





