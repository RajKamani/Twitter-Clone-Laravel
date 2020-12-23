@extends('layouts.app')

@section('content')


    @foreach($users as $user)
        <div class="d-flex m-3 align-items-center px-5">
            <img src="{{$user->avatar}}" width="50" height="50" class="rounded-circle">

            <div class="mx-3 my-2">
                <a href="{{route('profile',$user->username)}}" style="color: #000000;text-decoration-line: none"
                   class="font-weight-bold">{{'@'.$user->username}}</a>
            </div>
        </div>
    @endforeach
    {{-- <div class="d-flex">
         {{$users->links()}}
     </div>--}}

@endsection
