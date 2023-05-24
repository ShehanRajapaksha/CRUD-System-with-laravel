{{-- welcome-page --}}
<x-admin-layout>
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
            {{ __('Admin panel') }}
        </h2>
    </x-slot>
    <div class="container mx-auto py-8 px-4 ">
      <div class="bg-white rounded-lg shadow-lg overflow-hidden  ">
        <h2 class="text-2xl font-bold mb-4">Comments to Be Approved</h2>
<hr class="my-4">
  @foreach (App\Models\lcomment::where('is_published','0')->get() as $lcomment )
      
  <hr class="my-4">
  <div class=" rounded-lg shadow-lg p-4 bg-white ">
      <h2 class="text-lg font-medium mb-2">{{ $lcomment->listing->title }}</h2>
      <p class="mb-4">{{ $lcomment->comment }}</p>
      <div class="flex justify-end space-x-4">
        <form action="{{ route('lcomments.publish', $lcomment->id) }}" method="POST" >
          @csrf
          <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
            Approve
          </button>
        </form>
        <form action="{{ route('lcomments.destroy', $lcomment->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
            Reject
          </button>
        </form>
      </div>
    </div>
    <div class="w-full flex justify-center items-center">
      <div class="w-1/2 border-t-2 border-gray-500"></div>
    </div>
    @endforeach     
  </div>
  </div>    
  <div class="flex flex-col items-center justify-center h-screen ">
    <div class="w-3/4 bg-gray-100 rounded-lg shadow-lg p-8 border-2 border-gray-200">
      <h2 class="text-2xl font-bold mb-4">Invite a new Lister!</h2>
      <p class="text-lg mb-4">http://127.0.0.1:8000/lister/register/</p><span>
      <p class="text-lg mb-4" id="generatedString" name="generatedString"></p></span>
      <form action="{{route('email.store')}}" method="POST" >
        @csrf
      <div class="flex flex-col mb-4">
        <input type="hidden" id="generatedStringInput" name="generatedStringInput" value="">
        <label class="text-lg font-bold mb-2" for="email">Email Address:</label>
        <input class="border rounded-lg py-2 px-3 text-lg" type="text" id="email" name="email" placeholder="example@example.com">
      </div>
      <button type="button" id="generateButton" name="generateButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="generateRandomString()">Generate Invite Link</button>
      <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded p-4 m-4" >Send Email</button>
    </form>
    </div>
  </div>
    <section class="text-gray-600 body-font ">
        <div class="container px-5  mt-0 mb-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Welcome to admin panel</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Classified Advertisements @2023 <br> As of today We have...</p>
          </div>
          <div class="flex flex-wrap -m-4 text-center">
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-green-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                  <path d="M8 17l4 4 4-4m-4-5v9"></path>
                  <path d="M20.88 18.09A5 5 0 0018 9h-1.26A8 8 0 103 16.29"></path>
                </svg>
                <h2 class="title-font font-medium text-3xl text-gray-900">{{count($listings)}}</h2>
                <p class="leading-relaxed">Listings</p>
              </div>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-green-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                  <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
                </svg>
                <h2 class="title-font font-medium text-3xl text-gray-900">{{count($users)}}</h2>
                <p class="leading-relaxed">Users</p>
              </div>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-gray-200 px-4  mt-0 mb-24 rounded-lg">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-green-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                  <path d="M3 18v-6a9 9 0 0118 0v6"></path>
                  <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"></path>
                </svg>
                <h2 class="title-font font-medium text-3xl text-gray-900">{{intval(App\Models\Comment::count())+intval(App\Models\lcomment::count())}}</h2>
                <p class="leading-relaxed">comments</p>
              </div>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-green-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>
                <h2 class="title-font font-medium text-3xl text-gray-900">{{App\Models\Category::count()}}</h2>
                <p class="leading-relaxed">>Categories</p>
              </div>
            </div>
          </div>
        </div>
        
      </section>
    
      
</x-admin-layout>
<script>
  const generateButton = document.getElementById('generateButton');
  const generatedString = document.getElementById('generatedString');

  function generateRandomString() {
    const length = 10;
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let result = '';
    for (let i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return result;
  }

  generateButton.addEventListener('click', () => {
    const randomString = generateRandomString();
    generatedString.innerText = randomString;
    generatedStringInput.value = randomString;
  });
</script>
