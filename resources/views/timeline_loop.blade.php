@forelse ($tweets as $tweet)
    @include('timeline')

@empty
    <div class="mt-2 mx-5 border" style="border-radius: 10px; border-color: Black;">
        <div class="m-3"><p class="text-danger text-capitalize">No tweets yet.</p></div>
    </div>

@endforelse
{{$tweets->links()}}

