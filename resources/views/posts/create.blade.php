<x-app-layout>
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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Post') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto">
        
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required placeholder="Title">
            @error('title') <span
                        class="error">{{ $message }}</span>
                @enderror
        </div>
          <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Featured Image:</label>
            <input type="file" name="featured_image" id="featured_image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('featured_image') <span
                        class="error">{{ $message }}</span>
                @enderror
        </div>
          <div class="mb-6">
            <label for="content" class="block text-gray-700 font-bold mb-2">Content:</label>
            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="6" required>Express yourself! Write something Great</textarea>
            @error('description') <span
            class="error">{{ $message }}</span>
            @enderror 
        </div>
      
      <div class="mb-6">
        <label for="content" class="block text-gray-700 font-bold mb-2">Featured Text:</label>
        <textarea name="featured_text" id="featured_text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " rows="6" required>Express yourself! Write something Great</textarea>
        @error('featured_text') <span
        class="error">{{ $message }}</span>
        @enderror 
    </div>


          <div class="mb-4">

            <label for="is_published" class="block text-sm font-medium text-gray-700">
                Published
            </label>
            <div class="mt-1 flex rounded-md shadow-sm">
                <select name="is_published"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                    <option value="0">Unpublished </option>
                    <option value="1">Published </option>
                </select>
                @error('is_published') <span
                        class="error">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="m-2 p-2">
          @livewire('depended-category')
          <div>
          <div class="flex items-center justify-start m-2 p-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Post</button>
          </div>
        </form>
      </div>
    

</x-app-layout>