<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <style>
        .pie-chart {
            width: 600px;
            height: 400px;
            margin: 0 auto;
        }
        .text-center{
            text-align: center;
        }
    </style>
</head>
<body>
   
<h2 class="text-center">Laravel 8 Generate PDF with Chart</h2>
   
<div id="chartDiv" class="pie-chart"></div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>   
<script type="text/javascript">
    window.onload = function() {
        google.load("visualization", "1.1", {
            packages: ["corechart"],
            callback: 'drawChart'
        });
    };
   
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Pizza');
        data.addColumn('number', 'Populartiy');
        data.addRows([
            ['Mathematics', {{ $maths->avg() }}],
            ['English', {{ $english->avg() }}],
            ['Kiswahili', {{ $kiswahili->avg() }}],
            ['Chemistry', {{ $chemistry->avg() }}],
            ['Biology', {{ $biology->avg() }}],
            ['Physics', {{ $physics->avg() }}],
            ['CRE', {{ $cre->avg() }}],
            ['Islam', {{ $islam->avg() }}],
            ['Geography', {{ $geography->avg() }}],
            ['History', {{ $history->avg() }}]
        ]);
   
        var options = {
            title: 'Subjects Mean Scores',
            sliceVisibilityThreshold: .2
        };
   
        var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));
        chart.draw(data, options);
    }
</script>
</body>
</html>
