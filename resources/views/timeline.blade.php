<div class="mt-2 mx-5 border" style="border-radius: 10px; border-color: Black;">
    <div class="d-flex m-3">
        <div>

            <a href="{{route('profile',$tweet->user)}}"><img height="40" width="40" src="{{$tweet->user->avatar}}"
                                                             class="rounded-circle mr-2 " style="flex-shrink: 0;"/></a>

        </div>


        <div class="ml-1"  style="width: 700px ">

            <div class="d-flex  justify-content-between">
                <div>
                    <a style="text-decoration: none; color: #000000" href="{{route('profile',$tweet->user)}}">
                        <h5
                            class="font-weight-bold">{{ !empty($tweet->user->name) ? $tweet->user->name : "not" }}
                        </h5>
                    </a>
                    <p>{{ $tweet->body }} </p>

                </div>

                <div>
                    @can('edit',$tweet->user)
                        <form method="post" action="{{ route('tweets.delete',$tweet)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-primary  pull-right" style=" color:black; background-color:#f8fafc;">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>

            <div class="container">
                @if($tweet->path_image)
                    <img src="{{$tweet->path_Image($tweet->path_image)}}" class="img-fluid">
                @endif
            </div>
            <div class="d-flex">

                <form method="post" action="{{route('like',$tweet->id)}}">
                    @csrf
                    <div class="d-flex mr-3">
                        <button type="submit" class="border-0" style="background-color: #f8fafc;outline: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                 class="bi bi-hand-thumbs-up"
                                 viewBox="0 0 20 20">
                                <path fill=" {{ $tweet->isLikedBy(auth()->user()) ? 'Blue' : 'Black' }}"
                                      d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z"></path>
                            </svg>
                        </button>

                        <div class="mt-2"> {{$tweet->likes ?: 0 }}</div>
                    </div>
                </form>


                <form method="post" action="{{route('like',$tweet->id)}}">
                    @csrf
                    @method('delete')
                    <div class="d-flex mt-2">
                        <button type="submit" class="border-0" style="background-color: #f8fafc;outline: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                 fill="{{--{{$tweet->IsDislikedBy(auth()->user()) ? 'currentColors':'Blue'}}--}}"
                                 class="bi bi-hand-thumbs-down " viewBox="0 0 20 20">

                                <path fill=" {{ $tweet->isDislikedBy(auth()->user()) ? 'Blue' : 'Black' }}"
                                      d="M11.0010436,20 C9.89589787,20 9.00000024,19.1132936 9.0000002,18.0018986 L9,12 L1.9973917,12 C0.894262725,12 0,11.1122704 0,10 L0,8 L2.29663334,1.87564456 C2.68509206,0.839754676 3.90195042,8.52651283e-14 5.00853025,8.52651283e-14 L12.9914698,8.52651283e-14 C14.1007504,8.52651283e-14 15,0.88743329 15,1.99961498 L15,10 L12,17 L12,20 L11.0010436,20 L11.0010436,20 Z M17,10 L20,10 L20,0 L17,0 L17,10 L17,10 Z"
                                      id="Fill-97"></path>

                            </svg>
                        </button>
                        <div class="mt-0">{{$tweet->dislikes?:0}}</div>
                    </div>
                </form>

            </div>


        </div>
    </div>


</div>
