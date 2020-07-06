<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

/*BlogPagesController is created to manage blog related pages using 
    php artisan make:controller BlogPagesController --resource. [MN - 11.Jun.2020]*/

class BlogPagesController extends Controller
{

    /**
     * Create a new controller instance. [MN - 28.06.2020] Copied __construct() function from DashboardController.php to
     *  block guest users to create blog posts by direct URL access e.g. giclinic.com/posts/create
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); //[MN - 28.06.2020 Added index and blog_show views as expection for guest users.]
    }

    /**
     * Display a listing of  all available blog posts. [MN - 11.06.2020]
     *
     * @return \Illuminate\Http\Response
     */

    public function index() 
    {
        //$posts = Post::all(); //Fetches all posts
        //$posts = Post::orderBy('created_at', 'desc')->take(1)->get(); //Fetches one post
        //$posts = Post::orderBy('created_at', 'desc')->get();  //Fetches all posts sorted in descending order based on date created.

        $posts = Post::orderBy('updated_at', 'desc')->paginate(5);  //Fetches all posts sorted but paginates them and shows 5 posts per page.
        return view('posts.blog_index')->with('posts', $posts);
    }

    /**
     * Shows the form for creating a new blog post. [MN - 11.06.2020]
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('posts.blog_create');
    }

    /**
     * Store a newly created blog post in database. [MN - 11.06.2020]
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*This function is used to store the posts written and submitted 
            via resources==>views==>posts==>blog_create.blade.php. [MN - 11.06.2020]*/
        //We can put Laravel validation in here. [MN - 11.06.2020]
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            /*Added below line to validate optionally (nullable) the image upload of max 2GB size (max:1999). [MN - 11.06.2020]*/
            'cover_image' => 'image|nullable|max:1999'
        ]);

        /*Handle file upload. [MN - 28.06.2020]*/
        if($request->hasFile('cover_image')){
            /*Get the file name with extension. [MN - 28.06.2020]*/
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            /*Get just file name. [MN - 28.06.2020]*/
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            /*Get just file extension. [MN - 28.06.2020]*/
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            /*File name to store. time() is added here to make file name unique. [MN - 28.06.2020]*/
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            /*Upload the image. Default image upload path is storage=>app=>public=>uploads directory in the project.
                But we need to create new storage link using "php artisan storage:link" command,
                which creates public==>storage directory where these images will be stored. [MN - 28.06.2020]*/
            //$path = $request->file('cover_image')->storeAs('public/uploads', $fileNameToStore);
            
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else{
            /*If no file is uploaded then save noimage.jpg as file name in posts table. [MN - 28.06.2020]*/
            $fileNameToStore = 'noimage.jpg';
        }

        //Create Post. [MN - 28.06.2020]
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        /*Adding user_id of the user logged in and creating the post. [MN - 28.06.2020] */
        //$post->user_id = auth()->user()->id;
        $post->user_id = $request->user()->id;
        /*Store uploaded file to posts table in DB. [MN - 28.06.2020]*/
        $post->cover_image = $fileNameToStore;
        $post->save();
        return redirect('/posts')->with('success', 'Post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.blog_show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified blog post. [MN - 11.06.2020]
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*Fetch posts from DB based upon post id clicked on the posts page rendered through 
            resource==>posts==>blog_index.blade.php. Post::find($id); returns post as an array. [MN - 28.06.2020]*/

        $post = Post::find($id);
        /*Check for the legitimate user who can edit a post.
            This provides protection against manually entering the URL to edit other users' post. [MN - 28.06.2020]*/
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'You are not authorized to edit this post!');
        }    
        return view('posts.blog_edit')->with('post', $post);
    }

    /**
     * This method updates the specified blog post. [MN - 11.06.2020]
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*This function is used to update the post selected to be edited via 
        resources==>views==>posts==>blog_edit.blade.php. [MN - 11.Jun.2020]
        */
        //We can put Laravel validation in here.
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        /*To edit an existing post, we need to find it by id by passing into parameter value as find($id). [MN - 11.Jun.2020]*/
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts')->with('success', 'Post updated!');
    }

    /**
     * This method checks the user rights to delete and removes the specified blog post from database. [MN - 11.Jun.2020]
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*Find post against the parameter $id and delete it. [MN - 11.Jun.2020]*/
        $post = Post::find($id);
        
        /*Check for the legitimate user who can delete a post.
            This provides protection against manually entering the URL to delete other users' post. [MN - 11.Jun.2020]*/
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'You are not authorized to delete this post!');
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted!');
    }
}
