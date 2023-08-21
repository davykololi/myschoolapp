<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title')</title>
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 2cm;margin-bottom: 2cm;margin-left: 1.9cm;margin-right: 1.9cm;width: 100%}
        header{position: fixed;top: 1cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        footer{position: fixed;bottom: 0.5cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        .hr_portrait_bottom{width: 82%;border-top: 10px groove brown;}
        .table-left{text-align: left;}
        .bgcolor-grey{background-color: grey}
        .uc{text-transform: uppercase;}
        .school_margin{margin-top: -0.5em;margin-bottom: -0.5em;}
        .email_margin{margin-top: 0.5em;}
        #table_style{width: 100%;page-break-inside: always;}
        .table_caption{text-transform: uppercase;text-align: center;margin-top: 1cm;}
        .table_row{text-transform: uppercase;}
        .page-break{page-break-after: always;}
        .center{text-align: center;}
        .left{text-align: left;}
        .right{text-align: right;}
        .margin{margin: 500px;margin-left: 130px;margin-right: 130px;}
        .title{text-align: center;text-transform: uppercase;margin-top: 90px;}

        table{width: 82%; border: 1px solid black;}
        th, td {padding: 3px;white-space: nowrap; } 
    </style>
</head>
<body>
    <!-- Define header and footer blocks before your content -->
    @include('partials.pdf_portrait_header')
    @include('partials.pdf_portrait_school_footer')
    <br/>
    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        @yield('content')
    </main>
    @include('partials.pdf_portrait_scripts')
</body>
</html>
