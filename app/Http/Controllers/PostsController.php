<?php

namespace App\Http\Controllers;

// use App\Models\Post as ModelsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

//using DB 
// use DB;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //sorting by title ascending or descending
        // $posts = Post::orderBy('title','desc')->get(); descending
        // $posts = Post::orderBy('title','desc')->get(); ascending

        //using DB
        // $posts = DB::select('SELECT * FROM posts');


        // return ModelsPost::all();
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

          //handle the file upload
       if($request->hasFile('cover_image')){
        //get filename with extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

        //get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //get just extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        //file to store
        $fileNameToStore = $filename .'_'.time().'.'.$extension;

        //upload image
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

       }else{
        $fileNameToStore = 'noimage.jpeg';
       }
        
        $posts = new Post;

        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->user_id = auth()->user()->id;
        $posts->cover_image = $fileNameToStore;

        $posts->save();

        return redirect('http://localhost:8080/laravelproject/public/posts/')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('http://localhost:8080/laravelproject/public/posts/')->with('error', 'Unauthorized page');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

          //handle the file upload
       if($request->hasFile('cover_image')){
        //get filename with extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

        //get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //get just extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        //file to store
        $fileNameToStore = $filename .'_'.time().'.'.$extension;

        //upload image
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

       }

        // $posts = new Post;
        // it is not going to be a new post because we are not creating new post, we are updating

        // so its Post::find($id)
        $posts = Post::find($id);

        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $posts->cover_image = $fileNameToStore;
        }


        $posts->save();

        return redirect('http://localhost:8080/laravelproject/public/posts/')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::find($id);
        // $post -> delete;

        if(auth()->user()->id !== $post->user_id){
            return redirect('http://localhost:8080/laravelproject/public/posts/')->with('error', 'Unauthorized page');
        }

        if($post->cover_image != 'noimage.jpeg'){
            // download a noimage.jpeg and save into storage/cover_images folder for default no image warning
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

    if ($post) {
        $post->delete();
        return redirect('http://localhost:8080/laravelproject/public/posts')->with('success', 'Post deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Post not found.');
    }

    }
}
