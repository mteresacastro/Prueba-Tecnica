{{-- así llamamos a la plantilla que queremos usar
@extends('layouts.app')

el section va vinculado al yield del archivo de la plantilla
@section('title')
Blog
@endsection

@section('meta-description', 'Blog meta description')

@section('content')@endsection--}}

<x-layouts.app title="Blog" meta-description="Blog meta description">

<header class="px-6 py-4 space-y-2 text-center">
    <h1 class="font-serif text-3xl text-sky-600 dark:text-sky-500">Blog</h1>
    @auth
    {{-- @auth se usa para mostrar contenido a usuarios autenticados, @guest para los que no--}}
    <a class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded uppercase tracking-widest text-sky-200 hover:border-sky-600  bg-sky-600 hover:bg-sky-900" href="{{ route('posts.create')}}">Crear nuevo post</a>
    @endauth
</header>

<main class="grid w-full gap-4 px-4 sm:grid-cols-2 md:grid-cols-3">
@foreach ( $posts as $post)
<div class="max-w-3xl px-4 py-2 space-y-4 bg-white rounded shadow dark:bg-slate-800">
    <h2 class="text-xl text-slate-600 dark:text-slate-300 hover:underline">
        <a href="{{ route('posts.show', $post->id)}}">{{$post->title}}</a>
    </h2>

    @auth
    <div class="flex justify-between">
            <a class="inline-flex items-center text-xs text-slate-500 uppercase font-semibold hover:text-slate-600 dark:hover:text-slate-100 focus:outline-none focus_border-slate-200" href="{{route('posts.edit', $post)}}">Editar</a>
            <!--<a href="{{route('posts.destroy', $post)}}">Delete</a> no se puede hacer asi porque entraria en la ruta del get.
        -->
            <form action="{{route('posts.destroy', $post)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="inline-flex items-center text-xs font-semibold tracking-widest text-center text-red-500 uppercase dark:text-red-500/80 hover:text-red-600 focus_outline-none" type="submit">Eliminar</button>
            </form>
        </div>
    @endauth

</div>

@endforeach
</main>

</x-layouts.app>

