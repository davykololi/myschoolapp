<head>
    <title>@yield('title')</title>
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 2cm;margin-left: 2cm;margin-right: 2cm;margin-bottom: 2cm;width: 100%;}
        header{position: fixed;top: 0cm;left: 0cm;right: 0cm;height: 2cm;text-align: center;line-height: 0.5cm;}
        footer{position: fixed;bottom: 0cm;left: 0cm;right: 0cm;height: 2.5cm;text-align: center;line-height: 0.5cm;}
        table{width: 82%;border: 2px solid black; margin-left: -5px;}
        thead tr {background-color: midnightblue;color: white;}
        tbody tr:nth-child(odd) {background-color: #FFEDD2;line-height: 25px;}
        tbody tr:nth-child(even) {background-color: #D8CCBA;line-height: 25px;}
        tfoot tr:nth-child(odd) {background-color: lightgray;line-height: 25px;}
        tfoot tr:nth-child(even) {background-color: dimgray;line-height: 25px;} 
        .hr_portrait_bottom{width: 82%;border-top: 10px groove brown;}
        .table-left{text-align: left;}
        .table-center{text-align: center;}
        .bgcolor-grey{background-color: grey;text-align: left;}
        .uc{text-transform: uppercase;margin-right: 1.5cm}
        .school_margin{margin-top: -0.5em;margin-bottom: -0.5em;}
        .email_margin{margin-top: 0.5em;margin-bottom: 1em;}
        .table_caption{text-transform: uppercase;text-align: center;margin-top: 0;margin-bottom: -04em;}
        .title{text-transform: uppercase;text-align: center;margin-top: 20px;font-style: Arial Narrow}
        .uppercase{text-transform: uppercase;}
    </style>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
