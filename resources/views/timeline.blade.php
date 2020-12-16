<div class="mt-2 mx-5 border" style="border-radius: 10px; border-color: Black;">
    <div class="d-flex m-3">
        <div>
            <img src="{{$tweet->user->avatar}}" class="rounded-circle mr-2 " style="flex-shrink: 0;"/>
        </div>

        <div class="ml-1">
            <h5 class="font-weight-bold">{{ !empty($tweet->user->name) ? $tweet->user->name : "not" }}</h5>
            <p>{{ $tweet->body }} </p>
        </div>
    </div>
</div>
