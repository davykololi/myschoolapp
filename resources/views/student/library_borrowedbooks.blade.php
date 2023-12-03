@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
<div class="w-full h-screen">
<!-- ====== Table Section Start -->
<section class="py-2 md:py-4 lg:py-4">
  <div class="container mx-auto">
    <div class="-mx-4 flex flex-wrap">
      <div class="w-full">
        <div class="max-w-full overflow-x-auto">
          <table class="w-full table-auto border-l border-transparent">
            <caption class="table_caption">
              <h2 class="mb-4 uppercase font-extrabold text-2xl text-[#25215F] dark:text-slate-400"><u>{{$title}}</u></h2>
            </caption>
            <thead>
              <tr class="bg-black text-center dark:bg-stone-600">
                <th
                  class="min-w-[160px] py-2 px-3 text-lg font-semibold text-white lg:px-4"
                style="width: 10%;" >
                  NO
                </th>
                <th
                  class="min-w-[160px] py-2 px-3 text-lg font-semibold text-white lg:px-4" style="width: 25%;">
                  TITLE
                </th>
                <th
                  class="min-w-[160px] py-2 px-3 text-lg font-semibold text-white lg:px-4" style="width: 15%;">
                  ISSUED
                </th>
                <th
                  class="min-w-[160px] py-2 px-3 text-lg font-semibold text-white lg:px-4" style="width: 15%;">
                  RETURN
                </th>
                <th
                  class="min-w-[160px] py-2 px-3 text-lg font-semibold text-white lg:px-4" style="width: 35%;">
                  REM TIME
                </th>
              </tr>
            </thead>
            <tbody>
                @if(!empty($borrowedBooks))
                @forelse($borrowedBooks as $key => $borrowedBook)
              <tr>
                <td
                  class="text-[#25215F] border-b border-l border-[#E8E8E8] bg-[#F3F6FF] p-2 text-center text-base font-medium dark:bg-slate-900 dark:text-slate-400">
                  {{ $loop->iteration }}
                </td>
                <td
                  class="text-[#25215F] border-b border-[#E8E8E8] bg-white p-2 text-center text-base font-medium dark:bg-gray-700 dark:text-slate-400">
                  {{$borrowedBook->book->title}}
                </td>
                <td
                  class="text-[#25215F] border-b border-[#E8E8E8] bg-[#F3F6FF] p-2 text-center text-base font-medium dark:bg-slate-900 dark:text-slate-400">
                  {{ $borrowedBook->issued_date }}
                </td>
                <td
                  class="text-[#25215F] border-b border-[#E8E8E8] bg-white p-2 text-center text-base font-medium dark:bg-gray-700 dark:text-slate-400"
                >
                  {{ $borrowedBook->return_date }}
                </td>
                <td
                  class="text-[#25215F] border-b border-[#E8E8E8] bg-[#F3F6FF] p-2 text-center text-base font-medium dark:bg-slate-900 dark:text-slate-400">
                  {{ now()->diffInDays(\Carbon\Carbon::createFromFormat('d/m/Y',$borrowedBook->return_date)->format('d-m-Y H:i')) }} Days
                    {{ now()->diff(\Carbon\Carbon::createFromFormat('d/m/Y',$borrowedBook->return_date)->format('d-m-Y H:i'))->format('%H Hours %I Minutes %S Seconds') }}
                </td>
                @empty
                <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                    No borrowed books from the library at the moment (Ensure you utilize the library well)
                </td>
              </tr>
                @endforelse
                @endif
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Table Section End -->
</div>
</x-frontend-main>
@endsection
