<head>
    <title>@yield('title')</title>
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 4.5cm;margin-left: 2cm;margin-right: 2cm;margin-bottom: 1.2cm !important;height: 100%; width: 100%}
        header{position: fixed;top: 0.5cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        footer{position: fixed;bottom: 0.5cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        h1{color: midnightblue;}
        #portrait_logo{position: fixed;bottom:12cm;left:5.5cm;width:8cm;height:8cm;z-index:-10px;opacity:.2;}
        .hr_portrait_bottom{width: 82%;border-top: 10px groove brown;}
        .table-left{text-align: left;}
        .bgcolor-grey{background-color: grey}
        .uc{text-transform: uppercase;}
        .main-heading {text-align: center;margin-right: 1.5cm;color: midnightblue;font-size: 40px;}
        .school_margin{margin-top: -1em;margin-bottom: -0.6em;margin-left: 22em;font-family: Arial Narrow;}
        .email_margin{margin-top: 0.5em;margin-bottom: 10px;margin-left: 22em;}
        .postal-mt {margin-top: -25px;margin-left: 22em;font-family: Arial Narrow;}
        #table_style{width: 100%;page-break-inside: always;}
        .table_caption{text-transform: uppercase;text-align: center;margin-top: 1cm;}
        .table_row{text-transform: uppercase;}
        .page-break{page-break-after: always;}
        .center{text-align: center;margin-right: 1.5cm}
        .left{text-align: left;}
        .right{text-align: right;}
        .margin{margin: 500px;margin-left: 130px;margin-right: 130px;}
        .title{text-align: center;text-transform: uppercase;margin-top: -20px;}
        .blue{color: blue;}
        .white{background-color: white}
        .table-footer{background-color: purple; color: white}
        .tf-line-height{line-height: 0.5px;margin-bottom: 0;height: 0.25cm;}
    </style>
    @include('partials.pdf_page_script')
</head>