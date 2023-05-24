<x-admin-layout>
    {{-- admin-category-create --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $category->name }}
        </h2>
    </x-slot>

    <div class="container mx-auto w-full">
        <div class="flex flex-col w-full">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 w-full">
                    <div class="py-2 align-middle inline-block  sm:px-6 lg:px-8 w-full">
                   
                        <div class="flex justify-start">
                            <a href ="{{route('admin.categories.index')}}"    class="py-2 px-4 m-2 bg-green-500 hover:bg-green-600 text-gray-50 rounded-md">Back</a>
                        </div>
                        <div class="h-4"></div>
                        <form action="{{route("admin.categories.update", $category->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            @method('PUT')
                            <div class="space-y-12">
                              <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Category</h2>
                                
                          
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                  <div class="sm:col-span-4">
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-2">
                                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        {{-- <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span> --}}
                                        <input type="text" name="name" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{$category->name}}">
                                      </div>
                                    </div>
                                  </div>
                          
                                  {{-- <div class="col-span-full">
                                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
                                    <div class="mt-2">
                                      <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
                                    </div>
                                    <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
                                  </div> --}}
                          
                                  {{-- <div class="col-span-full">
                                    <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                                    <div class="mt-2 flex items-center gap-x-3">
                                      <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                      </svg>
                                      <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
                                    </div>
                                  </div> --}}
                          
                                  <div class="col-span-full">
                                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Category Image</label>
                                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                      <div class="text-center">
                                        
                                        <div class="sm:col-span-6">
                                            
                                            <div class="w-full m-2 p-2">
                                                <img class="h-32 w-32" src="{{Storage::url($category->image)}}" alt="Category_image" >
                                            </div>
                                            <div class="mt-1">
                                              <input type="file" id="image" name="image" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                            </div>
                              <div class="mt-6 flex items-center justify-end gap-x-6">
                              
                                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" >Save</button>
                              </div>
                            </form>
                  
                    </div>
            </div>
    </div>
</x-admin-layout>
