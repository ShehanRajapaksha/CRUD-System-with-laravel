<div>
    <div>
        <div class="col-span-full">
            <label for="featured_image" class="block text-sm font-medium leading-6 text-gray-900">Featured Image</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
              <div class="text-center">
                @if ($oldfeaturedImage)    
                <div class="m-2 p-2 w-36 h-36 rounded" id="oldfeaturedImage">
                    
                    <img src="{{Storage::url($oldfeaturedImage)}}">
        
                </div>
                @endif
                @if ($featuredImage)
                        <script>
                            document.getElementById('oldfeaturedImage').classList.add('hidden')
                        </script>

                        <div class="m-2 p-2 w-36 h-36 rounded">

                    
                            <img src="{{$featuredImage-> temporaryUrl()}}">
        
                        </div>
                @endif
               
               
                <div class="sm:col-span-6">
                    <label for="image" class="block text-sm font-medium text-gray-700"> Image </label>
                    <div class="mt-1">
                      <input wire:model="featuredImage" type="file" id="featured_image" name="featured_image" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-span-full">
            <label for="image" class="block text-sm font-medium leading-6 text-gray-900"> Image 01</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
              <div class="text-center">
                @if ($oldimageOne)    
                <div class="m-2 p-2 w-36 h-36 rounded" id="oldimageOne">
                    
                    <img src="{{Storage::url($oldimageOne)}}">
        
                </div>
                @endif
                @if ($imageOne)
                        <script>
                            document.getElementById('oldimageOne').classList.add('hidden')
                        </script>

                        <div class="m-2 p-2 w-36 h-36 rounded">

                    
                            <img src="{{$imageOne-> temporaryUrl()}}">
        
                        </div>
                @endif
               
                <div class="sm:col-span-6">
                    <label for="image_one" class="block text-sm font-medium text-gray-700"> Image </label>
                    <div class="mt-1">
                      <input wire:model="imageOne" type="file" id="image_one" name="image_one" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-span-full">
            <label for="image_two" class="block text-sm font-medium leading-6 text-gray-900">Image 02</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
              <div class="text-center">
                @if ($oldimageTwo)    
                <div class="m-2 p-2 w-36 h-36 rounded" id="oldimageTwo">
                    
                    <img src="{{Storage::url($oldimageTwo)}}">
        
                </div>
                @endif
                @if ($imageTwo)
                        <script>
                            document.getElementById('oldimageTwo').classList.add('hidden')
                        </script>

                        <div class="m-2 p-2 w-36 h-36 rounded">

                    
                            <img src="{{$imageTwo-> temporaryUrl()}}">
        
                        </div>
                @endif
                <div class="sm:col-span-6">
                    <label for="image_two" class="block text-sm font-medium text-gray-700"> Image </label>
                    <div class="mt-1">
                      <input wire:model="imageTwo" type="file" id="image_two" name="image_two" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-span-full">
            <label for="image" class="block text-sm font-medium leading-6 text-gray-900"> Image 03</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
              <div class="text-center">
                @if ($oldimageThree)    
                <div class="m-2 p-2 w-36 h-36 rounded" id="oldimageThree">
                    
                    <img src="{{Storage::url($oldimageThree)}}">
        
                </div>
                @endif
                @if ($imageThree)
                        <script>
                            document.getElementById('oldimageThree').classList.add('hidden')
                        </script>

                        <div class="m-2 p-2 w-36 h-36 rounded">

                    
                            <img src="{{$imageThree-> temporaryUrl()}}">
        
                        </div>
                @endif
                <div class="sm:col-span-6">
                    <label for="image_three" class="block text-sm font-medium text-gray-700"> Image </label>
                    <div class="mt-1">
                      <input wire:model="imageThree" type="file" id="image_three" name="image_three" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
