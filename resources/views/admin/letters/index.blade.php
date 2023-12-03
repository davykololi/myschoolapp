<x-admin> 
  <!-- frontend-main view -->
  <x-backend-main>
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($letters))
        <div class="max-w-full">
            <div class="col-lg-12 margin-tb">
                <div>
                    <h2 class="admin-h2">GENERATE PDF's</h2>
                </div>
                <div class="items-center py-8">
                    <a type="button" href="{{ route('admin.instantdownload.form') }}" class="pdf" style="float:right">
                        <x-pdf-svg/>
                    </a>
                    <a type="button" class="bg-blue-700 text-white px-2 rounded mx-2 inline-flex" href="{{route('admin.letters.create')}}" style="float:right"> 
                        Create
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col overflow-x-auto mt-12">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="10%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="40%">CONTENT</th>
                                    <th scope="col" class="px-2 py-4" width="25%">CREATED</th>
                                    <th scope="col" class="px-2 py-4" width="25%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($letters as $letter)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{!! $letter->excerpt() !!}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$letter->created_at}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('admin.letters.destroy',$letter->id)}}" method="POST" class="flex flex-row">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('admin.letters.show', $letter->id) }}" class="show">
                                                <x-show-svg/>
                                            </a>
                                            <a type="button" href="{{ route('admin.letters.edit', $letter->id) }}" class="edit">
                                                <x-edit-svg/>
                                            </a>
                                            <button type="submit" class="delete" onclick="return confirm('Are you sure to delete')">
                                                <x-delete-svg/>
                                            </button>
                                            <a type="button" href="{{route('admin.school.letters',$letter->id)}}" class="pdf">
                                                <x-pdf-svg/>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
</div>
</x-backend-main>
</x-admin>
