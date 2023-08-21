@extends('layouts.librarian')

@section('content') 
  <!-- frontend-main view -->
  <x-frontend-main>
    <div>
        <div class="w-full">
            <div class="flex flex-col">
                <div class="mb-2">
                    <h2 class="uppercase text-center font-bold text-2xl">{{ $student->full_name }} Library Profile</h2>
                </div>
                <div class="mt-4 w-full">
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
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="20%">AVATAR</th>
                                    <th scope="col" class="px-2 py-4" width="30%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ADM NO</th>
                                    <th scope="col" class="px-2 py-4" width="30%">STREAM</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div class="ml-2">@include('partials.student-avatar')</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->full_name  }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->admission_no  }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->stream->name }}</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full mt-8">
            <h3 class="uppercase text-lg text-center font-bold underline">{{ __('Borrowed Books')}}</h3>
        </div>
        <div class="flex flex-col overflow-x-auto md:mx-8">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ISSUED TO</th>
                                    <th scope="col" class="px-2 py-4" width="10%">TITLE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">SERIAL</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ISSUED</th>
                                    <th scope="col" class="px-2 py-4" width="10%">RETURN</th>
                                    <th scope="col" class="px-2 py-4" width="10%">RETURNED</th>
                                    <th scope="col" class="px-2 py-4" width="10%">STATUS</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @if(!empty($issuedBooks))
                            @forelse($issuedBooks as $key => $booker)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$booker->student->full_name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$booker->book->title}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$booker->serial_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $booker->issued_date }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $booker->return_date }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($booker->returned == 0)
                                        <div>
                                            <p type="button" class="bg-[red] text-white w-fit px-2 rounded">
                                                {{$booker->returned ? 'YES':'NO'}}
                                            </p>
                                        </div>
                                        @else
                                        <div>
                                            <p type="button" class="bg-[green] text-white w-fit px-2 rounded">
                                                {{$booker->returned ? 'YES':'NO'}}
                                            </p>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($booker->returned_status == 1)
                                        <div>
                                            {{$booker->returned_status ? 'GOOD' : 'POOR' }}
                                        </div>
                                        @else
                                        <div>
                                            {{$booker->returned_status ? 'GOOD':'POOR'}}
                                        </div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('librarian.bookers.destroy',$booker->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('librarian.bookers.show', $booker->id) }}" class="bg-green-800 text-white px-2 py-1 transition delay-300 duration-300 ease-in-out inline-flex mx-0.5 rounded">
                                                Details
                                            </a>
                                            <a href="{{ route('librarian.bookers.edit', $booker->id) }}" class="bg-yellow-500 text-white py-1 px-2 inline-flex mx-0.5 rounded">
                                                Edit
                                            </a>
                                            <button type="submit" class="transition bg-red-700 text-white py-1 px-2 inline-flex mx-0.5 rounded" onclick="return confirm('Are you sure to delete {{$booker->book->title}}?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                            @empty
                                    <td colspan="10" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                                        No books issued to {{ $student->full_name }} at the moment.
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
</x-frontend-main>
@endsection





