@extends('layouts.pdf_landscape_marksheet')

@section('title')
    {{ $class->school->name }}
@endsection

@section('content')
<div class="container-fluid box"> 
    <x-pdf-landscape2-current-date/>
    <div><h2 class="title"><u>{{$title}}</u></h2></div> 

        <div>
            <div id="chartDiv"></div>
        </div>
            <div style="margin-left: 150px">
                <br/>
                <b><u>NB:</u></b>
                <ul>
                    @if(!is_null($passMark))
                    <li><span style="margin: 20px">PASS MARK: {{ $passMark }} MARKS</span></li>
                    <li><span style="color: green;margin: 20px">P</span>: PASS </li>
                    <li><span style="color: red;margin: 20px">F</span>: FAIL </li>
                    @else
                    <li><span style="margin: 20px">NO PASS MARK PROVIDED</span></li>
                    @endif
                </ul>
            </div>

            <div style="margin-bottom: 2cm;">
                <h4>{{ __('Summary')}}</h4>
                    <p>
                        {{ $class->students->count() }} {{ $class->name }} Students sat for {{ $exam->name }}. That's ({{ $males }} Males & {{ $females }} Females).
                    </p>
                    <p>Highest mark: {{ $totals->max() }}</p>
                    <p>Median mark: {{ $totals->median() }}</p>
                    <p>Lowest mark: {{ $totals->min() }}</p>

                    <h5>{{ __('Mathematics') }}</h5>
                    <p>Maths highest: {{ $maths->max() }}</p>
                    <p>Maths lowest: {{ $maths->min() }}</p>
                    <h5>{{ __('English') }}</h5>
                    <p>English highest: {{ $english->max() }}</p>
                    <p>English Lowest: {{ $english->min() }}</p>
                    <h5>{{ __('Kiswahili') }}</h5>
                    <p>Kiswahili highest: {{ $kiswahili->max() }}</p>
                    <p>Kiswahili lowest: {{ $kiswahili->min() }}</p>
                    <h5>{{ __('Chemistry') }}</h5>
                    <p>Chemistry highest: {{ $chemistry->max() }}</p>
                    <p>Chemistry lowest: {{ $chemistry->min() }}</p>
                </p>
            </div>
    </div>
</div>
@endsection

<script src="https://www.google.com/jsapi"></script> 
<script type="text/javascript">
    window.onload = function(){
        google.load("visualization", "1.1", {
            packages: ["corechart"],
            callback: 'drawChart'
        });
    };

    function drawChart(){
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Pizza');
        data.addColumn('number', 'Popularity');
        data.addRows([
            ['Laravel', 33],
            ['cog', 26],
            ['Sym', 22],
            ['Cake', 10],
            ['Slim', 9],

        ]);

        var options = {
            title: "Popularity of Types of Frameworks",
            sliceVisibilityThreshhold: .2
        };

        var chart = new google.visualization.Piechart(document.getElementById('chartDiv'));
        chart.draw(data, options);
    }
</script>  
