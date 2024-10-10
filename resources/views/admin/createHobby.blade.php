<x-layouts.app title="CreateHobby" meta-description="Create hobby meta description">

    <header class="px-6 py-4 space-y-2">
        <div class="flex justify-between">
            <a class="text-white hover:underline" href="{{route('admin.dashboard')}}">Volver</a>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="text-white hover:underline">Cerrar sesión</button>
            </form>
        </div>

        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Añadir nuevo hobby</h1>
    </header>

    <form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('admin.storeHobby')}}" method="POST">
    @csrf
        <div class="space-y-4">

            <label class="flex flex-col" for="name">
                <span class="font-serif text-slate-600 dark:text-slate-400">Nombre del hobby</span>
                <input class="rounded-md shadow-sm text-slate-500 dark:text-slate-500 dark:placeholder:text-slate-600" name="name" type="text" value="{{ old('name')}}" id="name">
                @error('name')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
            </label>

            <button class="inline-flex items-center px-4 py-2 bg-sky-500 rounded active:bg-sky-700 focus:outline-none focus:border-sky-500 text-white"type="submit">Añadir hobby</button>
        </div>
    </form>

</x-layouts.app>
