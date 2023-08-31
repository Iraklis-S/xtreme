<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewController extends Controller
{
    

    public function createPost(Request $request){
        $title = $request['title'];
        $content = $request['field'];
        $categ = $request['options'];
        $user = Auth::user();
        $model = new BlogPost;
        $model->categoryId = $categ;
        $model->title = $title;
        $model->field = $content;
        $model->user_id = $user->id;
        $model->save();
        return redirect('/dashboard');
    }   


    public function getPosts(){

        $model = BlogPost::with('category')->get();
        return view('all-views.dashboard', ['posts' => $model]);
    }

    public function postData( $postId)
    {
        $post = BlogPost::findOrFail($postId);
      
        return view('all-views.post', ['post' => $post]);
    }


    public function showProfile($userId){
        $profile = User::findOrFail($userId);

        return view('all-views.profile',['prof'=>$profile]);
    }





}
