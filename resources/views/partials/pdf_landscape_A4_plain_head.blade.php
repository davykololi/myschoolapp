<head>
    <title>@yield('title')</title>
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 4.5cm;margin-left: 2.7cm;margin-bottom: 2cm;height: 100%;margin-right: 3cm;width: 100%}
        header{position: fixed;top: 0.3cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        footer{position: fixed;bottom: 1.7cm;left: 0cm;right: 0cm;height: 1.1cm;line-height: 0.5cm;}
        #landscape_logo{position: fixed;bottom:15cm;left:10.5cm;top:6cm;width:8cm;height:8cm;z-index: -10px;opacity: 0.2;}
        .landscape_hr_top{width: 91%;border-top: 10px groove brown;margin-top: 10px;}
        .landscape_hr_bottom{width: 91%;border-top: 10px groove brown;}
        .table-left{text-align: left;}
        .bgcolor-grey{background-color: grey}
        .uc{text-transform: uppercase;}
        .school_margin{margin-top: -0.8em;margin-bottom: -0.4em;margin-left: 32em;font-family: Arial Narrow;}
        .email_margin{margin-top: 0.5em;margin-bottom: 10px;margin-left: 32em;}
        .postal-mt {margin-top: -28px;margin-left: 32em;font-family: Arial Narrow;}
        .main-heading {text-align: center;margin-right: 1.5cm;color: midnightblue;letter-spacing: 7px;}
        #table_style{page-break-inside: always;}
        .table_caption{text-transform: uppercase;text-align: center;}
        .table_row{text-transform: uppercase;}
        .page-break{page-break-after: always;}
        .center{text-align: center;}
        .left{text-align: left;}
        .right{text-align: right;}
        .margin{margin: 500px;margin-left: 130px;margin-right: 130px;}
        .title{text-align: center;text-transform: uppercase;margin-top: -20px;}
        .top-bottom-pad{padding-top: 10px;padding-bottom: 10px;}
        .blue{color: blue;}
        .ft-line-height {line-height: 0.5px;}
        .table-footer{color: midnightblue;font-style: Times New Roman;}
        .mt{margin-top: -50px}
        h2 {text-transform: uppercase;text-align: center;margin-top: -10px;}
        table {width: 91%;margin-left: -80px;border-collapse: collapse;}
        th, td {border: 1px solid black;}
        thead tr {background-color: midnightblue;color: white;height: 20px;} 
        thead tr td {height: 0.75cm;}
    </style>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>