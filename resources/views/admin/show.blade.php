
<x-layouts.app title="customer" meta-description="Details meta description">

<header class="px-6 py-4 space-y-2">
    <div class="flex justify-between">
        <a class="text-slate-800 dark:text-white hover:underline" href="{{route('admin.dashboard')}}">Volver</a>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="text-slate-800 dark:text-white hover:underline">Cerrar sesión</button>
        </form>
    </div>

    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500 ">Detalles del cliente</h1>
</header>

<main class="flex flex-col w-full justify-center items-center gap-4 p-4">

    <div class="flex justify-center items-center gap-4 mb-4">
        <a href="{{route('admin.edit', $customer->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Editar cliente
        </a>
        <form action="{{route('admin.destroy', $customer)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Eliminar cliente</button>
        </form>

    </div>
    <div class="max-w-full flex p-4 items-center justify-center bg-white rounded shadow text-slate-800 dark:text-white dark:bg-slate-800 gap-4">
        <div class="flex items-center justify-center m-4">
            <svg class="w-10 h-10 mx-4 text-sky-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#74C0FC" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/></svg></div>
        <div class="text-xl flex flex-col gap-4 m-4">
            <h2 class="text-2xl text-blue-300">Nombre: {{$customer->name.' '.$customer->surname}}</h2>
            <h3>Hobbies:</h3>
            <ul>
            @foreach ( $customer->hobbies as $hobby)
                <li> - {{ ucfirst($hobby->name)}}</li>
            @endforeach
            </ul>
    </div>
    </div>
</main>


</x-layouts.app>
