
@extends('layouts.admin')
@section('title', '| Admin Dashboard')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
@role('admin')
<div class="max-w-screen h-screen border mx-8 my-4 containr">
    <div class="row w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div>
                <div class="mt-4">
                    <h2 class="text-center text-2xl font-bold uppercase underline">Admin Dashboard</h2>
 
                    <div class="text-center text-lg font-bold uppercase">
                        You are logged in as {{ Auth::user()->admin->position->value }}
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row lg:flex-row mt-8 gap-4">
                <div class="w-full md:w-1/4 lg:w-1/4">
                    <h2 class="leading-tight">
                        The school has {{ $males }} male and {{ $females }} female students, totaling to {{ $allStudents }} students all-together.
                    </h2>
                    <h3 class="text-center font-hairline underline mt-8">STUDENTS GENDER GRAPH</h3>
                    <canvas data-te-chart="bar" data-te-dataset-label="Gender" data-te-labels="['Males', 'Females']" data-te-dataset-data="[{{ $males}}, {{ $females }}]" data-te-dataset-background-color="['rgba(63, 81, 181, 0.5)', 'rgba(77, 182, 172, 0.5)']" data-te-dark-ticks-color="#ff0000" data-te-dark-grid-lines-color="#ffff00" data-te-dark-label-color="#ff00ff">
                    </canvas>
                </div>
                <div class="w-full md:w-1/4 lg:w-1/4 bg-gray-100">
                    <span class="container relative" style="position: relative; width: 500px; height:300px;">
                    {!! $studentsChart->container() !!}
                    </span>
                </div>

                <div class="w-full md:w-1/4 lg:w-1/4 bg-gray-100">
                    <span class="container relative flex flex-grow" style="position: relative; width: 500px; height:300px;">
                    {!! $teachersChart->container() !!}
                    </span>
                </div>

                <script src="{{ $studentsChart->cdn() }}"></script>
                {{ $studentsChart->script() }}

                <script src="{{ $teachersChart->cdn() }}"></script>
                {{ $teachersChart->script() }}
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 mt-8">
                <div style="width: 80%; margin: auto;">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole
</x-backend-main>
@endsection

@push('scripts')
<script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'Data',
                    data: @json($data['data']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endpush






