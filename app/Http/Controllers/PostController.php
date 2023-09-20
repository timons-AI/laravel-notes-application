<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function deletePost(Post $post){
        if (auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        $post->delete();
        return redirect('/');
    }

    public function actuallyUpdatePost (Post $post, Request $request ){
        if (auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }

        $incomingFeilds['title'] = strip_tags($request['title']);
        $incomingFeilds['body'] = strip_tags($request['body']);

        $post->update($incomingFeilds);
        return redirect('/');
    }

    public function showEditScreen(Post $post){
        if (auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        return view('edit-post', ['post'=> $post]);
    }

    public function createPost(Request $request){
        $incommingFeilds = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incommingFeilds['title'] = strip_tags($incommingFeilds['title']);
        $incommingFeilds['body'] = strip_tags($incommingFeilds['body']);
        $incommingFeilds['user_id'] = auth()->id();

        Post::create($incommingFeilds);
        return redirect('/');

    }
}
