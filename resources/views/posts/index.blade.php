<x-app-layout>

<div class="container py-8">

    <form class="w-full mx-auto mb-5">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar Post, Categorías..." required />
        </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


        @foreach ($posts as $post)
            <article style="background-image: url({{ Storage::url($post->image->url) }})" class="w-full h-80 bg-cover bg-center @if($loop->first) col-span-1 md:col-span-2 @endif">
                <div class="w-full h-full px-8 flex flex-col justify-center">
                    <div>
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('posts.tag', $tag) }}" style="background-color: {{ $tag->color }} " class="inline-block px-3 h-6  text-white rounded-full">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    <h1 style="text-shadow: -1px -1px 3px rgba(0,0,0,0.72);" class="text-4xl text-white leading-8 font-bold mt-2"><a href="{{ route("posts.show", $post->id) }}">{{ $post->name }}</a></h1>
                </div>
            </article>
      
            </article>
        @endforeach

        {{ $posts->links() }}

    </div>
</div>

</x-app-layout>