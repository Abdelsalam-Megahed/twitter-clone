<div class="border border-blue-400 rounded-lg p-4">
    <form method="post" action="/tweets">
        @csrf

        <textarea name="body" class="w-full" placeholder="What's up doc?" ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between items-center">

            <img class="rounded-full" src="{{ auth()->user()->avatar }}" width="50" height="50">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow py-2 px-2 text-white">Tweeeet</button>

        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>
