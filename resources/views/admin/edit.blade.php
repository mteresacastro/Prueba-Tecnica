<x-layouts.app title="Edit" meta-description="Edit meta description">

<header class="px-6 py-4 space-y-2">
    <div class="flex justify-between">
        <a class="text-slate-800 dark:text-white hover:underline" href="{{route('admin.show', $customer->id)}}">Volver</a>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="text-slate-800 dark:text-white hover:underline">Cerrar sesión</button>
        </form>
    </div>

    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500 ">Editar cliente</h1>
</header>

<form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('admin.update', $customer)}}" method="POST">
    @csrf
    @method('PATCH')
    <h2 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Editar datos del cliente</h2>
    <div class="flex flex-col items-center justify-between mt-4">
        <div class="space-y-4">

            <label class="text-slate-500 flex flex-col" for="name">Nombre</label>
            <input class="rounded-md shadow-sm text-slate-500 dark:text-slate-500 dark:placeholder:text-slate-600" type="text" id="name" name="name" value="{{$customer->name}}" required>

            <label class="text-slate-500 flex flex-col" for="surname">Apellidos</label>
            <input class="rounded-md shadow-sm text-slate-500 dark:text-slate-500 dark:placeholder:text-slate-600" type="text" id="surname" name="surname" value="{{$customer->surname}}" required>
        </div>
        <div class="grid grid-cols-2 gap-4">
                <span class="font-serif text-slate-600 dark:text-slate-400 col-span-2">Hobbies</span>
            @foreach($hobbies as $hobby)
                <label class="inline-flex items-center">
                    <input type="checkbox" name="hobbies[]" value="{{ $hobby->id }}" class="form-checkbox" {{ in_array($hobby->id, $customerHobbies) ? 'checked' : '' }}>
                    <span class="ml-2 text-slate-800 dark:text-white">{{ ucfirst($hobby->name) }}</span>
                </label>
            @endforeach
        </div>
                @error('hobbies')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
        <div class="flex items-center justify-between mt-4">

            <button class="inline-flex items-center px-4 py-2 bg-sky-500 rounded active:bg-sky-700 focus:outline-none focus:border-sky-500 text-white"type="submit">Actualizar cliente</button>
        </div>
    </div>
</form>



</x-layouts.app>
