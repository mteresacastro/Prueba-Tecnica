<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'titulo' }}</title>
    <meta name="description" content="{{$metadescription ?? 'Default meta description' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-slate-100 dark:bg-slate-900">
    {{--@include('partials.navigation--}}

    <!--así definimos donde queremnos mostrar el contenido variable-->
   {{-- @yield('content')--}}
   @if(session('status'))
        <div class="px-3 py-2 font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
            {{session('status')}}
        </div>
    @endif
    @if(session('error'))
        <div class="px-3 py-2 font-bold text-white sm:px-6 lg:px-8 bg-red-600 dark:bg-red-700">
            {{session('error')}}
        </div>
    @endif
   {{$slot}}


</body>

</html>



