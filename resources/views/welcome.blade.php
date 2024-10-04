{{--@component('components.layout')

<h1>Inicio</h1>

@endcomponent--}}


<x-layouts.app title="Home" meta-description="Home meta description">

<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Bienvenido a tuApp</h1>

<div class="flex flex-column justify-center items-center align-items-center">
    <img class="display-block" src="" alt="logo app">
    <a class="text-sm font-semibold underline border-2 text-center text-sky-600 border-transparent focus:border-slate-500 focus:outline-none display-block" href="{{route('login')}}" > Entrar </a>

</div>



</x-layouts.app>

