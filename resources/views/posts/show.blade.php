<x-app-layout>
    <div class="container py-8">
    <h1 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h1>
        <div class="text-lg text-gray-500 mb-2">
            {!!$post->extract!!}
            
        </div>
        <div class="text-lg text-gray-500  mb-2">
            Creado por: <span class="font-bold"> {{ $post->user->name }} - {{ $post->created_at->diffForHumans() }} </span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
            {{-- contenido principal --}}
            <div class="col-span-2">
                <figure>

                        @if ($post->image)
                            <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="{{ $post->name }}">
                        @else
                            <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2023/12/12/15/36/sea-8445435_960_720.jpg "
                        @endif
                        
                 

                </figure>
                <div class="text-base text-gray-500 mt-4 text-justify">
                    {!!$post->body!!}
                </div>
            </div>
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{ $post->category->name }}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $similar) }}">

                                    @if ($similar->image)
                                        <img class="w-100 h-20 object-cover object-center" src="{{ Storage::url($similar->image->url) }}" alt="{{ $similar->name }}">
                                    @else
                                        <img class="w-100 h-20 object-cover object-center"  alt="{{ $similar->name }}" src="https://cdn.pixabay.com/photo/2023/12/12/15/36/sea-8445435_960_720.jpg">
                                     @endif


                                     <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </aside>
        </div>
    </div>
</x-app-layout>