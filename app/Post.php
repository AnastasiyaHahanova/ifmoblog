<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Support\Str;

class Post extends Eloquent
{
    protected $fillable = ['title','category', 'annotation','content'];

    public function fromRawJson($json)
    {
        return json_decode($json, true);
    }

    public function store($json)
    {
        $data = $this->fromRawJson($json);
        $this->fill($data);
        $this->save();
        return $this->_id;
    }
    public function fetch($limit = 1000, $offset = 0)
    {
        $posts = self::select()->limit($limit)->offset($offset)->get();
        return $posts;
    }

    public function fetchPost($id)
    {
        $post = self::select('_id', 'title','annotation', 'category','content')->where('_id',$id)->first();
        return $post;
    }

    public function deletePost($id)
    {
        $query = Post::where('_id', $id);
        $post = $query->first();
        if(!empty($post))
        {
            $query->delete();
        }
        return $post;
    }
}
