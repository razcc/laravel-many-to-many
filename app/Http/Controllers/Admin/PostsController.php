<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_post = Post::with('category', 'users', 'tags')->paginate(10);
        
        return view('admin.post.index', compact('all_post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::All();
        $tags = Tag::All();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                'title' => 'required|max:50',
                'description' => 'required|max:250'
            ],
            //IN QUESTA PARTE SI POSSONO DARE MESAGGI PERSONALIZZATI IN BASE ALLA VALIDAZIONE => .required -- .max -- etc...
            [
                'title.required' => 'Attenzione il campo title è obbligatorio',
                'title.max' => 'Attenzione il campo non deve superare i 50 caratteri',
                'description.max' => 'Non si possono avere piu di 250 caratteri'
            ]
            );
        $new_record = new post();
        $new_record->fill($data);
        $new_record->save();

        if(array_key_exists('tags', $data)){
            $new_record->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single_post = Post::findOrFail($id);

        return view('admin.post.show', compact('single_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $single_post_edit = Post::findOrFail($id);
        $categories = Category::All();
        $tags = Tag::All();
        
        return view('admin.post.edit', compact('single_post_edit', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $singolo_post = Post::findOrFail($id);
        $request->validate(
            [
                'title' => 'required|max:50',
                'description' => 'required|max:250'
            ],
            //IN QUESTA PARTE SI POSSONO DARE MESAGGI PERSONALIZZATI IN BASE ALLA VALIDAZIONE => .required -- .max -- etc...
            [
                'title.required' => 'Attenzione il campo title è obbligatorio',
                'title.max' => 'Attenzione il campo non deve superare i 50 caratteri',
                'description.max' => 'Non si possono avere piu di 250 caratteri'
            ]
            );
        $singolo_post->update($data);


        if(array_key_exists('tags', $data)){
            $singolo_post->tags()->sync($data['tags']);
        } else {
            $singolo_post->tags()->sync([]);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::findOrFail($id);
        $data->tags()->sync([]);
        $data->delete();
        return redirect()->route('admin.posts.index');
    }
}
