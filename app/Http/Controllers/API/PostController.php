<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();

        return $posts;
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            return $post;
        } else {
            return response()->json(
                [
                    'status_code' => 404,
                    'status_message' => 'Page Not Found'
                ]
            );
        }
    }
}
