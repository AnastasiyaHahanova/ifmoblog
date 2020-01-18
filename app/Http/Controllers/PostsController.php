<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index(Post $post)
    {
        $result = $post->fetch();
        if (empty($result))
        {
            return response('There are no posts', 200);
        }
        return response()->json($result);
    }
    public function add(){
        return view('post.add');
    }

    public function fetch(Post $post,$id)
    {
        $result = $post->fetchPost($id);
        if (empty($result))
        {
            return response('There are no post with id :'.$id, 200);
        }
        return response()->json($result);
    }
    public function store(Post $post, Request $request)
    {
        $content = $request->getContent();
        $post_id = $post->store($content);
        return response($post_id, '200');

    }

    public function delete(Post $post,$id)
    {
        $result = $post->deletePost($id);
        if (!empty($result))
        {
            return response()->json($result);
        }
        return response('There is no post with id'.$id, 204);
    }

    public function list()
    {
        $login = Auth::check() ? 'true' : 'false';
        return view('post.index',compact('login'));
    }

    public function edit(Post $p, $id)
    {
        $post = $p->fetchPost($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->post();
        DB::table('posts')->where('_id',$id)->update($data);
        return redirect(route('home'));
    }
    public function show($id)
    {
        return view('post.show',['id'=>$id]);
    }
}
