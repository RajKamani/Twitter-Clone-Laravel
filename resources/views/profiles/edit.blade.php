@extends('layouts.app')

@section('content')
    <div class="mx-5 px-2">
        <form method="post" action="{{route('update.profile',$user->username)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="container mx-5 ">
                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <figure class="figure col-md-2 col-sm-3 col-xs-12">
                            <img class="rounded rounded-circle img-responsive" src="{{$user->avatar}}" alt="Your avatar"
                                 height="100"
                                 width="100">
                        </figure>
                        <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                            <input type="file"  name="avatar">
                        </div>
                    </div>
                </div>

                <div class="mx-5">
                    <div class="form-group">
                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">User Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="username" class="form-control" value="{{$user->username}}">
                            @error('username')
                            <p class="mt-1 text-danger">{{$message}} </p>

                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            @error('name')
                            <p class="mt-1 text-danger">{{$message}} </p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Bio</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="bio" class="form-control" value="{{$user->bio}}">
                            @error('bio')
                            <p class="mt-1 text-danger">{{$message}} </p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2  col-sm-3 col-xs-12 control-label">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="email" name="email" class="form-control" value="{{$user->email}}">
                            @error('email')
                            <p class="mt-1 text-danger">{{$message}} </p>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3  col-sm-3 col-xs-12 control-label">Old Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="password" name="oldpassword" class="form-control" value="" required>
                            @error('oldpassword')
                            <p class="mt-1 text-danger">{{$message}} </p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3  col-sm-3 col-xs-12 control-label">New Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="password" name="password" class="form-control" value="" required>
                            @error('password')
                            <p class="mt-1 text-danger">{{$message}} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3  col-sm-4 col-xs-12 control-label">Confirm Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="password" name="password_confirmation" class="form-control" value="" required>
                            @error('password_confirmation')
                            <p class="mt-1 text-danger">{{$message}} </p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3  col-sm-4 col-xs-12 control-label">Change Banner</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="file"  name="banner">
                            @error('banner')
                            <p class="mt-1 text-danger">{{$message}} </p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                            <input class="btn btn-primary" type="submit" value="Update Profile">
                            <a class="ml-5 text-dark" href="{{route('profile',$user->username)}}">Cancel</a>
                        </div>
                    </div>

                </div>

            </div>
        </form>

    </div>

@endsection
