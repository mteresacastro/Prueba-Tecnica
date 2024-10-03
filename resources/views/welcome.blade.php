{{--@component('components.layout')

<h1>Inicio</h1>

@endcomponent--}}


<x-layouts.app title="Home" meta-description="Home meta description">

<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Inicio</h1>

@auth
<div class="text-white ml-4">
    Sesión iniciada por: {{Auth::user()->name}}
</div>
@endauth

</x-layouts.app>

