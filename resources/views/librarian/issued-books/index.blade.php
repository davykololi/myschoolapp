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
            <div class="flex flex-col md:flex-row justify-between items-center">
                <x-search-form/>
                <div class="inline-block">
                    <a href="{{route('librarian.borrowed.excel')}}" class="transition bg-green-800 text-white p-2 rounded mx-2 tracking-tight">
                        ISSUED BOOKS EXCEL
                    </a>
                    <a href="{{route('librarian.borrowed.pdf')}}" class="transition bg-orange-700 text-white p-2 rounded mx-2 tracking-tight">
                        ISSUED BOOKS PDF
                    </a>
                    <a href="{{route('librarian.elapsedTime.issuedBooks')}}" class="transition bg-orange-700 text-white p-2 rounded mx-2 tracking-tight">
                        TIME ELAPSED ISSUED BOOKS PDF
                    </a>
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
                                        <th scope="col" class="px-2 py-4" width="20%">TITLE</th>
                                        <th scope="col" class="px-2 py-4" width="20%">ISSUED TO</th>
                                        <th scope="col" class="px-2 py-4" width="10%">SERIAL</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ISSUED</th>
                                        <th scope="col" class="px-2 py-4" width="10%">RETURN</th>
                                        <th scope="col" class="px-2 py-4" width="10%">RETURNED</th>
                                        <th scope="col" class="px-2 py-4" width="10%">STATUS</th>
                                        <th scope="col" class="px-2 py-4" width="5%">TIME</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if(!empty($issuedBooks))
                                    @foreach($issuedBooks as $key => $issuedBook)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                {{ $issuedBooks->perPage() * ($issuedBooks->currentPage() - 1) + $key + 1 }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$issuedBook->book->title}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$issuedBook->student->user->full_name}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$issuedBook->serial_no}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $issuedBook->issued_date }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $issuedBook->return_date }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if($issuedBook->returned == 0)
                                            <div>
                                                <label type="button" class="danger-label">
                                                    {{$issuedBook->returned ? 'YES':'NO'}}
                                                </label>
                                            </div>
                                            @else
                                            <div>
                                                <label type="button" class="success-label">
                                                    {{$issuedBook->returned ? 'YES':'NO'}}
                                                </label>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if($issuedBook->returned_status == 1)
                                            <div>
                                                <label type="button" class="success-label">
                                                    {{ __('GOOD') }}
                                                </label>
                                            </div>
                                            @else
                                            <div>
                                                <label type="button" class="danger-label">
                                                    {{ __('POOR') }}
                                                </label>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if(($issuedBook->converted_return_date) < (\Carbon\Carbon::now()))
                                            <div>
                                                <label type="button" class="danger-label">{{ __('ELAPSED') }}</label>
                                            </div>
                                            @else
                                            <div>
                                                <label type="button" class="success-label">{{ __('OK') }}</label>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($issuedBooks->isEmpty())
                                    <tr>
                                        <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                                            No books issued at the moment.
                                        </td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                        <div class="my-4">
                            {{ $issuedBooks->links() }}
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
