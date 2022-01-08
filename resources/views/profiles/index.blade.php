@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3 p-5">
            <!-- /storage/{{$user->profile->profileImage()}} -->
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100" style="max-height: 200px;">
        </div>

        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-baseline">
                    <h4>{{$user->username}}</h4>
                   <follow-button user-id={{$user->id}} follows="{{$follows}}" ></follow-button>
                 </div>
                @can('update', $user->profile)
                    <a href="/p/create"> Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit Post</a>
            @endcan
            <div class="d-flex">
                <div class="pr-3"><strong>{{$postCount}}</strong> post</div>
                <div class="pr-3"><strong>{{$followersCount}}</strong>followers</div>
                <div class="pr-3"><strong>{{$followingCount}}</strong>following</div>
            </div>
            <div class="pt-4 font-weight-bold">
                {{$user->profile->title}}</div>
            <div><!-- Appointment availability is limited due to social distancing precautions and varies by location. Please note that our customer service wait-times are also longer than usual right now. For information on rescheduling, refunds, and more, please check out our FAQs. -->{{$user->profile->description}}</div>
            <div><a href="#"> <!-- www.freecodegram.org -->{{$user->profile->url}}</a></div>
        </div>
    </div>

    <div class="row pt-4">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" class="w-100"/>
            </a>
        </div>

        @endforeach
        <!-- <div class="col-4"><img src="/images/cmder_blue.ico" class="w-100" /></div>
        <div class="col-4"><img src="/images/cmder_blue.ico" class="w-100" /></div> -->
    </div>

</div>




 <!--    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> -->
@endsection
