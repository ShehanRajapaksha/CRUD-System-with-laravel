<x-admin-layout>
    {{-- admin-category-create --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New City') }}
        </h2>
    </x-slot>

    <div class="container mx-auto w-full">
        <div class="flex flex-col w-full">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 w-full">
                    <div class="py-2 align-middle inline-block  sm:px-6 lg:px-8 w-full">
                   
                        <div class="flex justify-start">
                            <a href ="{{route('admin.cities.index')}}"    class="py-2 px-4 m-2 bg-green-500 hover:bg-green-600 text-gray-50 rounded-md">Back</a>
                        </div>
                        <div class="h-4"></div>
                        <form action="{{route('admin.cities.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="space-y-12">
                              <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Create City</h2>
                                
                          
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                  <div class="sm:col-span-4">
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-2">
                                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        {{-- <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span> --}}
                                        <input type="text" name="name" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="City name">
                                      </div>
                                    </div>
                                  </div>
                               
                                    <div class="sm:col-span-4">
                                      <label for="name" class="block text-sm font-medium leading-6 text-gray-900">State</label>
                                        <div class="mt-2">
                                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                          {{-- <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span> --}}
                                         <select name="state_id" >
                                            @foreach ($states as $state)
                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                            

                                         </select>
                                        </div>
                                        </div>
                                    </div>
                                    
                                  
                                
                                </div>
                                
                          
                                  
                              <div class="mt-6 flex items-center justify-end gap-x-6">
                                
                                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" >Save</button>
                              </div>
                            </form>
                        </div>
                    </div>
            </div>
    </div>
</x-admin-layout>
