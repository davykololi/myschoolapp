<x-admin> 
  <!-- frontend-main view -->
  <x-backend-main>
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>LETTER DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.letters.index') }}" class="label label-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School:</strong>
            {{ $letter->school->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Content</strong>
            {!! $letter->content !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($letter->created_at)) }}</span>
        </div>
    </div>
</div>
</x-backend-main>
</x-admin>
