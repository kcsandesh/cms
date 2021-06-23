<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request\Posts;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\posts\UpdatePostRequest;
use App\Http\Middleware\CheckCategoriesCount;
use App\Post;
use App\Category;


class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('CheckCategoriesCount')->only(['create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all());
    }

    /**$request
     * Store a newly created resource in storage.

     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // dd($request->all());
        $image = $request->image->store('posts');
        // if($request->hasFile('image')){
        //     $file=$request->image;
        //     $extension=$file->getClientOriginalExtension();
        //     $fileName=time().'.'.$extension;
        //     $file->move('upload/image/'.$fileName);


        // }

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id'=>$request->category_id,
        ]);

        session()->flash('success', 'Post created successfully.');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'content', 'description', 'published_at']);
        if ($request->hasFile('image')) {
            $image = $request->image->store('posts');
            $post->imageDelete();
            $data['image'] = $image;
        }
        $post->update($data);

        session()->flash('success', 'Post updated successfully.');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.

     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)


    {

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {

            $post->imageDelete();


            $post->forceDelete();
        } else {

            $post->delete();
        }


        session()->flash('success', 'Post deleted successfully.');
        return redirect(route('trashed-posts.index'));
    }


    /**
     * To show the trashed posts
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {

        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->with('posts', $trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();
        session()->flash('success', 'Post restored successfully.');
        return redirect()->back();
        //ok bro

    }
}
