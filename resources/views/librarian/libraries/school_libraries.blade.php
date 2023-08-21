@extends('layouts.librarian')
@section('title', '| Librarian School Libraries')

@section('content')
<x-frontend-main>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 style="text-transform: uppercase;">{{$school->name}} Libraries</h3></div>
                    <div class="panel-body">
                        <div>
                            @if(!empty($schoolLibraries))
                            @forelse($schoolLibraries as $key => $library)
                            <div>
                                <a href="{{route('librarian.school.library',$library->id)}}">
                                    <h1 style="text-transform: uppercase;"><b>{!! $library->name !!}</b></h1>
                                </a>
                            </div>
                            @empty
                                <p>Currently {{$school->name}} has no Libraries.</p>
                            @endforelse
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend-main>
@endsection
