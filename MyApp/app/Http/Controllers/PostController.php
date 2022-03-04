<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Nette\Utils\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $post = POST::latest()->paginate(10);
        return view('components.post.index')->with('posts', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

	    // make thumbnails
	    // $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
        //     $thumb = Image::make($request->file('cover_image')->getRealPath());
        //     $thumb->resize(80, 80);
        //     $thumb->save('storage/cover_images/'.$thumbStore);

        } else {
            $fileNameToStore = 'cover_images/logo.png';
        }
        $post =new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('posts')->with('success','post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('components.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $post = Post::find($id);
        // if (!isset($id)){
        //     return redirect()->route('posts.index')->with('error', 'No Post Found');
        // }

        // // Check for correct user
        // if(auth()->user()->id !==$post->user_id){
        //     return redirect()->route('posts.index')->with('error', 'Unauthorized Page');
        // }

        return view('components.post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        $post = Post::find($id);
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            Storage::delete('public/cover_images/'.$post->cover_image);
	    // make thumbnails
            $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            $thumb = Image::make($request->file('cover_image')->getRealPath());
            $thumb->resize(80, 80);
            $thumb->save('storage/cover_images/'.$thumbStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $post =Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
         $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('posts')->with('success','post update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //Check if post exists before deleting
        // if (!isset($post)){
        //     return redirect('posts')->with('error', 'No Post Found');
        // }

        // // Check for correct user
        // if(auth()->user()->id !==$post->user_id){
        //     return redirect('posts')->with('error', 'Unauthorized Page');
        // }

        // if($post->cover_image != 'noimage.jpg'){
        //     // Delete Image
        //     Storage::delete('public/cover_images/'.$post->cover_image);
        // }

        $post->delete();
        return redirect('posts')->with('success', 'Post Removed');
    }
}
