{{-- así llamamos a la plantilla que queremos usar
@extends('layouts.app')-->

<!-- el section va vinculado al yield del archivo de la plantilla
@section('title')
Contacto
@endsection

@section('meta-description', 'Contact meta description')

@section('content')-->
<!--@endsection--}}

<x-layouts.app title="Contact" meta-description="Contact meta description">
    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Contacto</h1>
</x-layouts.app>


