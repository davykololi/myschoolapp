<x-superadmin>
  <!-- frontend-main view -->
  <x-backend-main>
<div>
    <div class="w-full">
    <!-- Posts list -->
    @if(!empty($students))
        <div class="w-full">
            <div class="">
                <div class="text-center py-4">
                    <h2 class="uppercase text-2xl font-bold underline">STUDENTS LIST</h2>
                </div>
                <div class="pt-8 uppercase text-center font-2xl">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
        </div>
        <div class="flex flex-col overflow-x-auto md:mx-2">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="15%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ADM NO</th>
                                    <th scope="col" class="px-2 py-4" width="10%">CLASS</th>
                                    <th scope="col" class="px-2 py-4" width="10%">PHONE</th>
                                    <th scope="col" class="px-2 py-4" width="5%">BANNED</th>
                                    <th scope="col" class="px-2 py-4" width="10%">BANNED ST</th>
                                    <th scope="col" class="px-2 py-4" width="10%">LOCKED</th>
                                    <th scope="col" class="px-2 py-4" width="10%">LOCK ST</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($students as $student)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->full_name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->admission_no }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->stream->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->phone_no }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($student->is_banned == 1)
                                        <div class="text-[red]">{{ __('YES') }}</div>
                                        @else
                                        <div class="text-[green]">{{ __('NO') }}</div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            @if($student->is_banned == 0)
                                            <form action="{{ route('superadmin.student.bann',$student->id) }}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button type="submit" class="text-[red]">BANN</button>
                                            </form>
                                            @elseif($student->is_banned == 1)
                                            <form action="{{ route('superadmin.student.unbann',$student->id) }}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button type="submit" class="text-[green]">LIFT BANN</button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($student->lock === "disabled")
                                        <div class="text-[green]">{{ __('YES') }}</div>
                                        @else
                                        <div class="text-[red]">{{ __('NO') }}</div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            @if($student->lock === "enabled")
                                            <form action="{{ route('superadmin.student.lock',$student->id) }}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button type="submit" class="text-[green]">LOCK</button>
                                            </form>
                                            @elseif($student->lock === "disabled")
                                            <form action="{{ route('superadmin.student.unlock',$student->id) }}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button type="submit">
                                                    <x-academicon-open-access class="text-red-500"/>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <div class="my-4 dark:text-slate-200">
                                    {{ $students->links() }}
                                </div>
                            </tfoot>
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
