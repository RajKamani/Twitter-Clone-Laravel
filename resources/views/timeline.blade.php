<div class="mt-2 mx-5 border" style="border-radius: 10px; border-color: Black;">
    <div class="d-flex m-3">
        <div>

         <a href="{{route('profile',$tweet->user)}}"><img height="40" width="40" src="{{$tweet->user->avatar}}" class="rounded-circle mr-2 " style="flex-shrink: 0;"/></a>
        </div>

        <div class="ml-1">
       <a style="text-decoration: none; color: #000000" href="{{route('profile',$tweet->user)}}"><h5 class="font-weight-bold">{{ !empty($tweet->user->name) ? $tweet->user->name : "not" }}</h5></a>
            <p>{{ $tweet->body }} </p>
        </div>
    </div>
</div>
