<div>
    <div class="flex space-x-6">
        <div class="sm:col-span-4 w-1/3">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
              <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                {{-- <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span> --}}
               <select wire:model="selectedcountry" name="country_id" >
                    <option value="">--Select Country--</option>
                    @foreach ($countries as $country)
                  <option value="{{$country->id}}">{{$country->name}}</option>
                  @endforeach
                  @error('country')
                  <span class="error">{{$message}}</span>
                      
                  @enderror
        
               </select>
              </div>
              </div>
          </div>
          @if (!is_null($selectedcountry))
          <div class="sm:col-span-4 w-1/3">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">State</label>
              <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                {{-- <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span> --}}
               <select wire:model="selectedstate"    name="state_id" >
                <option value="">--Select Sub Category--</option>
                  @foreach ($states as $state)
                  <option value="{{$state->id}}">{{$state->name}}</option>
                  @endforeach
                  @error('state_id')
                  <span class="error">{{$message}}</span>
                      
                  @enderror
        
               </select>
              </div>
              </div>
          </div>
          @endif
        @if (!is_null($selectedstate))
        <div class="sm:col-span-4 w-1/3">
            <label for="city_id" class="block text-sm font-medium leading-6 text-gray-900">City</label>
              <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                {{-- <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span> --}}
               <select wire:model="selectedcity" name="city_id" >
                <option value="">--Select Child Category--</option>
                  @foreach ($cities as $city)
                  <option value="{{$city->id}}">{{$city->name}}</option>
                  @endforeach
                  @error('city_id')
                  <span class="error">{{$message}}</span>
                      
                  @enderror
        
               </select>
              </div>
              </div>
          </div>
        
        @endif
        </div>  
</div>
