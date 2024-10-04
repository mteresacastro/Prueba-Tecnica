<?php
/*
namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;

class PostController extends Controller{

    public function __constructor(){
        $this->middleware('auth',['except' => ['index', 'show']]);
    }

    public function index(){
        $posts = Post::get();

        return view('posts.index', ['posts' => $posts]);
    }

    /* Se puede hacer así o como el método siguiente:

        public function show($post){
        return Post::findOrFail($post);
    }

    public function show(Post $post){
        return view('posts.show', ['post'=>$post]);
    }

    public function create(){
        return view('posts.create', ['post' => new Post]);
    }

    public function store(SavePostRequest $request){

        /* el metodo validate tiene dos parametros, uno las validacioes, dos, los mensajes personalizados
        $validated = $request->validate([
            'title'=> ['required', 'min:4'],
            'body'=> ['required']
        ],[
            'title.required'=>'Error personalizado'

        ]);*/

        /*
        $post= new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        Esta forma de crear lo resume Eloquent en lo siguiente:

        Post::create($request->validated()/*[
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);



        session()->flash('status', 'Post creado con éxito');

        // return redirect()->route('posts.index'); es igual a:
        return to_route('posts.index');
    }

    public function edit(Post $post){
        return view('posts.edit', ['post' => $post]);
    }

    public function update(SavePostRequest $request, Post $post){

        /*$validated = $request->validate([
            'title'=> ['required'],
            'body'=> ['required']
        ],[
            'title.required'=>'Error personalizado'

        ]);

        // $post= Post::find($post); no hace falta si se lo pasamos como parametro al método
        //$post->title = $request->input('title');
        //$post->body = $request->input('body');
        //$post->save();

        $post->update($request->validated()/*[
            'title' => $request->input('title'),
            'body'=> $request->input('body')
        ]);

        session()->flash('status', 'Post actualizado con éxito');

        // return redirect()->route('posts.index'); es igual a:
        return to_route('posts.show', $post);
    }

    public function destroy(Post $post){

        $post->delete();

        return to_route('posts.index')->with('status', 'Post eliminado');
    }



}*/
