
@extends('layouts.admin')
@section('title', '| Admin Dashboard')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
@role('admin')
<div class="max-w-screen h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div>
                <div class="mt-4">
                    <h2 class="text-center text-2xl font-bold uppercase">Admin Dashboard</h2>
 
                    <div class="text-center text-lg font-bold uppercase">
                        You are logged in as {{ Auth::user()->admin->position->value }}
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 mt-8">
                <div>
                    <h2 class="leading-tight">
                        The school has {{ $males }} male and {{ $females }} female students, totaling to {{ $allStudents }} students all-together.
                    </h2>
                    <h3 class="text-center font-hairline underline mt-8">STUDENTS GENDER GRAPH</h3>
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
    </div>
</div>
@endrole
</x-backend-main>
@endsection

