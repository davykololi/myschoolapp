@extends('layouts.teacher')
@section('title', '| Teacher Dashboard')

@section('content')
@role('teacher')
    <!-- frontend-main view -->
    <x-frontend-main>
            <div class="container max-w-screen h-screen">
                <div class="w-full">
                    <div class="mx-2 md:mx-8 lg:mx-8">
                        <div class="">
                            <div class="text-center text-2xl font-bold uppercase">Teacher Dashboard</div>

                            <div class="mt-8">
                                Welcome {{ Auth::user()->salutation }} {{Auth::user()->first_name}}. You are logged in as a Teacher!
                            </div>

                            <label class="swap swap-flip text-9xl mt-12">
                                <!-- this hidden checkbox controls the state -->
                                <input type="checkbox"/>
                                <div class="swap-on">😈</div>
                                <div class="swap-off">😇</div>
                            </label>

                            <div class="avatar">
                                <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                    <img src="{{ asset('/static/avatarb.jpg')}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </x-frontend-main>
@endrole
@endsection
