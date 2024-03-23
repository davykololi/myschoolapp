<head>
    <title>@yield('title')</title>
    <style>
        @page{margin:0cm 0cm;}
        body{margin-top: 4.5cm;margin-left: 2cm;margin-right: 2cm;margin-bottom: 1.2cm !important;height: 100%; width: 100%}
        header{position: fixed;top: 0.5cm;left: 0cm;right: 0cm;height: 2cm;line-height: 0.5cm;}
        footer{position: fixed;bottom: 0.5cm;left: 0cm;right: 0cm;height: 2.8cm;line-height: 0.5cm;}
        #portrait_logo{position: fixed;bottom:12cm;left:5.5cm;width:8cm;height:8cm;z-index:-10px;opacity:0.2;}
        .hr_portrait_bottom{width: 82%;border-top: 10px groove brown;}
        .hr_receipt_bottom{width: 82%;border-top: 2px dashed;}
        .table-left{text-align: left;}
        .uc{text-transform: uppercase;}
        .school_margin{margin-top: -1.1em;margin-bottom: -0.6em;margin-left: 22em;font-family: Arial Narrow;}
        .email_margin{margin-top: 0.4em;margin-bottom: 10px;margin-left: 22em;}
        .postal-mt {margin-top: -28px;margin-left: 22em;font-family: Arial Narrow;}
        .page-break{page-break-after: always;}
        .center{text-align: center;}
        .main-heading {text-align: center;margin-right: 1.5cm;color: midnightblue;font-size: 40px;}
        .left{text-align: left;}
        .right{text-align: right;}
        .margin{margin: 500px;margin-left: 130px;margin-right: 130px;}
        .receipt-name{border-bottom: 3px dotted #000; text-decoration: none !important;}
        .uppercase{text-transform: uppercase;}
        .mb{margin-bottom: 15px;}
        .mnb{color: midnightblue;}
        .receipt-title{text-align: center;text-transform: uppercase;margin-top: -45px;font-family: Arial Narrow;}
        .arial-narrow{font-style: Arial Black;}
        .right{float: right;margin-right: 20px;}
        .mt{margin-top: -40px}
    </style>
    @include('partials.pdf_page_script')
</head>