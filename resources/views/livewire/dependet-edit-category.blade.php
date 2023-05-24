<div class="flex space-x-6">
    <div class="sm:col-span-4 w-1/3">
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
          <div class="mt-2">
          <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
            {{-- <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span> --}}
           <select wire:model="selectedcategory" name="category_id" >
                <option value="">--Select Category--</option>
                @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
              
    
           </select>
          </div>
          </div>
      </div>
      @if (!is_null($selectedcategory))
      <div class="sm:col-span-4 w-1/3">
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Sub Category</label>
          <div class="mt-2">
          <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
            {{-- <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span> --}}
           <select wire:model="selectedsubcategory"    name="sub_category_id" >
            <option value="">--Select Sub Category--</option>
              @foreach ($subcategories as $category)
              <option value="{{$category->id}}" >{{$category->name}}</option>
              @endforeach
              
    
           </select>
          </div>
          </div>
      </div>
      @endif
    @if (!is_null($selectedsubcategory))
    <div class="sm:col-span-4 w-1/3">
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Child Category</label>
          <div class="mt-2">
          <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
            {{-- <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span> --}}
           <select wire:model='selectedchildcategory' name="child_category_id" >
            <option value="">--Select Child Category--</option>
              @foreach ($childcategories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
              
    
           </select>
          </div>
          </div>
      </div>
    
    @endif
    </div>  