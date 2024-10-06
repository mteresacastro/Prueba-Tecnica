
<x-layouts.app title="Dashboard" meta-description="Dashboard meta description">

<header class="px-6 py-4 space-y-2">
    <form action="{{route('logout')}}" method="POST" class="text-right">
        @csrf
        <button class="text-white">Cerrar sesión</button>
    </form>

    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Panel de control Administrador</h1>
</header>

<main class="flex flex-col w-full gap-4 px-4 sm:grid-cols-2 md:grid-cols-3">

    <div class="flex items-center justify-center">
        <a href="{{route('admin.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Crear nuevo cliente
        </a>
    </div>
    @foreach ($customers as $customer)
        <div class="max-w-3xl px-4 py-2 space-y-4 bg-white rounded shadow dark:bg-slate-800">
            <ul class="text-xl text-slate-600 dark:text-slate-300 hover:underline">
                <li class="flex justify-content-center gap-3">
                     <svg class="w-8 h-8 mx-4 text-sky-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#74C0FC" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/></svg>
                    <a title="ver detalles" class="ml-4"href="{{ route('admin.show', $customer->id)}}">{{$customer->name.' '.$customer->surname}}</a>
                </li>
            </ul>
        </div>
    @endforeach
</main>


</x-layouts.app>
