<head>
    <title>@yield('title')</title>
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 4.5cm;margin-left: 1.9cm;margin-right: 1.9cm;margin-bottom: 2cm;width: 100%}
        header{position: fixed;top: 1cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        footer{position: fixed;bottom: 0.5cm;left: 0cm;right: 0cm;height: 3cm;line-height: 0.5cm;}
        #landscape_logo{position: fixed;bottom:12cm;left:16cm;width:8cm;height:8cm;z-index: -10px;opacity: .2;}
        .landscape_hr_top{width: 91%;border-top: 10px groove brown;margin-top: 5px;left: 0cm;}
        .landscape_hr_bottom{width: 91%;border-top: 10px groove brown;margin-top: 10px;left: 0;}
        .table-left{text-align: left;}
        .bgcolor-grey{background-color: grey}
        .uc{text-transform: uppercase;}
        .school_margin{margin-top: -0.5em;margin-bottom: -0.5em;}
        .email_margin{margin-top: 0.5em;}
        #table_style{page-break-inside: always;}
        .table_caption{text-transform: uppercase;text-align: center;margin-top: 1cm;}
        .table_row{text-transform: uppercase;}
        .page-break{page-break-after: always;}
        .center{text-align: center;}
        .left{text-align: left;}
        .right{text-align: right;}
        .margin{margin: 500px;margin-left: 130px;margin-right: 130px;}
        .title{text-align: center;text-transform: uppercase;}
        .blue{color: blue;}
        .checked {color: orange;}

        table{border-collapse: collapse;border: 1px solid #514F33;width: 91%}
        th, td {padding: 3px;white-space: nowrap;border-right: 1px solid #514F33;}
        thead tr {color:white;background-color: midnightblue;}
        thead tr td {height: 0.75cm;}
        tbody tr:nth-child(odd) {background-color: #FFEDD2;}
        tbody tr:nth-child(even) {background-color: #D8CCBA;} 
        tfoot tr {color:black;background-color: darkgray;}
        tfoot tr td{height: 0.75cm;}
    </style>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
</head>