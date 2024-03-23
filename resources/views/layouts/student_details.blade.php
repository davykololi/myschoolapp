<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title')</title>
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 2cm;margin-bottom: 2cm;margin-left: 1.9cm;margin-right: 1.9cm;width: 100%}
        header{position: fixed;top: 0.5cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        footer{position: fixed;bottom: 0.5cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        h2 {text-align: center;text-transform: uppercase;font-size: 35px;}
        h3 {color: midnightblue;margin-bottom: 8px;}
        .hr_portrait_bottom{width: 82%;border-top: 10px groove brown;}
        .table-left{text-align: left;}
        .bgcolor-grey{background-color: grey}
        .uc{text-transform: uppercase;}
        .school_margin{margin-top: -1em;margin-bottom: -0.6em;margin-left: 22em;font-family: Arial Narrow;}
        .email_margin{margin-top: 0.5em;margin-bottom: 10px;margin-left: 22em;}
        .postal-mt {margin-top: -25px;margin-left: 22em;font-family: Arial Narrow;}
        #table_style{width: 100%;page-break-inside: always;}
        .table_caption{text-transform: uppercase;text-align: center;margin-top: 1cm;}
        .table_row{text-transform: uppercase;}
        .page-break{page-break-after: always;}
        .center{text-align: center;}
        .main-heading {text-align: center;margin-right: 1.5cm;color: midnightblue;font-size: 40px;}
        .left{text-align: left;}
        .right{text-align: right;}
        .margin{margin: 500px;margin-left: 130px;margin-right: 130px;}
        .mt{margin-top: 120px}
        .td {background-color: lightgray;padding: 2px;width: 30%;text-transform: uppercase;font-size: 20px;}
        .p1 {margin-top: 10px;font-family: Calibri;text-align: center;text-transform: uppercase;font-size: 20px;}
        table{width: 82%; border: 1px solid black;}
        th, td {padding: 3px;white-space: nowrap; } 
    </style>
</head>
<body>
    <!-- Define header and footer blocks before your content -->
    @include('partials.pdf_portrait_header')
    @include('partials.pdf_portrait_school_footer')
    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        @yield('content')
    </main>
    @include('partials.pdf_portrait_scripts')
</body>
</html>
