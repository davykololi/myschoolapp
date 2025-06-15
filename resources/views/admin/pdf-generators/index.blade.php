@extends('layouts.admin')
@section('title', '| Pdfs List')

@section('content')
@role('admin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            <div class="max-w-full">
                <div class="col-lg-12 margin-tb">
                    <div>
                        <h2 class="admin-h2">GENERATE PDF's</h2>
                    </div>
                    <div class="items-center py-8">
                        <a type="button" href="{{ route('admin.instantdownload.form') }}" style="float:right">
                            <x-pdf-svg/>
                        </a>
                        <a type="button" class="bg-blue-700 text-white px-2 rounded mx-2 inline-flex" href="{{route('admin.pdf-generators.create')}}" style="float:right"> 
                            Create
                        </a>
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
                                        <th scope="col" class="px-2 py-4" width="10%">NO</th>
                                        <th scope="col" class="px-2 py-4" width="45%">CONTENT</th>
                                        <th scope="col" class="px-2 py-4" width="35%">CREATED</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if(!empty($pdfGenerators))
                                    @foreach($pdfGenerators as $pdfGenerator)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $loop->iteration }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{!! $pdfGenerator->excerpt() !!}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $pdfGenerator->created_at }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('admin.pdf-generators.destroy',$pdfGenerator->id)}}" method="POST" class="flex flex-row">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" href="{{ route('admin.pdf-generators.show', $pdfGenerator->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a type="button" href="{{ route('admin.pdf-generators.edit', $pdfGenerator->id) }}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete')">
                                                    <x-delete-svg/>
                                                </button>
                                                <a type="button" href="{{route('admin.pdf.generation',$pdfGenerator->id)}}">
                                                    <x-pdf-svg/>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($pdfGenerators->isEmpty())
                                    <tr>
                                        <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                                            <div>Data notyet populated.</div>
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
