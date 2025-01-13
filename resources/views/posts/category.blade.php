<x-app-layout>
    <div class="container py-8">
   
    <div class="py-8">
        <h1 class=" uppercase text-center text-3xl font-bold text-gray-600">CATEGORÍA: {{ $category->name }}</h1>
    </div>
    <div class="grid grid-cols-1 gap-6">

        @foreach ($posts as $post)

            
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <a href="{{ route("posts.show", $post) }}">
                <article style="background-image: url(@if ($post->image)  {{ Storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2023/12/12/15/36/sea-8445435_960_720.jpg  @endif)" class="w-full h-80 bg-cover bg-center col-span-1 ">
                </article>
             </a>
                            
            <div class="px-6 py-4 ">
                <h1 class="text-4xl text-gray-6 leading-8 font-bold mb-4"><a href="{{ route("posts.show", $post) }}">{{ $post->name }}</a></h1>
                    <div class="flex justify-between items-center">
                    
                 </div>

                 <div class="text-gray-600 text-base">
                    {!!$post->extract!!}

                 </div>
            </div>
      
            </article>

            <div class="px-6 py-2 pb-2">
                @foreach ($post->tags as $tag)
                    <a href="{{ route('posts.tag', $tag) }}" style="background-color: {{ $tag->color }} " class="inline-block px-3 h-6  text-white rounded-full">{{ $tag->name }}</a>
                @endforeach

            </div>



        </div>
        @endforeach

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>

    </div>
</x-app-layout>