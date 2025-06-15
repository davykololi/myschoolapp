@extends('layouts.student')
@section('title', '| Student Dashboard With Exams Results')

@section('content') 
<!-- frontend-main view -->
<x-frontend-main>
  <div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
      <div class="mx-2 md:mx-8 lg:mx-8">
        <div class="mt-4">
          <h2 class="text-2xl text-center">STUDENT DASHBOARD</h2>
          <div class="mt-8 flex flex-grow mx-auto pt-4 bg-white dark:bg-stone-500">
            <div class="text-black">
              <span class="container relative" style="position: relative; width: 500px; height:300px;">
                {!! $studentExamsMiniScoresChart->container() !!}
              </span>
            </div>
            <script src="{{ $studentExamsMiniScoresChart->cdn() }}"></script>
              {{ $studentExamsMiniScoresChart->script() }}
          </div>
          <div class="mt-8 flex flex-grow mx-auto pt-4 bg-white dark:bg-stone-500">
            <div class="text-black">
              <span class="container relative" style="position: relative; width: 500px; height:300px;">
                {!! $studentExamSubjectsResultsChart->container() !!}
              </span>
            </div>
            <script src="{{ $studentExamSubjectsResultsChart->cdn() }}"></script>
              {{ $studentExamSubjectsResultsChart->script() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-frontend-main>
@endsection
