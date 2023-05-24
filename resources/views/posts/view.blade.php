<x-app-layout>
  @if(session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
    <div class="container mx-auto py-8 px-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="{{ Storage::url($post->featured_image) }}" alt="post image" class="w-full h-64 object-cover object-center">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4">{{$post->name}}</h1>
                <p class="text-gray-700 leading-relaxed mb-8">
                    {!! nl2br(e($post->description)) !!}
                </p>
            </div>
        </div>
    </div>
    
    <div class="max-w-xl m-5 justify-start">
        <h2 class="text-2xl font-bold mb-4">Comments</h2>
        <form action="{{route('comments.store')}}" class="mb-4" method ="POST"  >
          @csrf
          <input type="hidden" value="{{$post->id}}" name="post_id" id="post_id">
          {{-- <div class="flex flex-col mb-4">
            <label for="name" class="mb-2 font-bold text-lg text-gray-900">Name</label>
            <input type="text" id="name" name="name" placeholder="Your Name" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-300">
          </div> --}}
         
         
          <div class="flex flex-col mb-4">
            <label for="comment" class="mb-2 font-bold text-lg text-gray-900">Comment</label>
            <textarea id="comment" name="comment" rows="4" placeholder="Write your comment here..." class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-300"></textarea>
          </div>
          <button type="submit" class="px-4 py-2 text-white bg-indigo-500 hover:bg-indigo-600 rounded-lg">Post Comment</button>
        </form>
        @forelse ($post->comments as $comment)
        <div class="space-y-4 m-2 p-2">
          <div class="flex items-start">
            <img src="https://randomuser.me/api/portraits/women/17.jpg" alt="Profile Picture" class="w-10 h-10 rounded-full mr-3">
            <div class="flex-grow">
              <div class="flex justify-between items-center mb-1">
                <h3 class="text-lg font-semibold">
                  @if ($comment->user)
                      {{$comment->user->name}} 
                  @endif
                </h3>
                <button class="text-indigo-500 hover:text-indigo-700">Reply</button>
              </div>
              <p class="text-gray-600 mb-2">{{$comment->created_at->format('d-m-y ')}}</p>
              <p class="text-gray-800">{!! $comment->comment !!}</p>
            </div>
          </div>
        </div>
             
        @empty
          <h6>No Comments Yet </h6>
        @endforelse
      </div>
      
   

</x-app-layout>