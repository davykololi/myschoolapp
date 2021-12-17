<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.pdf_head')
</head>
<body>
    @include('partials.pdf_header')
    @include('partials.pdf_school_footer') 
    <br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>{!! $letter->content !!}</p>
            </div>
        </div>
    </div>
</body>
</html>
