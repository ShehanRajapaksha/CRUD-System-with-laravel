<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Listing') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="overflow-hidden sm:rounded-lg bg-gray-200 m-2 p-2">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="flex space-x-4">
                            <div class="w-1/3">
                              <label for="category" class="block text-sm font-medium leading-5 text-gray-700">Category</label>
                              <select id="category" name="category" class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                                <option value="">-- Select Category --</option>
                                <option value="1">Category 1</option>
                                <option value="2">Category 2</option>
                                <option value="3">Category 3</option>
                              </select>
                            </div>
                          
                            <div class="w-1/3">
                              <label for="subcategory" class="block text-sm font-medium leading-5 text-gray-700">Subcategory</label>
                              <select id="subcategory" name="subcategory" class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                                <option value="">-- Select Subcategory --</option>
                                <option value="1">Subcategory 1</option>
                                <option value="2">Subcategory 2</option>
                                <option value="3">Subcategory 3</option>
                              </select>
                            </div>
                          
                            <div class="w-1/3">
                              <label for="childcategory" class="block text-sm font-medium leading-5 text-gray-700">Child Category</label>
                              <select id="childcategory" name="childcategory" class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                                <option value="">-- Select Child Category --</option>
                                <option value="1">Child Category 1</option>
                                <option value="2">Child Category 2</option>
                                <option value="3">Child Category 3</option>
                              </select>
                            </div>
                          </div> --}}
                          
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                {{-- @livewire('depended-category') --}}
                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6">
                                        <label for="title" class="block text-sm font-medium text-gray-700">
                                            Title
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="title" id="title"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                placeholder="title">
                                            @error('title') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                    @livewire('depended-category')
                                
                                   
                                    <div class="col-span-6">
                                        <label for="description" class="block text-sm font-medium text-gray-700">
                                            Description
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <textarea type="text" name="description" id="description"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"></textarea>
                                            @error('description') <span
                                                    class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="description" class="block text-sm font-medium text-gray-700">
                                            Facilities
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <textarea type="text" name="facilities" id="facilities"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"></textarea>
                                            @error('facilities') <span
                                                    class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-span-6 md:col-span-4">
                                        <label for="price" class="block text-sm font-medium text-gray-700">
                                            Price
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="price" id="price"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                placeholder="Price">
                                            @error('price') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                     
                                  
                                    <div class="col-span-6">
                                        <label for="location" class="block text-sm font-medium text-gray-700">
                                            Location
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="location" id="location"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                placeholder="location">
                                            @error('location') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                 
                                      @livewire('dependet-country')
                                      @livewire('image-preview')

                                    <div class="col-span-6 md:col-span-3">
                                        <label for="phone_number" class="block text-sm font-medium text-gray-700">
                                            Phone Number
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="number" name="phone_number" id="phone_number"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                placeholder="Phone">
                                            @error('phone_number') <span
                                                    class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-span-6 md:col-span-3">
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
                                </div>

                                {{-- @livewire('dependet-country')
                                @livewire('image-preview') --}}
                                <div class="px-4 py-3 bg-gray-50 sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>