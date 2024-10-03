<x-layouts.app
    title="Crear nuevo post"
    meta-description="Formulario para crear un nuevo post">

<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Crear nuevo post</h1>

{{--O se pueden mostrar todos los errores al principio:
@foreach ($errors->all() as $error )
    <p>{{$error}}</p>
@endforeach--}}

<form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('posts.store')}}" method="POST">
    @csrf
    @include('posts.form')
    <div class="flex items-center justify-between mt-4">
        <a class="text-sm font-semibold underline border-2 text-sky-600 border-transparent focus:border-slate-500 focus:outline-none" href="{{route('posts.index')}}" > Regresar </a>
        <button class="inline-flex items-center px-4 py-2 bg-sky-700 rounded active:bg-sky-800 focus:outline-none focus:border-sky-500 text-sky-200"type="submit">Enviar</button>

    </div>
</form>


</x-layouts.app>
