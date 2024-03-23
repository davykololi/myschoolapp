@extends('layouts.student')
@section('title', '| Student Dashboard')

@section('content') 
<!-- frontend-main view -->
<x-frontend-main>
  <div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
      <div class="mx-2 md:mx-8 lg:mx-8">
        <div>
          <h2 class="text-2xl text-center">STUDENT DASHBOARD</h2>
  
          <p class="text-left">Tailwind CSS works by scanning all of your HTML files, JavaScript components, and any other templates for class names, generating the corresponding styles and then writing them to a static CSS file. It's fast, flexible, and reliable — with zero-runtime.
          </p>

          <div class="mx-auto w-full overflow-hidden mt-6">
            <h4 class="text-center font-bold">{{ __('PERFORMANCE PROGRESS') }}</h4>
            @if(!empty($marks))
            @forelse($marks as $mark)
            <canvas
                data-te-chart="line"
                data-te-dataset-label="Performance Progress"
                data-te-labels="{{ $mark->exam->name }}"
                data-te-dataset-data="{{ $mark->student_minscore }}">
            </canvas>
            @empty
            <p>{{ __('Performance Progress Notyet Initiated')}}</p>
            @endforelse
            @endif
          </div>
          
        </div>
      </div>
    </div>
  </div>
</x-frontend-main>
@endsection
