@extends('layouts.staff')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sub Staff Assignments</div>
                    <div class="panel-body">
                        @if(!empty(Auth::user()->assignments))
                        @forelse(Auth::user()->assignments as $key=>$assignment)
                        	{{$assignment->name}}
                        @empty
                        <p style="color: red">No Assignment to {{Auth::user()->full_name}}.</p>
                        @endforelse
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
