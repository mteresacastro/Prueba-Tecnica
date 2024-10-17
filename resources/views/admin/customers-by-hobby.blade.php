<x-layouts.app title="byHobby" meta-description="byHobby meta description">

<header class="px-6 py-4 space-y-2">
    <div class="flex justify-between">
        <a class="text-white hover:underline" href="{{route('admin.dashboard')}}">Volver</a>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="text-white hover:underline">Cerrar sesión</button>
        </form>
    </div>

    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500 ">Buscar clientes por hobby</h1>
</header>

<main class="flex flex-col w-full justify-center items-center gap-4 p-4">

    <form action="{{ route('admin.customers-by-hobby') }}" method="GET">
        <label class="text-slate-800 dark:text-white" for="hobby">Selecciona el Hobby:</label>
        <select id="hobby" name="hobby">
                <option value="" disabled selected>hobby</option>
            @foreach ($hobbies as $hobby)
                <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
            @endforeach
        </select>
        <button class="inline-flex items-center px-4 py-2 bg-sky-700 rounded active:bg-sky-800 focus:outline-none focus:border-sky-500 text-sky-200 p-4" type="submit">Buscar</button>
    </form>
    <section>
        @if (isset($customers) && $selectedHobby)

            @if($customers->isNotEmpty())
            <h2 class="text-slate-800 dark:text-white m-4">Clientes aficionados a {{$selectedHobbyName->name}}</h2>
            @foreach ($customers as $customer)
                <div class="max-w-3xl px-4 py-2 space-y-4 bg-white rounded shadow dark:bg-slate-800">

                    <ul class="text-xl text-slate-600 dark:text-slate-300 hover:underline">
                        <li class="flex justify-content-center gap-3">
                            <svg class="w-8 h-8 mx-4 text-sky-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#74C0FC" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/></svg>
                            <a title="ver detalles" class="ml-4 text-slate-800 dark:text-white" href="{{ route('admin.show', $customer->id) }}">{{$customer->name.' '.$customer->surname}}</a>
                        </li>
                    </ul>
                </div>
            @endforeach
            @else
                <p class="text-red-500">No hay clientes aficionados a {{$selectedHobbyName->name}}.</p>
            @endif
        @endif
</section>
</main>


</x-layouts.app>
