@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="/profile/{{$user->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <h1>Edit Profiles</h1>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">Title </label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title}}" autocomplete="name" autofocus>

                        @error('title')
                            <!-- <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> -->
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="description" name="description" @error('description') is-invalid @enderror
                        value="{{ old('description') ?? $user->profile->description}}"
                        >

                        @error('description')
                            <!-- <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> -->
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label text-md-right">url</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url"
                        value="{{ old('url') ?? $user->profile->url}}"
                        >

                        @error('url')
                           <!--  <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> -->
                            <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Profile Image</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
                            <!-- <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> -->
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>

               <div class="form-group row">
                   <button class="btn btn-primary col-md-6 offset-4">Update Profile </button>
               </div> 
            </form>
</div>
@endsection
