@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
  <!-- frontend-main view -->
  <x-frontend-main>
                    <div>
                        <h1 class="uppercase">{{$user->stream->name}} Awards</h1>
                    </div>
                    <div>
                        <ol>
                            @forelse($user->stream->rewards as $reward)
                            <li>
                                {{ $reward->name }}. <span class="text-[green]">Purpose:</span> {{ $reward->purpose }}.
                            @empty
                            <p class="text-[red]">{{$user->stream->name}} has notyet recieved any award. Work hard!!</p>
                            </li>
                            @endforelse
                        </ol>
                    </div>
  </x-frontend-main>
@endsection


