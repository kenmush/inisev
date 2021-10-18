<?php

namespace App\Http\Controllers;

use App\Events\NewPostEvent;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Cache;
use Illuminate\Http\Request;
use function response;

class PostController extends Controller
{

    public function index()
    {
       $posts = Cache::remember('posts', 60 * 60 * 60, function () {
            return PostResource::collection(Post::all());
        });

        return response()->json($posts);
    }


    public function create()
    {
        //
    }


    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
                'title'       => ['required', 'max:100'],
                'description' => ['required'],
                'website_id'  => ['required', 'exists:websites,id']
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->website_id = $request->website_id;
        $post->saveOrFail();

        NewPostEvent::dispatch($post);

        return response()->json(new PostResource($post), 201);
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        //
    }


    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        //
    }
}
