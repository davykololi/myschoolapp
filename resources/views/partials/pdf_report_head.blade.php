<head>
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 2cm;margin-left: 2cm;margin-right: 2cm;margin-bottom: 2cm;width: 100%;}
        header{position: fixed;top: 0.5cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        footer{position: fixed;bottom: 0cm;left: 0cm;right: 0cm;height: 2.5cm;text-align: center;line-height: 0.5cm;}
        table{width: 82%;border: 2px solid black; margin-left: -5px;}
        thead tr {background-color: midnightblue;color: white;}
        tbody tr:nth-child(odd) {background-color: lightgray;line-height: 25px;}
        tbody tr:nth-child(even) {background-color: lightgray;line-height: 25px;} 
        tfoot tr:nth-child(odd) {background-color: lightgray;line-height: 25px;}
        tfoot tr:nth-child(even) {background-color: lightgray;line-height: 25px;}
        .hr_portrait_bottom{width: 82%;border-top: 10px groove brown;}
        .table-left{text-align: left;}
        .table-center{text-align: center;}
        .bgcolor-grey{background-color: grey;text-align: left;}
        .uc{text-transform: uppercase;margin-right: 1.5cm}
        .main-heading {text-align: center;margin-right: 1.5cm;color: midnightblue;font-size: 40px;}
        .school_margin{margin-top: -1em;margin-bottom: -0.6em;margin-left: 22em;font-family: Arial Narrow;}
        .email_margin{margin-top: 0.5em;margin-bottom: 10px;margin-left: 22em;}
        .postal-mt {margin-top: -25px;margin-left: 22em;font-family: Arial Narrow;}
        .table_caption{text-transform: uppercase;text-align: center;margin-top: 0;margin-bottom: -04em;}
        .title{text-transform: uppercase;text-align: center;margin-top: 10px;font-style: Arial Narrow}
        .uppercase{text-transform: uppercase;}
        .dotted-underline{border-bottom: 2px dotted #000;}
    </style>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
