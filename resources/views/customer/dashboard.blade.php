
<x-layouts.app title="Dashboard" meta-description="Dashboard meta description">

<a class="text-sm font-semibold underline border-2 text-center text-sky-600 border-transparent focus:border-slate-500 focus:outline-none display-block" href="{{route('login')}}" > Salir </a>

<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Panel de control Cliente</h1>

<form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('customer.update')}}" method="POST">
    @csrf
    @method('PATCH')
    <h2 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Editar mis datos</h2>
    <div class="flex flex-col items-center justify-between mt-4">
        <div class="space-y-4">
            <label class="text-slate-500 flex flex-col" for="email">Email</label>
            <input class="rounded-md shadow-sm text-slate-500 dark:text-slate-500 dark:placeholder:text-slate-600" type="email" id="email" name="email" value="{{$user->email}}" required>

            <label class="text-slate-500 flex flex-col" for="name">Nombre</label>
            <input class="rounded-md shadow-sm text-slate-500 dark:text-slate-500 dark:placeholder:text-slate-600" type="text" id="name" name="name" value="{{$customer->name}}" required>

            <label class="text-slate-500 flex flex-col" for="surname">Apellidos</label>
            <input class="rounded-md shadow-sm text-slate-500 dark:text-slate-500 dark:placeholder:text-slate-600" type="text" id="surname" name="surname" value="{{$customer->surname}}" required>
        </div>
        <div class="space-y-4">
            <button class="mt-4 items-center px-4 py-2 bg-sky-700 hover:bg-sky-900 rounded active:bg-sky-800 focus:outline-none focus:border-sky-500 text-sky-200" type="submit">Actualizar</button>
        </div>
    </div>
</form>



</x-layouts.app>
