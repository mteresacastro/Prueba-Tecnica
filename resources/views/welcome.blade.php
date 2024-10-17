{{--@component('components.layout')

<h1>Inicio</h1>

@endcomponent--}}


<x-layouts.app title="Home" meta-description="Home meta description">

<h1 class="p-4 my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Bienvenido a tuApp</h1>

<div class="flex flex-column justify-center items-center align-items-center">
    <svg class="w-10 h-10 mx-4 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#959998" d="M384 480l48 0c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224l-400 0c-11.4 0-21.9 6-27.6 15.9L48 357.1 48 96c0-8.8 7.2-16 16-16l117.5 0c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8L416 144c8.8 0 16 7.2 16 16l0 32 48 0 0-32c0-35.3-28.7-64-64-64L298.5 96c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7L64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l23.7 0L384 480z"/></svg>
    <a class="text-sm font-semibold underline border-2 text-center text-sky-600 border-transparent focus:border-slate-500 focus:outline-none display-block" href="{{route('login')}}" > Entrar </a>

</div>



</x-layouts.app>

