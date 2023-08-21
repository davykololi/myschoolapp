<head>
    <title>@yield('title')</title>
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 4.5cm;margin-left: 2.7cm;margin-bottom: 2cm;height: 100%;margin-right: 3cm;width: 100%}
        header{position: fixed;top: 1cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        footer{position: fixed;bottom: 2cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        #landscape_logo{position: fixed;bottom:15cm;left:5.5cm;width:8cm;height:8cm;z-index:  -10px;opacity: .6;}
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
        .title{text-align: center;text-transform: uppercase;}

        table{border-collapse: collapse;border: 1px solid #514F33;width: 81%;margin-left: 3px;}
        th, td {padding: 3px;white-space: nowrap;border-right: 1px solid #514F33; }

        tbody tr:nth-child(odd) {background-color: #FFEDD2;}
        tbody tr:nth-child(even) {background-color: #D8CCBA;} 
    </style>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>