@extends('layouts.app')

@section('content')


    <header class="mx-5 my-2 position-relative">
        <img style="border-radius: 0.9em" src="/image/banner.jpg" height="250px" width="800px">
        <div class="d-flex justify-content-between">
            <div class="my-2 mx-1">
                <h3>{{$user->name}}</h3>
                <p class="text-muted" style="font-size: 14px">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="align-self-center">
                <button class="btn btn-outline-dark rounded-pill">Edit Profile</button>
                <button class="btn btn-primary rounded-pill">Follow me</button>
            </div>
        </div>
        <p class="mx-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut
            labore et dolore magna aliqua. </p>

        <img src="{{$user->avatar}}" class="rounded-circle mr-2 position-absolute"
             style="width: 150px;left: calc(50% - 75px); top:164px;"/> <!-- Profile Image of Profile page-->

    </header>


    @include('timeline_loop',['tweets'=>$user->tweets])
@endsection
