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
                <div class="pull-left">
                    <h2>LETTERS LIST</h2>
                </div>
                <div class="items-center justify-center py-8">
                    <a type="button" href="{{route('admin.letter.head',Auth::user()->school->id)}}" class="bg-orange-500 text-white px-2 rounded mx-2 tracking-tight inline-flex" style="float:right">
                        LETTER HEAD
                    </a>
                    <a type="button" href="{{ route('admin.instantdownload.form') }}" class="bg-green-800 text-white px-2 rounded mx-2 tracking-tight inline-flex" style="float:right">
                        GENERATE PDF
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
                                        <form action="{{route('admin.letters.destroy',$letter->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('admin.letters.show', $letter->id) }}" class="bg-green-800 text-white px-2 py-1 transition delay-300 duration-300 ease-in-out inline-flex mx-0.5 rounded">
                                                Details
                                            </a>
                                            <a type="button" href="{{ route('admin.letters.edit', $letter->id) }}" class="bg-yellow-500 text-white py-1 px-2 inline-flex mx-0.5 rounded">
                                                Edit
                                            </a>
                                            <button type="submit" class="bg-[red] text-white py-1 px-2 inline-flex mx-0.5 rounded" onclick="return confirm('Are you sure to delete')">
                                                Delete
                                            </button>
                                            <a type="button" href="{{route('admin.school.letters',$letter->id)}}" class="bg-orange-500 text-white px-2 py-1 inline-flex mx-0.5 rounded">
                                                PDF
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
