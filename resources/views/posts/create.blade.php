@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="offset-4 pb-4">
                <h1>Add New Post</h1>
            </div>
            <form method="post" action="/p" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label text-md-right">Post Caption</label>

                    <div class="col-md-6">
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="name" autofocus>

                        @error('caption')
                            <!-- <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> -->
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Post Image</label>
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
                   <button class="btn btn-primary col-md-6 offset-4">Add New Post</button>
               </div> 
            </form>
        </div>
    </div>
</div>
@endsection
