@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div>
                <h1 class="uppercase">{{$user->student->stream->name}} Awards</h1>
            </div>
            <div>
                <ol>
                @forelse($user->student->stream->rewards as $reward)
                    <li>
                        {{ $reward->name }}. <span class="text-[green]">Purpose:</span> {{ $reward->purpose }}.
                    </li>
                </ol>
                @empty
                    <p class="text-[red]">{{$user->student->stream->name}} has notyet recieved any award. Work hard!!</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection


