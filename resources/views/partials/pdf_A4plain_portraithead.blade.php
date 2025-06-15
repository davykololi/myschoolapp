<head>
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 4.5cm;margin-left: 2cm;margin-right: 2cm;margin-bottom: 1.2cm;width: 100%;height: 100%}
        header{position: fixed;top: 0.5cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        footer{position: fixed;bottom: 0.5cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        #portrait_logo{position: fixed;bottom:12cm;left:5.5cm;width:8cm;height:8cm;z-index:-10px;opacity:0.2;}
        .hr_portrait_bottom{width: 82%;border-top: 10px groove brown;}
        .table-left{text-align: left;}
        .bgcolor-grey{background-color: grey}
        .uc{text-transform: uppercase;}
        .main-heading {text-align: center;margin-right:3.3cm;color: midnightblue;font-size: 40px;}
        .school_margin{margin-top: -1em;margin-bottom: -0.6em;margin-right: 185px;text-align: center;font-family: Arial Narrow;}
        .email_margin{margin-top: 0.5em;margin-bottom: 10px;margin-right: 185px;text-align: center;font-family: Arial Narrow;}
        .postal-mt {margin-top: -25px;margin-right: 185px;text-align: center;font-family: Arial Narrow;}
        #table_style{width: 100%;page-break-inside: always;}
        .table_caption{text-transform: uppercase;text-align: center;margin-top: 1cm;font}
        .table_row{text-transform: uppercase;}
        .page-break{page-break-after: always;}
        .center{text-align: center;margin-right}
        .left{text-align: left;}
        .right{text-align: right;}
        .margin{margin: 500px;margin-left: 130px;margin-right: 130px;}
        .title{text-align: center;text-transform: uppercase;margin-top: -10px;width: 100%;}
        .blue{color: blue;}
        .purple{color: purple;}
        .mt{margin-top: -40px}
        .dotted-underline{border-bottom: 2px dotted #000;}
        table{width: 82%;margin-left: -5px;border-collapse: collapse;}
        th, td {padding: 3px;white-space: nowrap;border: 1px solid black; }
        thead tr {background-color: midnightblue;color: white;height: 20px;}
        thead tr td {height: 0.75cm;}
    </style>
    @include('partials.pdf_page_script')
</head>