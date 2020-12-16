<div class="p-4" style="background-color: #E8F5Fd">
    <h4 class="mb-2">Follwing</h4>

    <ul  style="list-style-type: none; padding-inline-start:0px;">
        @foreach(auth()->user()->follows as $following_user)
        <li>
            <div class="d-flex align-items-center mb-2" style="font-size: 14px">
                <img src="{{$following_user->avatar}}" class="rounded-circle mr-2">{{$following_user->name}}
            </div>
        </li>

        @endforeach

    </ul>
</div>
