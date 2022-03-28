<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = [];
        return view('admin.posts.create', $post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:posts|max:50|min:5',
            'content' => 'required|string|min:5',
            'image' => 'nullable|url'
        ], [
            'required' => 'Il campo :attribute è obbligatorio.',
            'content.min' => 'Contenuto troppo corto.',
            'title.min' => 'Titolo troppo corto.',
            'title.max' => 'Titolo troppo lungo.',
            'url' => 'Non hai inserito un url corretto.',
            'title.unique' => "$request->title esiste già.",
        ]);

        $data = $request->all();
        $post = new Post();
        $post['slug'] = Str::slug($request->title, '-');
        $post->fill($data);
        $post->save();

        return redirect()->route('admin.posts.show', $post)->with('message', "$post->title aggiunto con successo!")->with('type', 'success');;
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'string', Rule::unique('posts')->ignore($post->id), 'max:50', 'min:5'],
            'content' => 'required|string|min:5',
            'image' => 'nullable|url'
        ], [
            'required' => 'Il campo :attribute è obbligatorio.',
            'content.min' => 'Contenuto troppo corto.',
            'title.min' => 'Titolo troppo corto.',
            'title.max' => 'Titolo troppo lungo.',
            'url' => 'Non hai inserito un url corretto.',
            'title.unique' => "$request->title esiste già.",
        ]);

        $data = $request->all();
        $post->update($data);

        return redirect()->route('admin.posts.show', $post)->with('message', "$post->title aggiornato con successo!")->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', "$post->title eliminato con successo!")->with('type', 'danger');
    }
}
