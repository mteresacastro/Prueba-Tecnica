
<div class="space-y-4">
    <label class="flex flex-col"for="">
        <span class="font-serif text-slate-600 dark:text-slate-400">Titulo</span>
        <input class="rounded-md shadow-sm text-slate-500 dark:text-slate-500 dark:placeholder:text-slate-600"name="title" type="text" value="{{ old('title', $post->title )}}">

        @error('title')

            <small class="font-bold text-red-500/80">{{ $message }}</small>
        @enderror
    </label>
    <label class="flex flex-col"for="">
        <span class="font-serif text-slate-600 dark:text-slate-400">Contenido</span>
        <textarea class="rounded-md shadow-sm text-slate-500 dark:text-slate-500 dark:placeholder:text-slate-600" name="body">{{old('body', $post->body)}}</textarea>

        @error('body')

            <small class="font-bold text-red-500/80">{{ $message }}</small>
        @enderror
    </label>
</div>
