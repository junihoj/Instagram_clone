<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    //

    public function index($user)
    {
    	// dd($user);
    	$user = (User::findOrfail($user));

        $follows = (auth()->user()) ?auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(30), function() use ($user){
            return $user->posts->count();
        });
        $followersCount = Cache::remember('count.followers.'.$user->id, now()->addSeconds(30), function() use ($user){
            return $user->profile->followers->count();
        });
        $followingCount = Cache::remember('count.following.' .$user->id, now()->addSeconds(30), function () use ($user){
            return $user->following->count();
        });
        // return view('profiles.index',[
        // 	'user' => $user,
        //     'follows'=>$follows,
        //     // 'followersCount'=> $followersCount,
        //     // 'followingCount'=> $followingCount,
        //     // #'postCount' => $postCount,
        // ]);

        return view('profiles.index',
            compact('user','follows', 'followingCount', 'followersCount', 'postCount')
        );

        }
    					# \App\User
    public function edit(User $user){

        $this->authorize('update', $user->profile);

    	return view('profiles.edit', compact('user'));

    } 

    public function update(User $user){
        $this->authorize('update', $user->profile);
        // $imagepath = request('image')->store('uploads','public');
        $data = request()->validate([

            'title'=>'required',
            'description' => 'required',
            'url' => 'url', 
        ]);

        if(request('image')){
            $imagepath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagepath}"))->fit(1000,1000);
            $image->save();
             auth()->user()->profile->update(array_merge($data,[
            'image'=> $imagepath
            ]));
        }

        auth()->user()->profile->update($data);
       
        return redirect("/profile/{$user->id}");

    }

}
