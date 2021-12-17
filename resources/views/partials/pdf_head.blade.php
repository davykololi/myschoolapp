<head>
    <title>@yield('title')</title>
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 2cm;margin-left: 2cm;margin-right: 2cm;margin-bottom: 2cm;}
        header{position: fixed;top: 0cm;left: 0cm;right: 0cm;height: 2cm;text-align: center;line-height: 0.5cm;}
        footer{position: fixed;bottom: 0cm;left: 0cm;right: 0cm;height: 2cm;text-align: center;line-height: 0.5cm;}
        .hr_bottom{width: 85%;border-top: 10px groove brown;}
        .table-left{text-align: left;}
        .table-center{text-align: center;}
        .bgcolor-grey{background-color: grey}
        .uc{text-transform: uppercase;}
        .school_margin{margin-top: -0.5em;margin-bottom: -0.5em;}
        .email_margin{margin-top: 0.5em;margin-bottom: 1em;}
        #table_style{width: 100%;page-break-inside: always;margin-left: 80px}
        .table_caption{text-transform: uppercase;text-align: center;margin-top: 5em;margin-bottom: -04em;}
        .title{text-transform: uppercase;text-align: center;margin-top: 30px;margin-bottom: 0}
        .table_row{text-transform: uppercase;}
        tr,td{border: 1px solid black}
    </style>
    @include('partials.pdf_script')
</head>