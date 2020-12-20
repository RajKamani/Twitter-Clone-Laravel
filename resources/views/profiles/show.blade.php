@extends('layouts.app')

@section('content')

    <!-- Profile Page Header -->
    <header class="mx-5 my-2 position-relative">
        <div class="position-relative">

            <img style="border-radius: 0.9em" src="/image/banner.jpg" height="250px" width="800px">
            <img src="{{$user->avatar}}" class="rounded-circle mr-2 position-absolute " width="150"
                 style="left: 50%;transform: translateX(-50%) translateY(100%); border: #FFFFFF 5px solid;"/>
            <!-- Profile Image of Profile page-->
        </div>
        <div class="d-flex justify-content-between">
            <div class="my-2 mx-1">
                <h3>{{$user->name}}</h3>
                <p class="text-muted" style="font-size: 14px">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="d-flex align-self-center">
                @if(auth()->user()->is($user))
                    <form method="get" action="{{route('edit.profile',$user->name)}}">
                        <button class="btn btn-outline-dark rounded-pill mr-2">Edit Profile</button>
                    </form>
                @endif

                @if(auth()->user()->isNot($user))
                    <form method="post" action="{{route('follow',$user->name)}}">
                        @csrf
                        <button type="submit"
                                class="btn btn-primary rounded-pill">{{auth()->user()->is_following_already($user) ? 'Unfollow me': 'Follow me'}}</button>
                    </form>
                @endif
            </div>
        </div>

        <div class="d-flex mx-1">
            <div class="d-flex">
                <h4>{{$user->follows->count()}}</h4>
                <h4 class="text-muted px-2"> Following </h4>
            </div>
            <div class="d-flex">
                <h4>100M</h4>
                <h4 class="text-muted px-2"> Followers </h4>
            </div>
        </div>

        <p class="mx-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut
            labore et dolore magna aliqua. </p>


    </header>


    @include('timeline_loop',['tweets'=>$user->tweets])
@endsection
