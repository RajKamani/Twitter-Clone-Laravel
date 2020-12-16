<div class="border mx-5 " style="border-radius: 10px; border-color: Black;">

    <form method="post" action="{{route('tweets')}}">
        @csrf
        <textarea class="pl-2 m-3 col-11" style="border: none;"  name="tweetText" placeholder=" Want to Tweet ?" required ></textarea>
        <hr class="mx-3">
        <div class="d-flex justify-content-between m-3">
            <img src="{{auth()->user()->avatar}}" class="rounded-circle mr-2 "/>
            <button type="submit" class="btn-primary rounded">Tweet !</button>
        </div>
        <div>
            @error('tweetText')
            <div class="alert alert-danger m-3 "> {{$message}} </div>
            @enderror
        </div>



    </form>

</div>

