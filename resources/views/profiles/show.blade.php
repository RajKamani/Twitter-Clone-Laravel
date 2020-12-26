@extends('layouts.app')

@section('content')


    <header class="mx-5 my-2 position-relative">

        <div class="position-relative mx-5">

            <img style="border-radius: 0.9em" src="{{$user->banner}}" height="250px" width="750px">
            <img src="{{$user->avatar}}" class="rounded-circle mr-2 position-absolute " height="150" width="150"
                 style="left: 50%;transform: translateX(-50%) translateY(100%); border: #FFFFFF 5px solid;"/>

        </div>

        <div class="d-flex justify-content-between mx-5">
            <div class="my-2 mx-1">
                <div class="d-flex justify-content-between align-items-center">
                    <div style="max-width: 232px"><h4>{{$user->name}}</h4>
                        <h6 class=" text-muted">{{'@'.$user->username}}</h6></div>
                </div>
                <p class="text-muted" style="font-size: 14px">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="d-flex align-self-center">
                @if(auth()->user()->is($user))
                    <form method="get" action="{{route('edit.profile',$user->username)}}">
                        <button class="btn btn-outline-dark rounded-pill mr-2">Edit Profile</button>
                    </form>
                @endif

                @if(auth()->user()->isNot($user))
                    <form method="post" action="{{route('follow',$user->username)}}">
                        @csrf
                        <button type="submit"
                                class="btn btn-primary rounded-pill">{{auth()->user()->is_following_already($user) ? 'Unfollow me': 'Follow me'}}</button>
                    </form>
                @endif
            </div>
        </div>

        <div class="d-flex mx-5">
            <div class="d-flex">
                <h4 style="font-size: 14px">{{$user->follows->count()}}</h4>
                <h4 style="font-size: 14px" class="text-muted px-2"> Following </h4>
            </div>
            <div class="d-flex">
                <h4 style="font-size: 14px">100M</h4>
                <h4 style="font-size: 14px" class="text-muted px-2"> Followers </h4>
            </div>
        </div>

        <p class="mx-5 font-weight-bold">{{$user->bio}} </p>


    </header>


    @include('timeline_loop',['tweets'=>$tweets])
@endsection
