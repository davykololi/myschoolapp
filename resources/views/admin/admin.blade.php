
@extends('layouts.admin')
@section('title', '| Admin Dashboard')

@section('content')
  <!-- frontend-main view -->
  <x-backend-main>
    <div class="max-w-screen h-fit">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin Dashboard</div>
 
                    <div class="panel-body">
                        You are logged in as admin with 
                        @if(Auth::user()->studentRegistrar())
                        {{ __('Student Registrar Role') }}
                        @endif
                        @if(Auth::user()->academicRegistrar())
                        {{ __('Academic Registrar Role') }}
                        @endif
                        @if(Auth::user()->ordinayAdmin())
                        {{ __('Ordinary Admin Role') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 mt-8">
            <div>
                <h2 class="leading-tight">
                    The school has {{ $males }} male and {{ $females }} female students, totaling to {{ $allStudents }} students all-together.
                </h2>
                <h3 class="text-center font-hairline underline">STUDENTS GENDER GRAPH</h3>
                <canvas data-te-chart="bar" data-te-dataset-label="Gender" data-te-labels="['Males', 'Females']" data-te-dataset-data="[{{ $males}}, {{ $females }}]" data-te-dataset-background-color="['rgba(63, 81, 181, 0.5)', 'rgba(77, 182, 172, 0.5)']" data-te-dark-ticks-color="#ff0000" data-te-dark-grid-lines-color="#ffff00" data-te-dark-label-color="#ff00ff">
                </canvas>
            </div>

            <div>
                <div class="p-6 m-20 bg-white rounded shadow">
                    {!! $chart->container() !!}
                </div>
            </div>
            <script src="{{ $chart->cdn() }}"></script>
            {{ $chart->script() }}
        </div>
    </div>
  </x-backend-main>
@endsection

