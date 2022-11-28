<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // This function is to prevent the transition to the "posts" and "post/create" control page without user login.
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('created_at', 'DESC')->get();

        // $posts = Post::where('user_id', Auth::id())->get(); // In order to show only the posts owned by the logged in user
        return view('posts.index')->with('posts', $posts);
    }

    public function postsTrashed()
    {
        $posts = Post::onlyTrashed()->get();
        // $posts = Post::onlyTrashed()->where('user_id', Auth::id())->get(); // In order to show only the posts owned by the logged in user
        return view('posts.trashed')->with('posts', $posts);

    }

    public function create()
    {
        $tags = Tag::all();
        if($tags->count() == 0){
            return redirect()->route('tag.create');
        }
        return view('posts.create')->with('tags', $tags);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'tags' => 'required',
            'photo' => 'required|image',
        ]);

        $photo = $request->photo;
        $newphoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newphoto);

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'photo' => 'uploads/posts/'.$newphoto,
            'slug' => str_slug($request->title),
        ]);
        $post->tag()->attach($request->tags); // To put the tags chosen by the user, thus creating a many-to-many relationship between tags and posts
        return redirect()->back();
    }

    public function show($slug)
    {
        $tags = Tag::all();
        $post = Post::where('slug', $slug)->first();
        // $post = Post::where('slug', $slug)->where('user_id', Auth::id())->first();
        // if($post === null){return redirect()->back();}
        return view('posts.show')->with('post', $post)->with('tags', $tags);
    }

    public function edit($id)
    {
        $tags = Tag::all();
        // $post = Post::find($id);

        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        if($post === null){return redirect()->back();}
        // To prevent other users from editing someone else's post
        return view('posts.edit')->with('post', $post)->with('tags', $tags);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            // 'photo' => 'required|image',
        ]);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $newphoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/posts',$newphoto);

            $post->photo = 'uploads/posts/'.$newphoto;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->tag()->sync($request->tags); // To synchronize updates made by the user's choice
        $post->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        // $post = Post::find($id);

        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        if($post === null){return redirect()->back();}
        // To prevent other users from destroing someone else's post

        $post->delete();
        return redirect()->back();
    }

    public function hdelete($id)
    {
        // $post = Post::withTrashed()->where('id', $id)->first();

        $post = Post::withTrashed()->where('id', $id)->where('user_id', Auth::id())->first();
        if($post === null){return redirect()->back();}
        // To prevent other users from hdeleteing someone else's post

        $post->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        // $post = Post::withTrashed()->where('id', $id)->first();

        $post = Post::withTrashed()->where('id', $id)->where('user_id', Auth::id())->first();
        if($post === null){return redirect()->back();}
        // To prevent other users from restoring someone else's post

        $post->restore();
        return redirect()->back();
    }
}
