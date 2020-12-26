<div class="border mx-5 " style="border-radius: 10px; border-color: Black;">

    <form method="post" action="{{route('tweets')}}" enctype="multipart/form-data">
        @csrf
        <textarea class="pl-2 mb-0 mr-3 ml-3 mt-3" style="border: none; background-color:#f8fafc" name="tweetText" placeholder=" Want to Tweet ?"
                 cols="95" required></textarea>
        <hr class="mx-3">
        <div class="d-flex justify-content-between m-3">
            <img height="40" width="40" src="{{auth()->user()->avatar}}" class="rounded-circle mr-2 "/>
            <div>
                <input  class="small" type="file" name="tweetImage">
                <button type="submit" class="btn-primary rounded">Tweet !</button>
            </div>
        </div>
        <div>
            @error('tweetText')
            <div class="alert alert-danger m-3 "> {{$message}} </div>
            @enderror
            @error('tweetImage')
            <div class="alert alert-danger m-3 "> {{$message}} </div>
            @enderror
        </div>


    </form>

</div>

