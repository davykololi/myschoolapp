<x-superadmin>
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full p-8 md:p-8 lg:p-8 shadow-2xl">
    <div class="w-full">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($years))
        <div class="row">
            <div class="col-lg-12 margin-tb">
               <div class="pull-left">
                     <h2 class="text-center uppercase font-bold text-2xl underline">YEARS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.years.create')}}">Create</a>
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
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">YEAR</th>
                                    <th scope="col" class="px-2 py-4" width="20%">STATUS</th>
                                    <th scope="col" class="px-2 py-4" width="30%">DESCRIPTION</th>
                                    <th scope="col" class="px-2 py-4" width="25%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($years as $key => $year)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$year->year}}</div>
                                    </td>
                                    @if($year->year === date('Y'))
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div class="bg-red-700 px-2 py-1 text-white text-center rounded w-[150px]">{{__('Current')}}</div>
                                    </td>
                                    @else
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div class="bg-[green] px-2 py-1 text-white text-center rounded w-[150px]">{{__('Reserved')}}</div>
                                    </td>
                                    @endif
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$year->desc}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('superadmin.years.destroy',$year->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('superadmin.years.show', $year->id) }}" class="bg-green-800 text-white px-2 py-1 transition delay-300 duration-300 ease-in-out inline-flex mx-0.5 rounded">
                                                Details
                                            </a>
                                            <a href="{{ route('superadmin.years.edit', $year->id) }}" class="bg-yellow-500 text-white py-1 px-2 inline-flex mx-0.5 rounded">
                                                Edit
                                            </a>
                                            <button type="submit" class="bg-[red] text-white py-1 px-2 inline-flex mx-0.5 rounded" onclick="return confirm('Are you sure to delete?')">
                                                Delete
                                            </button>
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
</x-superadmin>

