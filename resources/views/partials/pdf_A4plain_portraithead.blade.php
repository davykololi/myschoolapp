<head>
    <title>@yield('title')</title>
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 4.5cm;margin-left: 2cm;margin-right: 2cm;margin-bottom: 1.2cm;height: 100%;width: 95%}
        header{position: fixed;top: 0.5cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        footer{position: fixed;bottom: 0.5cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        #portrait_logo{position: fixed;bottom:15cm;left:5.5cm;width:8cm;height:8cm;z-index:  -10;opacity: .2;}
        .hr_portrait_bottom{width: 82%;border-top: 10px groove brown;margin-top: 0.5cm}
        .table-left{text-align: left;}
        .bgcolor-grey{background-color: grey}
        .uc{text-transform: uppercase;}
        .school_margin{margin-top: -0.5em;margin-bottom: -0.5em;}
        .email_margin{margin-top: 0.5em;}
        #table_style{width: 100%;page-break-inside: always;}
        .table_caption{text-transform: uppercase;text-align: center;margin-top: 1cm;}
        .table_row{text-transform: uppercase;}
        .page-break{page-break-after: always;}
        .center{text-align: center;margin-right: 1.5cm}
        .left{text-align: left;}
        .right{text-align: right;}
        .margin{margin: 500px;margin-left: 130px;margin-right: 130px;}
        .title{text-align: center;text-transform: uppercase;}

        table{border-collapse: collapse;border: 1px solid #514F33; width:85%; }
        th, td {padding: 3px;white-space: nowrap;border-right: 1px solid #514F33; }

        tbody tr:nth-child(odd) {border: 1px solid black;}
        tbody tr:nth-child(even) {border: 1px solid black;} 
    </style>
    @include('partials.pdf_page_script')
</head>