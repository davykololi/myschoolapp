<head>
    <title>@yield('title')</title>
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 4.5cm;margin-left: 2.7cm;margin-bottom: 2cm;height: 100%;margin-right: 3cm;width: 100%}
        header{position: fixed;top: 1cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        footer{position: fixed;bottom: 1.7cm;left: 0cm;right: 0cm;height: 1.5cm;line-height: 0.5cm;}
        #landscape_logo{position: fixed;bottom:15cm;left:10cm;top:6cm ;width:8cm;height:8cm;opacity: .2;z-index: -10px;}
        .landscape_hr_top{width: 82%;border-top: 10px groove brown;margin-top: 5px;}
        .landscape_hr_bottom{width: 82%;border-top: 10px groove brown;margin-top: 0.5cm;left: 0;}
        .table-left{text-align: left;}
        .bgcolor-grey{background-color: grey}
        .uc{text-transform: uppercase;}
        .school_margin{margin-top: -0.5em;margin-bottom: -0.5em;}
        .email_margin{margin-top: 0.5em;}
        #table_style{page-break-inside: always;}
        .table_caption{text-transform: uppercase;text-align: center;}
        .table_row{text-transform: uppercase;}
        .page-break{page-break-after: always;}
        .center{text-align: center;}
        .left{text-align: left;}
        .right{text-align: right;}
        .margin{margin: 500px;margin-left: 130px;margin-right: 130px;}
        .title{text-align: center;text-transform: uppercase;margin-top: -20px;}
        table {width: 82%;margin-left: -3px;border-collapse: collapse;}
        th, td {border: 1px solid black;}
        thead tr {background-color: midnightblue; color: white;}
        thead tr td {height: 0.75cm;}
    </style>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>