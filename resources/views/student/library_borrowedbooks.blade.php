@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
  <div class="w-full">
    <div class="mx-2 md:mx-8 lg:mx-8">
      <!-- ====== Table Section Start -->
      <section class="py-2 md:py-4 lg:py-4">
        <div class="container mx-auto">
          <div class="-mx-4 flex flex-wrap">
            <div class="w-full">
              <div class="max-w-full overflow-x-auto">
                <table class="w-full table-auto border-l border-transparent">
                  <caption class="table_caption">
                    <h2 class="mb-4 uppercase font-extrabold text-2xl text-white dark:text-slate-400"><u>{{$title}}</u></h2>
                  </caption>
                  <thead>
                    <tr class="bg-black text-center dark:bg-stone-600">
                      <th class="min-w-[160px] py-2 px-3 text-lg font-semibold text-white lg:px-4" style="width: 5%;" >
                        NO
                      </th>
                      <th class="min-w-[160px] py-2 px-3 text-lg font-semibold text-white lg:px-4" style="width: 40%;">
                        TITLE
                      </th>
                      <th class="min-w-[160px] py-2 px-3 text-lg font-semibold text-white lg:px-4" style="width: 15%;">
                        ISSUED
                      </th>
                      <th class="min-w-[160px] py-2 px-3 text-lg font-semibold text-white lg:px-4" style="width: 15%;">
                        RETURN
                      </th>
                      <th class="min-w-[160px] py-2 px-3 text-lg font-semibold text-white lg:px-4" style="width: 25%;">
                        REM DAYS
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($borrowedBooks))
                    @foreach($borrowedBooks as $key => $borrowedBook)
                    <tr>
                      <td class="text-[#25215F] border-b border-l border-[#E8E8E8] bg-[#F3F6FF] p-2 text-center text-base font-medium dark:bg-slate-900 dark:text-slate-400">
                        {{ $loop->iteration }}
                      </td>
                      <td class="text-[#25215F] border-b border-[#E8E8E8] bg-white p-2 text-center text-base font-medium dark:bg-gray-700 dark:text-slate-400">
                        {{$borrowedBook->book->title}}
                      </td>
                      <td class="text-[#25215F] border-b border-[#E8E8E8] bg-[#F3F6FF] p-2 text-center text-base font-medium dark:bg-slate-900 dark:text-slate-400">
                        {{ $borrowedBook->issued_date }}
                      </td>
                      <td class="text-[#25215F] border-b border-[#E8E8E8] bg-white p-2 text-center text-base font-medium dark:bg-gray-700 dark:text-slate-400">
                        {{ $borrowedBook->return_date }}
                      </td>
                      <td class="text-[#25215F] border-b border-[#E8E8E8] bg-[#F3F6FF] p-2 text-center text-base font-medium dark:bg-slate-900 dark:text-slate-400">
                        @if($borrowedBook->converted_return_date < now())
                        <div class="bg-[red] py-2 text-white">Time Elapsed</div>
                        @else
                        {{ number_format(\Carbon\Carbon::parse(\Carbon\Carbon::now())->floatDiffInDays($borrowedBook->converted_return_date),0) }} Days.
                        @endif
                      </td>
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                  <tfoot>
                    @if($borrowedBooks->isEmpty())
                    <tr>
                      <td colspan="12" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400 h-12">
                        {{ __("You haven't borrowed books from the library at the moment (Ensure you utilize the library well)") }}
                      </td>
                    </tr>
                    @endif
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
</x-frontend-main>
@endsection
