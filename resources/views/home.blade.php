@extends('layouts.app')

@section('content')

    <div class="d-flex  mt-3">
        <div class="">
            @include('sidebar_links')
        </div>
        <div class="flex-fill">
            @include('tweetarea')

            @foreach  ($tweets as $tweet)
            @include('timeline')
            @endforeach

        </div>
        <div class="justify-content-end">
            @include('friends_list')
        </div>

    </div>
@endsection
