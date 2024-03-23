@extends('layouts.matron')
 
@section('content')
@role('matron')
<x-frontend-main>
<div class="max-w-screen h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8">
            <div class="">
                <div>
                    <div>
                        <h2 class="uppercase text-center text-2xl font-bold">Dormitories</h2>
                    </div>
                    <div class="pt-4">
                        <ol>
                            @foreach($dormitories as $dormitory)
                            <li>
                                <a href="{{route('matron.dormitory',$dormitory->id)}}">
                                    {{ $dormitory->name }} dormitory has {{ $dormitory->students->count()}} students. It's headed by {{ $dormitory->dom_head }} and assisted by {{ $dormitory->ass_head }}.
                                </a>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
