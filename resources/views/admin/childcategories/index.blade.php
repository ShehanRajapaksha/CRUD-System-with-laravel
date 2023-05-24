<x-admin-layout>
    {{-- dashboard-page-hero --}}
    <x-slot name="header">
        @if (session('message'))
            <div class="bg-green-500 text-gray-200 m-2 p-4 rounded-md text-lg text-center " id="message-div">{{session('message')}}</div>
            <script>
                setTimeout(function(){
                  document.getElementById('message-div').classList.add('hidden');
                }, 3000);
              </script>
            
        @endif
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ChildCategories') }}
        </h2>
    </x-slot>
    <div class="flex justify-end">
        <a href ="{{route('childcategories.create')}}"    class="py-2 px-4 m-2 bg-green-500 hover:bg-green-600 text-gray-50 rounded-md">New Child Category</a>
    </div>

   
                <section class="text-gray-600 body-font">
                   
                    <div class="container px-5 py-24 mx-auto">
                       

                    
                    <div class="flex flex-wrap -m-4">
                       
                        @foreach ($child_categories as $category)
                        
                            <div class="lg:w-1/4 md:w-1/2 p-4 w-full m-2 ">
                                <a class="block relative h-48 rounded overflow-hidden" href="{{route('childcategories.edit',$category->id)}}"> 
                                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{Storage::url($category->image)}}">
                                </a>
                                <div class="mt-4">
                                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{$category->name}}</h3>
                                    <h2 class="text-gray-900 title-font text-lg font-medium">{{$category->slug}}</h2>
                                    <div class="flex justify-end">
                                        <form method="POST" action="{{ route('childcategories.destroy', $category->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" ml-auto rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 ">Delete</button>
                                        </form>
                                    </div>
                                    </div>
                            </div>
                            @endforeach
                    </div>
                    
                    </div>
                   
                </section>
    
</x-admin-layout>
