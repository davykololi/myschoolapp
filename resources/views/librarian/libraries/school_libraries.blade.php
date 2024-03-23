@extends('layouts.librarian')
@section('title', '| Librarian School Libraries')

@section('content')
<x-frontend-main>
    <div class="max-w-screen mb-8 h-screen">
        <div class="w-full">
            <div class="mx-2 md:mx-8">
                <div class="panel panel-default">
                    <div><h3 class="text-center text-2xl font-bold uppercase">{{$school->name}} Libraries</h3></div>
                    <div class="mt-8">
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
