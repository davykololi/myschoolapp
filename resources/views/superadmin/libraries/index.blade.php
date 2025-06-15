@extends('layouts.superadmin')
@section('title', '| Libraries List')

@section('content')
@role('superadmin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>LIBRARIES LIST</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{route('superadmin.libraries.create')}}">Create</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col overflow-x-auto mt-12">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                        <th scope="col" class="px-2 py-4" width="15%">NAME</th>
                                        <th scope="col" class="px-2 py-4" width="10%">CODE</th>
                                        <th scope="col" class="px-2 py-4" width="15%">PHONE</th>
                                        <th scope="col" class="px-2 py-4" width="20%">LIBRARIAN.</th>
                                        <th scope="col" class="px-2 py-4" width="20%">ASS LIB</th>
                                        <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if($libraries->isNotEmpty())
                                    @foreach($libraries as $key => $library)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                {{ $libraries->perPage() * ($libraries->currentPage() - 1) + $key + 1 }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$library->name}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$library->code}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$library->phone_no}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$library->lib_head}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$library->lib_asshead}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('superadmin.libraries.destroy',$library->id)}}" method="POST" class="flex flex-row">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('superadmin.libraries.show', $library->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a href="{{ route('superadmin.libraries.edit', $library->id) }}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete {{$library->name}}?')">
                                                    <x-delete-svg/>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($libraries->isEmpty())
                                    <tr>
                                        <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                                            <div>Libraries Notyet populated.</div>
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
</x-backend-main>
@endrole
@endsection
