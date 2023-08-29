@extends('layouts.librarian')
@section('title', '| Issued Books')

@section('content')
<x-frontend-main>
<div class="max-w-full">
    <div class="w-full">
    <!-- Posts list -->
    @if(!empty($bookers))
        <div class="max-w-full">
            <div class="">
                <div class="items-center justify-center mb-4">
                    <h2 class="text-center font-bold uppercase text-2xl">ISSUED BOOKS</h2>
                </div>
                <div class="text-center mt-8">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
            <div style="float:right;">
                <a type="button" class="transition bg-blue-500 text-white p-2 rounded md:hover:text-blue-500 md:hover:bg-white dark:bg-black dark:text-slate-400 dark:hover:text-black mx-2 tracking-tight" href="{{route('librarian.bookers.create')}}">
                    ISSUE
                </a>
                <a href="{{route('librarian.borrowed.excel')}}" class="transition bg-green-800 text-white p-2 rounded mx-2 tracking-tight">
                    EXCEL
                </a>
                <a href="{{route('librarian.borrowed.pdf')}}" class="transition bg-orange-700 text-white p-2 rounded mx-2 tracking-tight">
                    PDF
                </a>
            </div>
            <div class="mt-12 border-2 border-white py-4 mt-24 md:mt-20 dark:border-slate-600 dark:text-slate-400">
                <div class="w-full flex flex-col md:flex-row">
                <form action="{{route('librarian.issuedbook.returnDate')}}" method="get" class="flex-grow" style="margin-left: 40px">
                    {{ csrf_field() }}
                    <div class="w-full md:w-1/2 lg:w-1/2">
                        <label for="return_date" class="uppercase font-bold">Issued Books By Return Date pdf</label>
                        <div class=" mt-2">
                            <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                <input type="text" id="return_date" name="return_date" class="w-full bg-transparent" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-get-button/>
                    </div>
                </form>


                <form action="{{route('librarian.issuedbook.issuedDate')}}" method="get" class="flex-grow" style="margin-left: 40px">
                    {{ csrf_field() }}
                    <div class="w-full md:w-1/2 lg:w-1/2">
                        <label for="issued_date" class="uppercase font-bold">Issued Books By Date of Issue pdf</label>
                        <div class="flex-1 mt-2">
                            <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                <input type="text" id="issued_date" name="issued_date" class="w-full bg-transparent" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-get-button/>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <hr class="mt-2" style="border: double grey"/>
        <div class="flex flex-col overflow-x-auto mt-4">
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
                            @forelse($bookers as $key => $booker)
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
                                    <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                                        No books issued at the moment.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
</div>
</x-frontend-main>
@endsection
