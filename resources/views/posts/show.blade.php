@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">
			<img src="/storage/{{$post->image}}" alt='image' class="w-100">
		</div>
		<div class="col-4">
			<div>
				<div class="d-flex align-items-center">
					<div class="pr-3">
						<img src="
						{{$post->user->profile->profileImage()}}" alt="" class="w-100 rounded-circle" style="max-width: 50px;">
					</div>
					<div>
						<a href="/profile/{{$post->user->id}}">
							<strong><span class="text-dark">{{$post->user->username}}</span></strong>
						</a>
						<a href="#" class="pl-3">Follow</a>
					</div>
				</div>
				<hr/>

				<p><span ><a href="/profile/{{$post->user->id}}" class="text-dark"><strong>{{$post->user->username}}</strong></a></span>{{$post->caption}}</p>
			</div>
		</div>
	</div>

</div>
@endsection