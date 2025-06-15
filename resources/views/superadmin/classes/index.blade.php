<x-superadmin>
@role('superadmin')
    <!-- frontend-main view -->
    <x-backend-main>
    <div class="max-w-full p-8 md:p-8 lg:p-8 shadow-2xl">
    <div class="">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($classes))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>CLASSES LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.classes.create')}}"> Create Class</a>
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
                                    <th scope="col" class="px-2 py-4" width="30%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="20%">STUDENTS</th>
                                    <th scope="col" class="px-2 py-4" width="10%">MALES</th>
                                    <th scope="col" class="px-2 py-4" width="10%">FEMALES</th>
                                    <th scope="col" class="px-2 py-4" width="10%">LOCK</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($classes as $key => $class)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            {{ $classes->perPage() * ($classes->currentPage() - 1) + $key + 1 }}
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $class->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $class->students->count() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $class->males() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $class->females() }}</div>
                                    </td>
                                    <td>
                                        <div>
                                            @if(($class->students->isNotEmpty()) && ($class->studentsInfoUnlocked()))
                                            <form action="{{ route('superadmin.lockClassStudentsInfo') }}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="class_id" value="{{ $class->id }}">
                                                <button type="submit">
                                                    <x-academicon-open-access class="w-8 h-8 text-red-800"/>
                                                </button>
                                            </form>
                                            @elseif(($class->students->isNotEmpty()) && ($class->studentsInfoLocked()))
                                            <form action="{{ route('superadmin.unlockClassStudentsInfo') }}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="class_id" value="{{ $class->id }}">
                                                <button type="submit">
                                                    <x-academicon-closed-access class="w-8 h-8 text-green-800"/>
                                                </button>
                                            </form>
                                            @else
                                            {{ __('--------')}}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('superadmin.classes.destroy',$class->id)}}" method="POST" class="flex flex-row">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{route('superadmin.classes.show',$class->id)}}">
                                                <x-show-svg/>
                                            </a>
                                            <a type="button" href="{{route('superadmin.classes.edit',$class->id)}}">
                                               <x-edit-svg/>
                                            </a>
                                            <button type="submit" onclick="return confirm('Are you sure to delete {{$class->name}}?')">
                                                <x-delete-svg/>
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
@endrole
</x-superadmin>








