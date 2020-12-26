<div class="p-3 flex-fill" style="background-color: #E8F5Fd; border-radius: 0.9em">
    <h4 class="mb-2">Following</h4>

    <ul style="list-style-type: none; padding-inline-start:0px;">
        @forelse(auth()->user()->follows as $following_user)
            <li>
                <div class=" mb-2" style="font-size: 14px">
                    <a class="d-flex align-items-center" style="text-decoration: none; color: #000000"
                       href="{{route('profile',$following_user->username)}}">
                        <img height="40" width="40"
                             src="{{$following_user->avatar}}"
                             class="rounded-circle mr-2">{{$following_user->name}}
                    </a>

                </div>
            </li>
        @empty

            <p class="text-danger text-capitalize">No friends yet.</p>

        @endforelse

    </ul>
</div>
