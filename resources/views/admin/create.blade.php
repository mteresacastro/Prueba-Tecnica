<x-layouts.app title="Create" meta-description="Create meta description">
    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Crear nuevo cliente</h1>

    <form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('admin.store')}}" method="POST">
    @csrf
        <div class="space-y-4">


            <label class="flex flex-col" for="name">
                <span class="font-serif text-slate-600 dark:text-slate-400">Nombre</span>
                <input class="rounded-md shadow-sm text-slate-500 dark:text-slate-500 dark:placeholder:text-slate-600" name="name" type="text" value="{{ old('name')}}" id="name">
                @error('name')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
            </label>

            <label class="flex flex-col" for="surname">
                <span class="font-serif text-slate-600 dark:text-slate-400">Apellidos</span>
                <input class="rounded-md shadow-sm text-slate-500 dark:text-slate-500 dark:placeholder:text-slate-600" name="surname" type="text" value="{{ old('surname')}}" id="surname">
                @error('name')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
            </label>

            <div class="grid grid-cols-2 gap-4">
                <span class="font-serif text-slate-600 dark:text-slate-400 col-span-2">Hobbies</span>
            @foreach($hobbies as $hobby)
                <label class="inline-flex items-center">
                    <input type="checkbox" name="hobbies[]" value="{{ $hobby->id }}" class="form-checkbox">
                    <span class="ml-2 text-white">{{ ucfirst($hobby->name) }}</span>
                </label>
            @endforeach
        </div>
                @error('hobbies')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
        <div class="flex items-center justify-between mt-4">

            <button class="inline-flex items-center px-4 py-2 bg-sky-500 rounded active:bg-sky-700 focus:outline-none focus:border-sky-500 text-white"type="submit">Guardar cliente</button>
        </div>
    </form>

</x-layouts.app>
