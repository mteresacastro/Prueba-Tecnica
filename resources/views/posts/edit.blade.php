<x-layouts.app
    :title="$post->title"
    :meta-description="$post->body">

<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Editar post</h1>

<form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('posts.update', $post)}}" method="POST">
    @csrf
    @method('PATCH')
    @include('posts.form')
    <div class="flex items-center justify-between mt-4">
        <a  class="text-sm font-semibold underline  text-sky-600 border-2 border-transparent focus:border-slate-500 focus:outline-none" href="{{route('posts.index')}}" > Regresar </a>
        <button class="inline-flex items-center px-4 py-2 bg-sky-700 hover:bg-sky-900 rounded active:bg-sky-800 focus:outline-none focus:border-sky-500 text-sky-200" type="submit">Actualizar</button>

    </div>
</form>


</x-layouts.app>
