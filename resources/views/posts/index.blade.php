<x-main-layout>
    {{-- dashboard-page-hero --}}
    <x-slot name="header">
        @if (session('message'))
            <div class="bg-green-500 text-gray-200 m-2 p-4 rounded-md  " id="message-div">{{session('message')}}</div>
            <script>
                setTimeout(function(){
                  document.getElementById('message-div').classList.add('hidden');
                }, 3000);
              </script>
            
        @endif
       
    <x-slot name="header">
      <x-main-header></x-main-header>

  </x-slot>
    
    <div class="flex justify-end">
        <a href ="{{route('posts.create')}}"    class="py-2 px-4 m-2 bg-blue-500 hover:bg-blue-700 text-gray-50 rounded-md">New Post</a>
    </div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-wrap -mx-4 -my-8">
            @foreach($posts as $post)
            <a href="{{route('posts.show' , $post->id)}}">
            <div class="py-8 px-4 lg:w-1/3">
              <div class="h-full flex items-start">
                <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
                  <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">{{$post->created_at->format('F')}}</span>
                  <span class="font-medium text-lg text-gray-800 title-font leading-none">{{$post->created_at->format('d')}}</span>
                </div>
                <div class="flex-grow pl-6">
                  <h2 class="tracking-widest text-xs title-font font-medium text-red-500 mb-1">{{$post->category->name}}</h2>
                  <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{$post->name}}</h1>
                  <p class="leading-relaxed mb-5">{{$post->featured_text}}</p>
                  <a class="inline-flex items-center">
                    <img alt="blog" src="https://dummyimage.com/103x103" class="w-8 h-8 rounded-full flex-shrink-0 object-cover object-center">
                    <span class="flex-grow flex flex-col pl-3">
                      <span class="title-font font-medium text-gray-900">{{$post->user->name}}</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
            </a>
            @endforeach
        </div>
          </div>
        </div>
        <div class="m-2 p-2">
          {{$posts->links()}}
        </div>
      </section>
</x-main-layout>