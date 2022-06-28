<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        // if ($request->hasFile('image1')) {
        //     $originalImage = $request->file('image1');
        //     $thumbnailImage = Image::make($originalImage);
        //     $thumbnailPath = public_path() . '/thumbnail/';
        //     $originalPath = public_path() . '/images/';
        //     $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
        //     $thumbnailImage->resize(150, 150);
        //     // $thumbnailImage->resize(150, 150, function ($constraint) {
        //     //     $constraint->aspectRatio();
        //     // });
        //     $thumbnailImage->save($thumbnailPath . time() . $originalImage->getClientOriginalName());
        //     $imagemodel->original_url = time() . $originalImage->getClientOriginalName();
        // }

        if ($request->hasFile('image1')) {

            $image       = $request->file('image1');
            $filename    = time() . '.' . $image->getClientOriginalExtension();
            //Fullsize
            $image->move(public_path() . '/backend/full/', $filename);
            //ReSize
            $image_resize = Image::make(public_path() . '/backend/full/' . $filename);
            $image_resize->fit(300, 300);
            $image_resize->save(public_path('backend/thumbnail/' . $filename));
            $post->original_url = $filename;
        }

        if ($request->hasfile('gallery')) {
            foreach ($request->file('gallery') as $key => $file) {
                $name = time() . '-' . $key . '-gallery.' . $file->extension();
                $file->move(public_path() . '/backend/gallery/', $name);
                $data[] = $name;
            }

            $post->gallery = json_encode($data);
        }

        $post->save();

        return back()->with('success', 'Your images has been successfully Upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        return "Hello world";
    }
}
