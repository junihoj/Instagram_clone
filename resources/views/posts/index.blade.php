@extends('layouts.app')

@section('content')
<div class="container">
	@foreach($posts as $post)
			<div class="row">
				<div class="col-8 offset-2">
					<a href="/profile/{{$post->user->id}}">
						<img src="/storage/{{$post->image}}" alt='image' class="w-100">
					</a>
				</div>
			</div>
			<div class="row pt-2 pb-4">
				<div class="col-8 offset-2">
					<div>
						<p><span ><a href="/profile/{{$post->user->id}}" class="text-dark"><strong>{{$post->user->username}}</strong></a></span>{{$post->caption}}</p>
					</div>
				</div>
			</div>		
	@endforeach
	<div class="row">
		<div class="col-12 d-flex justify-content-center">
			{{$posts->links()}}
		</div>
		
	</div>
</div>
@endsection