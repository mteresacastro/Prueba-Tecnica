<x-layouts.app title="Login" meta-description="Login meta description">
    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Credenciales de acceso</h1>

    <form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('login')}}" method="POST">
    @csrf
        <div class="space-y-4">


            <label class="flex flex-col"for="">
                <span class="font-serif text-slate-600 dark:text-slate-400">Email</span>
                <input class="rounded-md shadow-sm text-slate-500 dark:text-slate-500 dark:placeholder:text-slate-600"name="email" type="email" value="{{ old('email')}}">
                @error('email')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
            </label>
            <label class="flex flex-col"for="">
                <span class="font-serif text-slate-600 dark:text-slate-400">Contraseña</span>
                <input class="rounded-md shadow-sm text-slate-500 dark:text-slate-500 dark:placeholder:text-slate-600"name="password" type="password">
                @error('password')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
            </label>
        </div>
        <div class="flex items-center justify-between mt-4">

            <button class="inline-flex items-center px-4 py-2 bg-sky-700 rounded active:bg-sky-800 focus:outline-none focus:border-sky-500 text-sky-200"type="submit">Acceder</button>
        </div>
    </form>

</x-layouts.app>

