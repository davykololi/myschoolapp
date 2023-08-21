<script src="{{ mix('js/app.js') }}"></script>
<!-- CKEditor Scripts -->
{{ Html::script('ckeditor/ckeditor.js') }}

{{ Html::script('ckeditor/adapters/jquery.js') }}
<script>
    if(document.getElementById("summary-ckeditor")){
        CKEDITOR.replace( 'summary-ckeditor');
        }
</script>
