<ul style="list-style-type: none; padding-inline-start:0px;">
    <li>
        <a class="font-weight-bold mb-4 d-inline-block" style="color:#1d68a7; font-size: medium"
           href="{{route('home')}}">Home</a>
    </li>
    <li>
        <a class="font-weight-bold mb-4 d-inline-block" style="color:#1d68a7; font-size: medium"
           href="{{ route('explore',auth()->user()->username) }}">Explore</a>
    </li>

    <li>
        <a class="font-weight-bold mb-4 d-inline-block" style="color:#1d68a7; font-size: medium"
           href="{{route('profile',auth()->user()->username)}}">Profile</a>
    </li>

    <li>
        <a class="font-weight-bold mb-4 d-inline-block" style="color:#1d68a7; font-size: medium"
           href="">More</a>
    </li>
</ul>
