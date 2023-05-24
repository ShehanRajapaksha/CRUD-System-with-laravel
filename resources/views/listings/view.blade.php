<x-app-layout>
    @if(session('alert'))
      <div class="alert alert-success">
          {{ session('alert') }}
      </div>
  @endif
  <div class="grid grid-cols-10">
    <div class="col-span-7 z-20 bg-white p-6 border-2 border-gray-100 shadow-lg  mb-4">
      <div class="container mx-auto py-8 px-4">
      
<div id="gallery" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ Storage::url($listing->featured_image) }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="{{ Storage::url($listing->image_one) }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ Storage::url($listing->image_two) }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ Storage::url($listing->image_three) }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

          <div class="bg-white shadow-md rounded-md p-4">
            <h2 class="text-2xl font-semibold mb-2">{{$listing->title}}</h2>
            <div class="flex items-center mb-4">
              <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded-full text-sm mr-2">{{$listing->category->name}}</span>
              <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded-full text-sm mr-2">{{ optional($listing->subcategory)->name }}</span>
              <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded-full text-sm mr-2">{{ optional($listing->childcategory)->name }}</span>
              <span class="text-gray-500">{{$listing->price}}/night</span>
            </div>
            <p class="text-gray-700">{!! nl2br(e($listing->description)) !!}</p>
            <div class="flex items-center mt-4">
              <svg class="w-6 h-6 fill-current text-gray-500 mr-2" viewBox="0 0 24 24">
                <path d="M12 22.4l-8.22 1.2L4 17.09l-4-3.62l1.94-7.01L8.74 4.8L12 0l3.26 4.8l5.8 1.66l1.94 7.01l-4 3.62l.46 6.51L12 22.4zm-1.54-3.15l-3.38 2.07l-.29-3.97l-3.08-2.82l4.03-.35l1.72-3.69l1.72 3.69l4.03.35l-3.08 2.82l-.29 3.97z"></path>
              </svg>
              <span class="text-gray-500 m-4 p-4">Located in {{$listing->location}}</span>
              <div class="flex flex-col items-center justify-center">
                <p class="text-gray-600 mt-1">Phone number:</p>
                <a href="tel:+1-555-555-5555" class="text-blue-500 hover:text-blue-700 font-semibold text-lg">{{$listing->phone_number}}</a>
              </div>
            </div>
          </div>
          
      </div>
    </div>
    <div class="col-span-3  p-6">
      
    <div class="bg-gray-100 p-4 rounded-lg w-full">
      <h2 class="text-xl font-bold mb-4">Similar Listings</h2>
      <div class="flex flex-col gap-4">
        @php $count = 0 @endphp
        @foreach ($otherlistings as $listing)
        @if ($count < 6)
        <div class="flex flex-row">
          <img src="https://via.placeholder.com/80" alt="Listing Image" class="w-16 h-16 object-cover rounded-lg">
          <div class="ml-2 flex flex-col justify-center">
            <h3 class="font-bold text-lg">{{$listing->title}}</h3>
            <p class="text-sm text-gray-600">{{$listing->location}}</p>
            <p class="text-sm text-gray-600">{{$listing->price}}</p>
          </div>
        </div>
        @php $count++ @endphp
        @else
          @break
        @endif
      @endforeach
      {{-- {{ dd($otherlistings) }} --}}
        {{-- <div class="flex flex-row">
          <img src="https://via.placeholder.com/80" alt="Listing Image" class="w-16 h-16 object-cover rounded-lg">
          <div class="ml-2 flex flex-col justify-center">
            <h3 class="font-bold text-lg">Listing Title</h3>
            <p class="text-sm text-gray-600">Listing description</p>
            <p class="text-sm text-gray-600">Listing price</p>
          </div>
        </div>
        <div class="flex flex-row">
          <img src="https://via.placeholder.com/80" alt="Listing Image" class="w-16 h-16 object-cover rounded-lg">
          <div class="ml-2 flex flex-col justify-center">
            <h3 class="font-bold text-lg">Listing Title</h3>
            <p class="text-sm text-gray-600">Listing description</p>
            <p class="text-sm text-gray-600">Listing price</p>
          </div>
        </div> --}}
      
      </div>
    </div>


    </div>
  </div>
      <div class="max-w-xl m-5 justify-start">
          <h2 class="text-2xl font-bold mb-4">Comments</h2>
          <form action="{{route('lcomments.store')}}" class="mb-4" method ="POST"  >
            @csrf
            <input type="hidden" value="{{$listing->id}}" name="listing_id" id="listing_id">
            
           
           
            <div class="flex flex-col mb-4">
              <label for="comment" class="mb-2 font-bold text-lg text-gray-900">Comment</label>
              <textarea id="comment" name="comment" rows="4" placeholder="Write your comment here..." class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-300"></textarea>
            </div>
            <button type="submit" class="px-4 py-2 text-white bg-indigo-500 hover:bg-indigo-600 rounded-lg">Post Comment</button>
          </form>
          @forelse ($lcomments as $comment)
        
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
  <script>
    let currentImage = 0;
    const images = document.querySelectorAll('.relative img');
    const prevButton = document.querySelector('.absolute button:first-of-type');
    const nextButton = document.querySelector('.absolute button:last-of-type');
  
    function showImage(index) {
      images[currentImage].classList.add('hidden');
      images[index].classList.remove('hidden');
      currentImage = index;
      toggleButtons();
    }
  
    function prevImage() {
      showImage(currentImage === 0 ? images.length - 1 : currentImage - 1);
    }
  
    function nextImage() {
      showImage(currentImage === images.length - 1 ? 0 : currentImage + 1);
    }
  
    function toggleButtons() {
      prevButton.disabled = currentImage === 0;
      nextButton.disabled = currentImage === images.length - 1;
    }
  
    toggleButtons();
  </script>