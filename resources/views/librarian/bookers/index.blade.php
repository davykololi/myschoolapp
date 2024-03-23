@extends('layouts.librarian')
@section('title', '| Issued Books')

@section('content')
@role('librarian')
<x-frontend-main>
<div class="max-w-full h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
    <!-- Posts list -->
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="w-full">
                <div class="items-center justify-center mb-4">
                    <h2 class="text-center font-bold uppercase text-2xl">ISSUED BOOKS</h2>
                </div>
                <div class="text-center mx-2 mt-8">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
            <div class="text-right">
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
            <div class="mt-12">
                <div class="w-full flex flex-col md:flex-row">
                    <div class="w-full md:w-1/2 lg:w-1/2 md:mr-32 md:mx-0">
                        <form action="{{route('librarian.issuedbook.returnDate')}}" method="get" class="shadowed-border">
                            {{ csrf_field() }}
                            <label for="return_date" class="uppercase font-bold">Issued Books By Return Date pdf</label>
                            <div class="block mt-2">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" id="return_date" name="return_date" class="w-full bg-transparent" placeholder="Select Date">
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-get-button/>
                            </div>
                        </form>
                    </div>

                    <div class="w-full md:w-1/2 lg:w-1/2 md:ml-32 md:mx-0">
                        <form action="{{route('librarian.issuedbook.issuedDate')}}" method="get" class="shadowed-border">
                            {{ csrf_field() }}
                            <label for="issued_date" class="uppercase font-bold">Issued Books By Date of Issue pdf</label>
                            <div class="block mt-2">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" id="issued_date" name="issued_date" class="w-full bg-transparent" placeholder="Select Date">
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
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
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
                                    @if(!empty($bookers))
                                    @foreach($bookers as $key => $booker)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $loop->iteration}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$booker->student->user->full_name}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$booker->book->title}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$booker->serial_no}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $booker->issued_date }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $booker->return_date }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if($booker->returned == 0)
                                            <div>
                                                <label type="button" class="bg-[red] text-white w-full px-2 rounded text-center">
                                                    {{$booker->returned ? 'YES':'NO'}}
                                                </label>
                                            </div>
                                            @else
                                            <div>
                                                <label type="button" class="bg-[green] text-white w-fit px-2 rounded">
                                                    {{$booker->returned ? 'YES':'NO'}}
                                                </label>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if($booker->returned_status == 1)
                                            <div>
                                                <label type="button" class="bg-[green] text-white w-full px-2 rounded text-center">
                                                    {{$booker->returned_status ? 'GOOD' : 'POOR' }}
                                                </label>
                                            </div>
                                            @else
                                            <div>
                                                <label type="button" class="bg-[green] text-white w-full px-2 rounded text-center">
                                                    {{$booker->returned_status ? 'GOOD':'POOR'}}
                                                </label>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('librarian.bookers.destroy',$booker->id)}}" method="POST" class="inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('librarian.bookers.show', $booker->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a href="{{ route('librarian.bookers.edit', $booker->id) }}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete {{$booker->book->title}}?')">
                                                    <x-delete-svg/>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($bookers->isEmpty())
                                    <tr>
                                        <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                                            No books issued at the moment.
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
@endrole
@endsection
