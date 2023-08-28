<x-frontend><!-- The layout -->
  <!-- frontend-main view -->
  <x-home-main>
<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class=" h-64 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        @if(!empty($galleries))
        @foreach($galleries as $key => $gallery)
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ $gallery->image_url }}" class="absolute block w-full md:h-[480px]" alt="$gallery->title }}">
        </div>
        @endforeach
        @endif
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        @if(!empty($galleries))
        @foreach($galleries as $key => $gallery)
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="{{ $gallery->id }}"></button>
        
        @endforeach
        @endif
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>



<div class="bg-blue-600 dark:bg-slate-800 p-10">
        <h2 class="font-bold text-4xl py-20 text-center text-white">
            Our Teams
        </h2>
        <div id="example" class="mb-10">
      xxxxx
  </div>
        <div class="flex flex-col md:flex-row flex-wrap">
            <div
                class="flex-1 bg-white dark:bg-slate-500 p-3 hover:bg-gray-100 transition cursor-pointer hover:-translate-y-6 mb-10">
                <div class="bg-teal-500 w-20 h-20 m-auto rounded-full flex justify-center -mt-10">
                    <h3 class="text-center font-serif font-medium text-4xl m-auto text-white">
                        01
                    </h3>
                </div>
                <div class="py-8 px-6 text-center">
                    <p class="text-gray-500 dark:text-slate-50 p-4">
                        Article evident arrived express highest men did boy. Mistress sensible entirely am so. Quick can
                        manor smart money hopes worth too. Comfort produce husband boy her had hearing. Law others
                        theirs
                        passed but wishes. You day real less till dear read less till dear rea.
                    </p>
                    <p class="mt-5">
                        <img src="https://i.ibb.co/QCP76ZW/profile.jpg" alt="" class="w-20 h-20 rounded-full m-auto">
                    </p>
                    <h3 class="font-serif  mt-3 text-slate-800 dark:text-slate-100 text-3xl font-medium">
                        Josh Larson
                    </h3>
                    <h4 class="font-thin text-slate-500 dark:text-slate-100 mt-3">
                        CEO & Founder
                    </h4>
                </div>
            </div>
            <div class="flex-1 bg-gray-200 p-3 hover:bg-gray-300 transition cursor-pointer hover:-translate-y-6 mb-10">
                <div class="bg-teal-500 w-20 h-20 m-auto rounded-full flex justify-center -mt-10">
                    <h3 class="text-center font-serif font-medium text-4xl m-auto text-white">
                        02
                    </h3>
                </div>
                <div class="py-8 px-6 text-center">
                    <p class="text-gray-500 p-4">
                        Article evident arrived express highest men did boy. Mistress sensible entirely am so. Quick can
                        manor smart money hopes worth too. Comfort produce husband boy her had hearing. Law others
                        theirs
                        passed but wishes. You day real less till dear read less till dear rea.
                    </p>
                    <p class="mt-5">
                        <img src="https://i.ibb.co/QCP76ZW/profile.jpg" alt="" class="w-20 h-20 rounded-full m-auto">
                    </p>
                    <h3 class="font-serif  mt-3 text-black text-3xl font-medium">
                        Josh Larson
                    </h3>
                    <h4 class="font-thin text-slate-500 mt-3">
                        CEO & Founder
                    </h4>
                </div>
            </div>
            <div
                class="flex-1 bg-white dark:bg-slate-500 p-3 hover:bg-gray-100 transition cursor-pointer hover:-translate-y-6 mb-10">
                <div class="bg-teal-500 w-20 h-20 m-auto rounded-full flex justify-center -mt-10">
                    <h3 class="text-center font-serif font-medium text-4xl m-auto text-white dark:hover:text-slate-900">
                        01
                    </h3>
                </div>
                <div class="py-8 px-6 text-center">
                    <p class="text-gray-500 dark:text-slate-50 p-4">
                        Article evident arrived express highest men did boy. Mistress sensible entirely am so. Quick can
                        manor smart money hopes worth too. Comfort produce husband boy her had hearing. Law others
                        theirs
                        passed but wishes. You day real less till dear read less till dear rea.
                    </p>
                    <p class="mt-5">
                        <img src="https://i.ibb.co/QCP76ZW/profile.jpg" alt="" class="w-20 h-20 rounded-full m-auto">
                    </p>
                    <h3 class="font-serif  mt-3 text-slate-800 dark:text-slate-100 text-3xl font-medium">
                        Josh Larson
                    </h3>
                    <h4 class="font-thin text-slate-500 dark:text-slate-100 mt-3">
                        CEO & Founder
                    </h4>
                </div>
            </div>
        </div>
    </div>



<div class="flex lg:flex-row flex-col items-center py-8 px-4">
<!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->

            <!-- Code block starts -->
            <div class="flex flex-col lg:mr-16">
                <label for="email" class="text-gray-800 dark:text-gray-100 text-sm font-bold leading-tight tracking-normal mb-2">Email</label>
                <input id="email" autocomplete="off" class="text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 dark:focus:border-indigo-700 dark:border-gray-700 dark:bg-gray-800 bg-white font-normal w-64 h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" placeholder="Placeholder" />
            </div>
            <!-- Code block ends -->
            <!-- Code block starts -->
            <div class="flex flex-col lg:mr-16 lg:py-0 py-4">
                <label for="last_email" class="text-gray-400 text-sm font-bold leading-tight tracking-normal mb-2">Email</label>
                <input disabled id="last_email" class="text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 dark:focus:border-indigo-700 dark:border-gray-700 dark:bg-gray-700 font-normal w-64 h-10 flex items-center pl-3 text-sm border-gray-300 bg-gray-200 rounded border shadow" placeholder="Placeholder" />
            </div>
            <!-- Code block ends -->
            <!-- Code block starts -->
            <div class="flex flex-col lg:py-0 py-4">
                <label for="email1" class="lg:pt-4 text-gray-400 text-sm font-bold leading-tight tracking-normal mb-2"></label>
                <input id="email1" class="text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 dark:focus:border-indigo-700 dark:border-gray-700 dark:bg-gray-800 bg-white font-normal w-64 h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" placeholder="example@example.com" />
            </div>
            <!-- Code block ends -->
    </div>



<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
    <div class="text-center pb-12">
        <h2 class="font-bold text-4xl py-2 text-center text-white">
            School Teachers
        </h2>
    </div>
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="w-full flex flex-col md:flex-row lg:flex-roww gap-2">
        <!-- Item 1 -->
        @if(!empty($teachers))
        @foreach($teachers as $key => $teacher)
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ $teacher->image_url }}" class="absolute block w-full md:h-[500px]" alt="$teacher->full_name }}">
        </div>
        @endforeach
        @endif
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        @if(!empty($teachers))
        @foreach($teachers as $key => $teacher)
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="{{ $teacher->id }}"></button>
        @endforeach
        @endif
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
    <div class="text-center pb-12">
        <h2 class="font-bold text-4xl py-2 text-center text-white">
            School Teachers
        </h2>
    </div>
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        @if(!empty($teachers))
        @foreach($teachers as $key => $teacher)
        <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
            <div class="mb-8">
                <img class="object-center object-cover rounded-full h-36 w-36" src="{{ $teacher->image_url }}" alt="{{ $teacher->full_name }}">
            </div>
            <div class="text-center">
                <p class="text-xl text-gray-700 font-bold mb-2">{{ $teacher->full_name }}</p>
                <p class="text-base text-gray-400 font-normal">{{ $teacher->role }}</p>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</section>


<div>
    <div
        class="mx-auto px-4 py-12 max-w-screen-xl bg-gradient-to-b from-red-50 to-red-100"
    >
        <h2
            class="text-4xl font-semibold tracking-wide text-center text-gray-800 sm:text-5xl"
        >
            The Balanced Chef
        </h2>
        <div
            class="grid grid-cols-1 xl:grid-cols-3 mt-16 space-y-16 xl:space-y-0 xl:space-x-10"
        >
            <div class="flex items-center space-x-6">
                <div class="w-16 h-16 p-3 rounded-full bg-black">
             <Icon name="ic:baseline-plus" 
                class="w-10 h-10 text-red-500"
             />
              
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">
                        Interactive Learning
                    </h3>
                    <p class="mt-2 text-gray-700">
                        Discover new recipes, cooking techniques, and culinary
                        tips through our interactive learning platform. Engage
                        with our community and enhance your culinary skills.
                    </p>
                </div>
            </div>
            <div class="flex items-center space-x-6">
                <div class="w-16 h-16 p-3 rounded-full bg-black">
                       <Icon name="fluent:people-community-16-filled" 
                class="w-10 h-10 text-red-500"
             />
                
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">
                        Community Support
                    </h3>
                    <p class="mt-2 text-gray-700">
                        Join our vibrant community of food enthusiasts, share
                        your recipes, and collaborate with fellow cooks. Get
                        inspired by others and receive valuable feedback on your
                        culinary creations.
                    </p>
                </div>
            </div>
            <div class="flex items-center space-x-6">
                <div class="w-16 h-16 p-3 rounded-full bg-black">
                          <Icon name="fluent:timer-16-filled"
                class="w-10 h-10 text-red-500"
                />

                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">
                        Time-Saving Solutions
                    </h3>
                    <p class="mt-2 text-gray-700">
                        We understand the value of your time. Explore our
                        collection of quick and easy recipes designed to fit
                        your busy schedule. Cook delicious meals in no time and
                        make every minute count.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div
  data-te-lightbox-init
  class="flex flex-col space-y-5 lg:flex-row lg:space-x-5 lg:space-y-0">
  <div class="h-full w-full">
    <img
      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/1.webp"
      data-te-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp"
      alt="Table Full of Spices"
      class="w-full cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" />
  </div>
  <div class="h-full w-full">
    <img
      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/2.webp"
      data-te-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/2.webp"
      alt="Winter Landscape"
      class="w-full cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" />
  </div>
  <div class="h-full w-full">
    <img
      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/3.webp"
      data-te-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/3.webp"
      alt="View of the City in the Mountains"
      class="w-full cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" />
  </div>
</div>




<div
  data-te-lightbox-init
  class="flex flex-col space-y-5 lg:flex-row lg:space-x-5 lg:space-y-0">
  <div class="h-full w-full">
    <img
      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/1.webp"
      data-te-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp"
      alt="Table Full of Spices"
      class="w-full cursor-zoom-in rounded shadow-sm data-[te-lightbox-disabled]:cursor-auto" />
  </div>
  <div class="h-full w-full">
    <img
      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/2.webp"
      data-te-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/2.webp"
      alt="Winter Landscape"
      class="w-full cursor-zoom-in rounded shadow-sm data-[te-lightbox-disabled]:cursor-auto" />
  </div>
  <div class="h-full w-full">
    <img
      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/3.webp"
      data-te-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/3.webp"
      alt="View of the City in the Mountains"
      class="w-full cursor-zoom-in rounded shadow-sm data-[te-lightbox-disabled]:cursor-auto" />
  </div>
</div>




<div
  data-te-lightbox-init
  data-te-zoom-level="0.25"
  class="flex flex-col space-y-5 lg:flex-row lg:space-x-5 lg:space-y-0">
  <div class="h-full w-full">
    <img
      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/1.webp"
      data-te-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp"
      alt="Table Full of Spices"
      class="w-full cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" />
  </div>
  <div class="h-full w-full">
    <img
      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/2.webp"
      data-te-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/2.webp"
      alt="Winter Landscape"
      class="w-full cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" />
  </div>
  <div class="h-full w-full">
    <img
      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/3.webp"
      data-te-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/3.webp"
      alt="View of the City in the Mountains"
      class="w-full cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" />
  </div>
</div>



<div
  data-te-lightbox-init
  data-te-zoom-level="0.25"
  class="flex flex-col space-y-5 lg:flex-row lg:space-x-5 lg:space-y-0">
  <div class="h-full w-full">
    <img
      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/1.webp"
      data-te-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp"
      alt="Table Full of Spices"
      class="w-full cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" />
  </div>
  <div class="h-full w-full">
    <img
      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/2.webp"
      data-te-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/2.webp"
      alt="Winter Landscape"
      class="w-full cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" />
  </div>
  <div class="h-full w-full">
    <img
      src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/3.webp"
      data-te-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/3.webp"
      alt="View of the City in the Mountains"
      class="w-full cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" />
  </div>
</div>



<button
  type="button"
  data-te-ripple-init
  data-te-ripple-color="light"
  class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
  Click me
</button>

<button
  type="button"
  class="inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
  Success
</button>
<button
  type="button"
  class="inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
  Danger
</button>
<button
  type="button"
  class="inline-block rounded bg-warning px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]">
  Warning
</button>
<button
  type="button"
  class="inline-block rounded bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]">
  Info
</button>

<button
  type="button"
  class="inline-block rounded bg-neutral-50 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-800 shadow-[0_4px_9px_-4px_#cbcbcb] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(203,203,203,0.3),0_4px_18px_0_rgba(203,203,203,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(203,203,203,0.3),0_4px_18px_0_rgba(203,203,203,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(203,203,203,0.3),0_4px_18px_0_rgba(203,203,203,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(251,251,251,0.3)] dark:hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.1),0_4px_18px_0_rgba(251,251,251,0.05)] dark:focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.1),0_4px_18px_0_rgba(251,251,251,0.05)] dark:active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.1),0_4px_18px_0_rgba(251,251,251,0.05)]">
  Light
</button>
<button
  type="button"
  class="inline-block rounded bg-neutral-800 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] transition duration-150 ease-in-out hover:bg-neutral-800 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-neutral-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:outline-none focus:ring-0 active:bg-neutral-900 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] dark:bg-neutral-900 dark:shadow-[0_4px_9px_-4px_#030202] dark:hover:bg-neutral-900 dark:hover:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:focus:bg-neutral-900 dark:focus:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:active:bg-neutral-900 dark:active:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)]">
  Dark
</button>

LIGHT BUTTONS
<button
  type="button"
  class="inline-block rounded border-2 border-primary px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
  data-te-ripple-init>
  Primary
</button>
<button
  type="button"
  class="inline-block rounded border-2 border-primary-100 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:border-primary-accent-100 hover:bg-neutral-500 hover:bg-opacity-10 focus:border-primary-accent-100 focus:outline-none focus:ring-0 active:border-primary-accent-200 dark:text-primary-100 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
  data-te-ripple-init>
  Secondary
</button>
<button
  type="button"
  class="inline-block rounded border-2 border-success px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-success transition duration-150 ease-in-out hover:border-success-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-success-600 focus:border-success-600 focus:text-success-600 focus:outline-none focus:ring-0 active:border-success-700 active:text-success-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
  data-te-ripple-init>
  Success
</button>
<button
  type="button"
  class="inline-block rounded border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
  data-te-ripple-init>
  Danger
</button>
<button
  type="button"
  class="inline-block rounded border-2 border-warning px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-warning transition duration-150 ease-in-out hover:border-warning-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-warning-600 focus:border-warning-600 focus:text-warning-600 focus:outline-none focus:ring-0 active:border-warning-700 active:text-warning-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
  data-te-ripple-init>
  Warning
</button>
<button
  type="button"
  class="inline-block rounded border-2 border-info px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-info transition duration-150 ease-in-out hover:border-info-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-info-600 focus:border-info-600 focus:text-info-600 focus:outline-none focus:ring-0 active:border-info-700 active:text-info-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
  data-te-ripple-init>
  Info
</button>
<button
  type="button"
  class="inline-block rounded border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
  data-te-ripple-init>
  Light
</button>
<button
  type="button"
  class="inline-block rounded border-2 border-neutral-800 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-800 transition duration-150 ease-in-out hover:border-neutral-800 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-800 focus:border-neutral-800 focus:text-neutral-800 focus:outline-none focus:ring-0 active:border-neutral-900 active:text-neutral-900 dark:border-neutral-900 dark:text-neutral-900 dark:hover:border-neutral-900 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10 dark:hover:text-neutral-900 dark:focus:border-neutral-900 dark:focus:text-neutral-900 dark:active:border-neutral-900 dark:active:text-neutral-900"
  data-te-ripple-init>
  Dark
</button>

ROUNDED BUTTONS
<button
  type="button"
  class="inline-block rounded-full bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
  Primary
</button>
<button
  type="button"
  class="inline-block rounded-full bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200">
  Secondary
</button>
<button
  type="button"
  class="inline-block rounded-full bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
  Success
</button>
<button
  type="button"
  class="inline-block rounded-full bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
  Danger
</button>
<button
  type="button"
  class="inline-block rounded-full bg-warning px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]">
  Warning
</button>
<button
  type="button"
  class="inline-block rounded-full bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]">
  Info
</button>
<button
  type="button"
  class="inline-block rounded-full bg-neutral-50 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-800 shadow-[0_4px_9px_-4px_#cbcbcb] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(203,203,203,0.3),0_4px_18px_0_rgba(203,203,203,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(203,203,203,0.3),0_4px_18px_0_rgba(203,203,203,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(203,203,203,0.3),0_4px_18px_0_rgba(203,203,203,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(251,251,251,0.3)] dark:hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.1),0_4px_18px_0_rgba(251,251,251,0.05)] dark:focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.1),0_4px_18px_0_rgba(251,251,251,0.05)] dark:active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.1),0_4px_18px_0_rgba(251,251,251,0.05)]">
  Light
</button>
<button
  type="button"
  class="inline-block rounded-full bg-neutral-800 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] transition duration-150 ease-in-out hover:bg-neutral-800 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-neutral-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:outline-none focus:ring-0 active:bg-neutral-900 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] dark:bg-neutral-900 dark:shadow-[0_4px_9px_-4px_#030202] dark:hover:bg-neutral-900 dark:hover:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:focus:bg-neutral-900 dark:focus:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:active:bg-neutral-900 dark:active:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)]">
  Dark
</button>

BUTTON WITH ICON
<!-- Required font awesome -->
<button
  type="button"
  data-te-ripple-init
  data-te-ripple-color="light"
  class="flex items-center rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
  <svg
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 24 24"
    fill="currentColor"
    class="mr-1 h-4 w-4">
    <path
      fill-rule="evenodd"
      d="M19.5 21a3 3 0 003-3V9a3 3 0 00-3-3h-5.379a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H4.5a3 3 0 00-3 3v12a3 3 0 003 3h15zm-6.75-10.5a.75.75 0 00-1.5 0v4.19l-1.72-1.72a.75.75 0 00-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 10-1.06-1.06l-1.72 1.72V10.5z"
      clip-rule="evenodd" />
  </svg>
  Button
</button>


CONTACT PAGE
<!-- ====== Contact Section Start -->
<section class="relative z-10 overflow-hidden bg-white py-20 lg:py-[120px]">
  <div class="container mx-auto">
    <div class="-mx-4 flex flex-wrap lg:justify-between">
      <div class="w-full px-4 lg:w-1/2 xl:w-6/12">
        <div class="mb-12 max-w-[570px] lg:mb-0">
          <span class="text-primary mb-4 block text-base font-semibold">
            Contact Us
          </span>
          <h2
            class="text-dark mb-6 text-[32px] font-bold uppercase sm:text-[40px] lg:text-[36px] xl:text-[40px]"
          >
            GET IN TOUCH WITH US
          </h2>
          <p class="text-body-color mb-9 text-base leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius
            tempor incididunt ut labore et dolore magna aliqua. Ut enim adiqua
            minim veniam quis nostrud exercitation ullamco
          </p>
          <div class="mb-8 flex w-full max-w-[370px]">
            <div
              class="bg-primary text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-opacity-5 sm:h-[70px] sm:max-w-[70px]"
            >
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                class="fill-current"
              >
                <path
                  d="M21.8182 24H16.5584C15.3896 24 14.4156 23.0256 14.4156 21.8563V17.5688C14.4156 17.1401 14.0649 16.7893 13.6364 16.7893H10.4026C9.97403 16.7893 9.62338 17.1401 9.62338 17.5688V21.8173C9.62338 22.9866 8.64935 23.961 7.48052 23.961H2.14286C0.974026 23.961 0 22.9866 0 21.8173V8.21437C0 7.62972 0.311688 7.08404 0.818182 6.77223L11.1039 0.263094C11.6494 -0.0876979 12.3896 -0.0876979 12.9351 0.263094L23.2208 6.77223C23.7273 7.08404 24 7.62972 24 8.21437V21.7783C24 23.0256 23.026 24 21.8182 24ZM10.3636 15.4251H13.5974C14.7662 15.4251 15.7403 16.3995 15.7403 17.5688V21.8173C15.7403 22.246 16.0909 22.5968 16.5195 22.5968H21.8182C22.2468 22.5968 22.5974 22.246 22.5974 21.8173V8.25335C22.5974 8.13642 22.5195 8.01949 22.4416 7.94153L12.1948 1.4324C12.0779 1.35445 11.9221 1.35445 11.8442 1.4324L1.55844 7.94153C1.44156 8.01949 1.4026 8.13642 1.4026 8.25335V21.8563C1.4026 22.285 1.75325 22.6358 2.18182 22.6358H7.48052C7.90909 22.6358 8.25974 22.285 8.25974 21.8563V17.5688C8.22078 16.3995 9.19481 15.4251 10.3636 15.4251Z"
                />
              </svg>
            </div>
            <div class="w-full">
              <h4 class="text-dark mb-1 text-xl font-bold">Our Location</h4>
              <p class="text-body-color text-base">
                99 S.t Jomblo Park Pekanbaru 28292. Indonesia
              </p>
            </div>
          </div>
          <div class="mb-8 flex w-full max-w-[370px]">
            <div
              class="bg-primary text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-opacity-5 sm:h-[70px] sm:max-w-[70px]"
            >
              <svg
                width="24"
                height="26"
                viewBox="0 0 24 26"
                class="fill-current"
              >
                <path
                  d="M22.6149 15.1386C22.5307 14.1704 21.7308 13.4968 20.7626 13.4968H2.82869C1.86042 13.4968 1.10265 14.2125 0.97636 15.1386L0.092295 23.9793C0.0501967 24.4845 0.21859 25.0317 0.555377 25.4106C0.892163 25.7895 1.39734 26 1.94462 26H21.6887C22.1939 26 22.6991 25.7895 23.078 25.4106C23.4148 25.0317 23.5832 24.5266 23.5411 23.9793L22.6149 15.1386ZM21.9413 24.4424C21.8992 24.4845 21.815 24.5687 21.6466 24.5687H1.94462C1.81833 24.5687 1.69203 24.4845 1.64993 24.4424C1.60783 24.4003 1.52364 24.3161 1.56574 24.1477L2.4498 15.2649C2.4498 15.0544 2.61819 14.9281 2.82869 14.9281H20.8047C21.0152 14.9281 21.1415 15.0544 21.1835 15.2649L22.0676 24.1477C22.0255 24.274 21.9834 24.4003 21.9413 24.4424Z"
                />
                <path
                  d="M11.7965 16.7805C10.1547 16.7805 8.84961 18.0855 8.84961 19.7273C8.84961 21.3692 10.1547 22.6742 11.7965 22.6742C13.4383 22.6742 14.7434 21.3692 14.7434 19.7273C14.7434 18.0855 13.4383 16.7805 11.7965 16.7805ZM11.7965 21.2008C10.9966 21.2008 10.3231 20.5272 10.3231 19.7273C10.3231 18.9275 10.9966 18.2539 11.7965 18.2539C12.5964 18.2539 13.2699 18.9275 13.2699 19.7273C13.2699 20.5272 12.5964 21.2008 11.7965 21.2008Z"
                />
                <path
                  d="M1.10265 7.85562C1.18684 9.70794 2.82868 10.4657 3.67064 10.4657H6.61752C6.65962 10.4657 6.65962 10.4657 6.65962 10.4657C7.92257 10.3815 9.18552 9.53955 9.18552 7.85562V6.84526C10.5748 6.84526 13.7742 6.84526 15.1635 6.84526V7.85562C15.1635 9.53955 16.4264 10.3815 17.6894 10.4657H17.7315H20.6363C21.4782 10.4657 23.1201 9.70794 23.2043 7.85562C23.2043 7.72932 23.2043 7.26624 23.2043 6.84526C23.2043 6.50847 23.2043 6.21378 23.2043 6.17169C23.2043 6.12959 23.2043 6.08749 23.2043 6.08749C23.078 4.90874 22.657 3.94047 21.9413 3.18271L21.8992 3.14061C20.8468 2.17235 19.5838 1.62507 18.6155 1.28828C15.795 0.193726 12.2587 0.193726 12.0903 0.193726C9.6065 0.235824 8.00677 0.446315 5.60716 1.28828C4.681 1.58297 3.41805 2.13025 2.36559 3.09851L2.3235 3.14061C1.60782 3.89838 1.18684 4.86664 1.06055 6.04539C1.06055 6.08749 1.06055 6.12959 1.06055 6.12959C1.06055 6.21378 1.06055 6.46637 1.06055 6.80316C1.10265 7.18204 1.10265 7.68722 1.10265 7.85562ZM3.37595 4.15097C4.21792 3.3932 5.27038 2.93012 6.15444 2.59333C8.34355 1.79346 9.7749 1.62507 12.1745 1.58297C12.3429 1.58297 15.6266 1.62507 18.1525 2.59333C19.0365 2.93012 20.089 3.3511 20.931 4.15097C21.394 4.65615 21.6887 5.32972 21.7729 6.12959C21.7729 6.25588 21.7729 6.46637 21.7729 6.80316C21.7729 7.22414 21.7729 7.68722 21.7729 7.81352C21.7308 8.78178 20.8047 8.99227 20.6784 8.99227H17.7736C17.3526 8.95017 16.679 8.78178 16.679 7.85562V6.12959C16.679 5.7928 16.4685 5.54021 16.1738 5.41392C15.9213 5.32972 8.55405 5.32972 8.30146 5.41392C8.00677 5.49811 7.79628 5.7928 7.79628 6.12959V7.85562C7.79628 8.78178 7.1227 8.95017 6.70172 8.99227H3.79694C3.67064 8.99227 2.74448 8.78178 2.70238 7.81352C2.70238 7.68722 2.70238 7.22414 2.70238 6.80316C2.70238 6.46637 2.70238 6.29798 2.70238 6.17169C2.61818 5.32972 2.91287 4.65615 3.37595 4.15097Z"
                />
              </svg>
            </div>
            <div class="w-full">
              <h4 class="text-dark mb-1 text-xl font-bold">Phone Number</h4>
              <p class="text-body-color text-base">(+62)81 414 257 9980</p>
            </div>
          </div>
          <div class="mb-8 flex w-full max-w-[370px]">
            <div
              class="bg-primary text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-opacity-5 sm:h-[70px] sm:max-w-[70px]"
            >
              <svg
                width="28"
                height="19"
                viewBox="0 0 28 19"
                class="fill-current"
              >
                <path
                  d="M25.3636 0H2.63636C1.18182 0 0 1.16785 0 2.6052V16.3948C0 17.8322 1.18182 19 2.63636 19H25.3636C26.8182 19 28 17.8322 28 16.3948V2.6052C28 1.16785 26.8182 0 25.3636 0ZM25.3636 1.5721C25.5909 1.5721 25.7727 1.61702 25.9545 1.75177L14.6364 8.53428C14.2273 8.75886 13.7727 8.75886 13.3636 8.53428L2.04545 1.75177C2.22727 1.66194 2.40909 1.5721 2.63636 1.5721H25.3636ZM25.3636 17.383H2.63636C2.09091 17.383 1.59091 16.9338 1.59091 16.3499V3.32388L12.5 9.8818C12.9545 10.1513 13.4545 10.2861 13.9545 10.2861C14.4545 10.2861 14.9545 10.1513 15.4091 9.8818L26.3182 3.32388V16.3499C26.4091 16.9338 25.9091 17.383 25.3636 17.383Z"
                />
              </svg>
            </div>
            <div class="w-full">
              <h4 class="text-dark mb-1 text-xl font-bold">Email Address</h4>
              <p class="text-body-color text-base">info@yourdomain.com</p>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full px-4 lg:w-1/2 xl:w-5/12">
        <div class="relative rounded-lg bg-white p-8 shadow-lg sm:p-12">
          <form>
            <div class="mb-6">
              <input
                type="text"
                placeholder="Your Name"
                class="text-body-color border-[f0f0f0] focus:border-primary w-full rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"
              />
            </div>
            <div class="mb-6">
              <input
                type="email"
                placeholder="Your Email"
                class="text-body-color border-[f0f0f0] focus:border-primary w-full rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"
              />
            </div>
            <div class="mb-6">
              <input
                type="text"
                placeholder="Your Phone"
                class="text-body-color border-[f0f0f0] focus:border-primary w-full rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"
              />
            </div>
            <div class="mb-6">
              <textarea
                rows="6"
                placeholder="Your Message"
                class="text-body-color border-[f0f0f0] focus:border-primary w-full resize-none rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"
              ></textarea>
            </div>
            <div>
              <button
                type="submit"
                class="bg-primary border-primary w-full rounded border p-3 text-white transition hover:bg-opacity-90"
              >
                Send Message
              </button>
            </div>
          </form>
          <div>
            <span class="absolute -top-10 -right-9 z-[-1]">
              <svg
                width="100"
                height="100"
                viewBox="0 0 100 100"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M0 100C0 44.7715 0 0 0 0C55.2285 0 100 44.7715 100 100C100 100 100 100 0 100Z"
                  fill="#3056D3"
                />
              </svg>
            </span>
            <span class="absolute -right-10 top-[90px] z-[-1]">
              <svg
                width="34"
                height="134"
                viewBox="0 0 34 134"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <circle
                  cx="31.9993"
                  cy="132"
                  r="1.66667"
                  transform="rotate(180 31.9993 132)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="117.333"
                  r="1.66667"
                  transform="rotate(180 31.9993 117.333)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="102.667"
                  r="1.66667"
                  transform="rotate(180 31.9993 102.667)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="88"
                  r="1.66667"
                  transform="rotate(180 31.9993 88)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="73.3333"
                  r="1.66667"
                  transform="rotate(180 31.9993 73.3333)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="45"
                  r="1.66667"
                  transform="rotate(180 31.9993 45)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="16"
                  r="1.66667"
                  transform="rotate(180 31.9993 16)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="59"
                  r="1.66667"
                  transform="rotate(180 31.9993 59)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="30.6666"
                  r="1.66667"
                  transform="rotate(180 31.9993 30.6666)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="1.66665"
                  r="1.66667"
                  transform="rotate(180 31.9993 1.66665)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="132"
                  r="1.66667"
                  transform="rotate(180 17.3333 132)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="117.333"
                  r="1.66667"
                  transform="rotate(180 17.3333 117.333)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="102.667"
                  r="1.66667"
                  transform="rotate(180 17.3333 102.667)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="88"
                  r="1.66667"
                  transform="rotate(180 17.3333 88)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="73.3333"
                  r="1.66667"
                  transform="rotate(180 17.3333 73.3333)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="45"
                  r="1.66667"
                  transform="rotate(180 17.3333 45)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="16"
                  r="1.66667"
                  transform="rotate(180 17.3333 16)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="59"
                  r="1.66667"
                  transform="rotate(180 17.3333 59)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="30.6666"
                  r="1.66667"
                  transform="rotate(180 17.3333 30.6666)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="1.66665"
                  r="1.66667"
                  transform="rotate(180 17.3333 1.66665)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="132"
                  r="1.66667"
                  transform="rotate(180 2.66536 132)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="117.333"
                  r="1.66667"
                  transform="rotate(180 2.66536 117.333)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="102.667"
                  r="1.66667"
                  transform="rotate(180 2.66536 102.667)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="88"
                  r="1.66667"
                  transform="rotate(180 2.66536 88)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="73.3333"
                  r="1.66667"
                  transform="rotate(180 2.66536 73.3333)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="45"
                  r="1.66667"
                  transform="rotate(180 2.66536 45)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="16"
                  r="1.66667"
                  transform="rotate(180 2.66536 16)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="59"
                  r="1.66667"
                  transform="rotate(180 2.66536 59)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="30.6666"
                  r="1.66667"
                  transform="rotate(180 2.66536 30.6666)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="1.66665"
                  r="1.66667"
                  transform="rotate(180 2.66536 1.66665)"
                  fill="#13C296"
                />
              </svg>
            </span>
            <span class="absolute -left-7 -bottom-7 z-[-1]">
              <svg
                width="107"
                height="134"
                viewBox="0 0 107 134"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <circle
                  cx="104.999"
                  cy="132"
                  r="1.66667"
                  transform="rotate(180 104.999 132)"
                  fill="#13C296"
                />
                <circle
                  cx="104.999"
                  cy="117.333"
                  r="1.66667"
                  transform="rotate(180 104.999 117.333)"
                  fill="#13C296"
                />
                <circle
                  cx="104.999"
                  cy="102.667"
                  r="1.66667"
                  transform="rotate(180 104.999 102.667)"
                  fill="#13C296"
                />
                <circle
                  cx="104.999"
                  cy="88"
                  r="1.66667"
                  transform="rotate(180 104.999 88)"
                  fill="#13C296"
                />
                <circle
                  cx="104.999"
                  cy="73.3333"
                  r="1.66667"
                  transform="rotate(180 104.999 73.3333)"
                  fill="#13C296"
                />
                <circle
                  cx="104.999"
                  cy="45"
                  r="1.66667"
                  transform="rotate(180 104.999 45)"
                  fill="#13C296"
                />
                <circle
                  cx="104.999"
                  cy="16"
                  r="1.66667"
                  transform="rotate(180 104.999 16)"
                  fill="#13C296"
                />
                <circle
                  cx="104.999"
                  cy="59"
                  r="1.66667"
                  transform="rotate(180 104.999 59)"
                  fill="#13C296"
                />
                <circle
                  cx="104.999"
                  cy="30.6666"
                  r="1.66667"
                  transform="rotate(180 104.999 30.6666)"
                  fill="#13C296"
                />
                <circle
                  cx="104.999"
                  cy="1.66665"
                  r="1.66667"
                  transform="rotate(180 104.999 1.66665)"
                  fill="#13C296"
                />
                <circle
                  cx="90.3333"
                  cy="132"
                  r="1.66667"
                  transform="rotate(180 90.3333 132)"
                  fill="#13C296"
                />
                <circle
                  cx="90.3333"
                  cy="117.333"
                  r="1.66667"
                  transform="rotate(180 90.3333 117.333)"
                  fill="#13C296"
                />
                <circle
                  cx="90.3333"
                  cy="102.667"
                  r="1.66667"
                  transform="rotate(180 90.3333 102.667)"
                  fill="#13C296"
                />
                <circle
                  cx="90.3333"
                  cy="88"
                  r="1.66667"
                  transform="rotate(180 90.3333 88)"
                  fill="#13C296"
                />
                <circle
                  cx="90.3333"
                  cy="73.3333"
                  r="1.66667"
                  transform="rotate(180 90.3333 73.3333)"
                  fill="#13C296"
                />
                <circle
                  cx="90.3333"
                  cy="45"
                  r="1.66667"
                  transform="rotate(180 90.3333 45)"
                  fill="#13C296"
                />
                <circle
                  cx="90.3333"
                  cy="16"
                  r="1.66667"
                  transform="rotate(180 90.3333 16)"
                  fill="#13C296"
                />
                <circle
                  cx="90.3333"
                  cy="59"
                  r="1.66667"
                  transform="rotate(180 90.3333 59)"
                  fill="#13C296"
                />
                <circle
                  cx="90.3333"
                  cy="30.6666"
                  r="1.66667"
                  transform="rotate(180 90.3333 30.6666)"
                  fill="#13C296"
                />
                <circle
                  cx="90.3333"
                  cy="1.66665"
                  r="1.66667"
                  transform="rotate(180 90.3333 1.66665)"
                  fill="#13C296"
                />
                <circle
                  cx="75.6654"
                  cy="132"
                  r="1.66667"
                  transform="rotate(180 75.6654 132)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="132"
                  r="1.66667"
                  transform="rotate(180 31.9993 132)"
                  fill="#13C296"
                />
                <circle
                  cx="75.6654"
                  cy="117.333"
                  r="1.66667"
                  transform="rotate(180 75.6654 117.333)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="117.333"
                  r="1.66667"
                  transform="rotate(180 31.9993 117.333)"
                  fill="#13C296"
                />
                <circle
                  cx="75.6654"
                  cy="102.667"
                  r="1.66667"
                  transform="rotate(180 75.6654 102.667)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="102.667"
                  r="1.66667"
                  transform="rotate(180 31.9993 102.667)"
                  fill="#13C296"
                />
                <circle
                  cx="75.6654"
                  cy="88"
                  r="1.66667"
                  transform="rotate(180 75.6654 88)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="88"
                  r="1.66667"
                  transform="rotate(180 31.9993 88)"
                  fill="#13C296"
                />
                <circle
                  cx="75.6654"
                  cy="73.3333"
                  r="1.66667"
                  transform="rotate(180 75.6654 73.3333)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="73.3333"
                  r="1.66667"
                  transform="rotate(180 31.9993 73.3333)"
                  fill="#13C296"
                />
                <circle
                  cx="75.6654"
                  cy="45"
                  r="1.66667"
                  transform="rotate(180 75.6654 45)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="45"
                  r="1.66667"
                  transform="rotate(180 31.9993 45)"
                  fill="#13C296"
                />
                <circle
                  cx="75.6654"
                  cy="16"
                  r="1.66667"
                  transform="rotate(180 75.6654 16)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="16"
                  r="1.66667"
                  transform="rotate(180 31.9993 16)"
                  fill="#13C296"
                />
                <circle
                  cx="75.6654"
                  cy="59"
                  r="1.66667"
                  transform="rotate(180 75.6654 59)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="59"
                  r="1.66667"
                  transform="rotate(180 31.9993 59)"
                  fill="#13C296"
                />
                <circle
                  cx="75.6654"
                  cy="30.6666"
                  r="1.66667"
                  transform="rotate(180 75.6654 30.6666)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="30.6666"
                  r="1.66667"
                  transform="rotate(180 31.9993 30.6666)"
                  fill="#13C296"
                />
                <circle
                  cx="75.6654"
                  cy="1.66665"
                  r="1.66667"
                  transform="rotate(180 75.6654 1.66665)"
                  fill="#13C296"
                />
                <circle
                  cx="31.9993"
                  cy="1.66665"
                  r="1.66667"
                  transform="rotate(180 31.9993 1.66665)"
                  fill="#13C296"
                />
                <circle
                  cx="60.9993"
                  cy="132"
                  r="1.66667"
                  transform="rotate(180 60.9993 132)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="132"
                  r="1.66667"
                  transform="rotate(180 17.3333 132)"
                  fill="#13C296"
                />
                <circle
                  cx="60.9993"
                  cy="117.333"
                  r="1.66667"
                  transform="rotate(180 60.9993 117.333)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="117.333"
                  r="1.66667"
                  transform="rotate(180 17.3333 117.333)"
                  fill="#13C296"
                />
                <circle
                  cx="60.9993"
                  cy="102.667"
                  r="1.66667"
                  transform="rotate(180 60.9993 102.667)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="102.667"
                  r="1.66667"
                  transform="rotate(180 17.3333 102.667)"
                  fill="#13C296"
                />
                <circle
                  cx="60.9993"
                  cy="88"
                  r="1.66667"
                  transform="rotate(180 60.9993 88)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="88"
                  r="1.66667"
                  transform="rotate(180 17.3333 88)"
                  fill="#13C296"
                />
                <circle
                  cx="60.9993"
                  cy="73.3333"
                  r="1.66667"
                  transform="rotate(180 60.9993 73.3333)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="73.3333"
                  r="1.66667"
                  transform="rotate(180 17.3333 73.3333)"
                  fill="#13C296"
                />
                <circle
                  cx="60.9993"
                  cy="45"
                  r="1.66667"
                  transform="rotate(180 60.9993 45)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="45"
                  r="1.66667"
                  transform="rotate(180 17.3333 45)"
                  fill="#13C296"
                />
                <circle
                  cx="60.9993"
                  cy="16"
                  r="1.66667"
                  transform="rotate(180 60.9993 16)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="16"
                  r="1.66667"
                  transform="rotate(180 17.3333 16)"
                  fill="#13C296"
                />
                <circle
                  cx="60.9993"
                  cy="59"
                  r="1.66667"
                  transform="rotate(180 60.9993 59)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="59"
                  r="1.66667"
                  transform="rotate(180 17.3333 59)"
                  fill="#13C296"
                />
                <circle
                  cx="60.9993"
                  cy="30.6666"
                  r="1.66667"
                  transform="rotate(180 60.9993 30.6666)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="30.6666"
                  r="1.66667"
                  transform="rotate(180 17.3333 30.6666)"
                  fill="#13C296"
                />
                <circle
                  cx="60.9993"
                  cy="1.66665"
                  r="1.66667"
                  transform="rotate(180 60.9993 1.66665)"
                  fill="#13C296"
                />
                <circle
                  cx="17.3333"
                  cy="1.66665"
                  r="1.66667"
                  transform="rotate(180 17.3333 1.66665)"
                  fill="#13C296"
                />
                <circle
                  cx="46.3333"
                  cy="132"
                  r="1.66667"
                  transform="rotate(180 46.3333 132)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="132"
                  r="1.66667"
                  transform="rotate(180 2.66536 132)"
                  fill="#13C296"
                />
                <circle
                  cx="46.3333"
                  cy="117.333"
                  r="1.66667"
                  transform="rotate(180 46.3333 117.333)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="117.333"
                  r="1.66667"
                  transform="rotate(180 2.66536 117.333)"
                  fill="#13C296"
                />
                <circle
                  cx="46.3333"
                  cy="102.667"
                  r="1.66667"
                  transform="rotate(180 46.3333 102.667)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="102.667"
                  r="1.66667"
                  transform="rotate(180 2.66536 102.667)"
                  fill="#13C296"
                />
                <circle
                  cx="46.3333"
                  cy="88"
                  r="1.66667"
                  transform="rotate(180 46.3333 88)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="88"
                  r="1.66667"
                  transform="rotate(180 2.66536 88)"
                  fill="#13C296"
                />
                <circle
                  cx="46.3333"
                  cy="73.3333"
                  r="1.66667"
                  transform="rotate(180 46.3333 73.3333)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="73.3333"
                  r="1.66667"
                  transform="rotate(180 2.66536 73.3333)"
                  fill="#13C296"
                />
                <circle
                  cx="46.3333"
                  cy="45"
                  r="1.66667"
                  transform="rotate(180 46.3333 45)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="45"
                  r="1.66667"
                  transform="rotate(180 2.66536 45)"
                  fill="#13C296"
                />
                <circle
                  cx="46.3333"
                  cy="16"
                  r="1.66667"
                  transform="rotate(180 46.3333 16)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="16"
                  r="1.66667"
                  transform="rotate(180 2.66536 16)"
                  fill="#13C296"
                />
                <circle
                  cx="46.3333"
                  cy="59"
                  r="1.66667"
                  transform="rotate(180 46.3333 59)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="59"
                  r="1.66667"
                  transform="rotate(180 2.66536 59)"
                  fill="#13C296"
                />
                <circle
                  cx="46.3333"
                  cy="30.6666"
                  r="1.66667"
                  transform="rotate(180 46.3333 30.6666)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="30.6666"
                  r="1.66667"
                  transform="rotate(180 2.66536 30.6666)"
                  fill="#13C296"
                />
                <circle
                  cx="46.3333"
                  cy="1.66665"
                  r="1.66667"
                  transform="rotate(180 46.3333 1.66665)"
                  fill="#13C296"
                />
                <circle
                  cx="2.66536"
                  cy="1.66665"
                  r="1.66667"
                  transform="rotate(180 2.66536 1.66665)"
                  fill="#13C296"
                />
              </svg>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Contact Section End -->


TAILGRID CARD
<!-- ====== Cards Section Start -->
<section class="bg-[#F3F4F6] pt-20 pb-10 lg:pt-[120px] lg:pb-20">
  <div class="container mx-auto">
    <div class="-mx-4 flex flex-wrap">
      <div class="w-full px-4 md:w-1/2 xl:w-1/3">
        <div class="mb-10 overflow-hidden rounded-lg bg-white">
          <img
            src="https://cdn.tailgrids.com/2.0/image/application/images/cards/card-01/image-01.jpg"
            alt="image"
            class="w-full"
          />
          <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
            <h3>
              <a
                href="javascript:void(0)"
                class="text-dark hover:text-primary mb-4 block text-xl font-semibold sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]"
              >
                50+ Best creative website themes & templates
              </a>
            </h3>
            <p class="text-body-color mb-7 text-base leading-relaxed">
              Lorem ipsum dolor sit amet pretium consectetur adipiscing elit.
              Lorem consectetur adipiscing elit.
            </p>
            <a
              href="javascript:void(0)"
              class="text-body-color hover:border-primary hover:bg-primary inline-block rounded-full border border-[#E5E7EB] py-2 px-7 text-base font-medium transition hover:text-white"
            >
              View Details
            </a>
          </div>
        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 xl:w-1/3">
        <div class="mb-10 overflow-hidden rounded-lg bg-white">
          <img
            src="https://cdn.tailgrids.com/2.0/image/application/images/cards/card-01/image-02.jpg"
            alt="image"
            class="w-full"
          />
          <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
            <h3>
              <a
                href="javascript:void(0)"
                class="text-dark hover:text-primary mb-4 block text-xl font-semibold sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]"
              >
                The ultimate UX and UI guide to card design
              </a>
            </h3>
            <p class="text-body-color mb-7 text-base leading-relaxed">
              Lorem ipsum dolor sit amet pretium consectetur adipiscing elit.
              Lorem consectetur adipiscing elit.
            </p>
            <a
              href="javascript:void(0)"
              class="text-body-color hover:border-primary hover:bg-primary inline-block rounded-full border border-[#E5E7EB] py-2 px-7 text-base font-medium transition hover:text-white"
            >
              View Details
            </a>
          </div>
        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 xl:w-1/3">
        <div class="mb-10 overflow-hidden rounded-lg bg-white">
          <img
            src="https://cdn.tailgrids.com/2.0/image/application/images/cards/card-01/image-03.jpg"
            alt="image"
            class="w-full"
          />
          <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
            <h3>
              <a
                href="javascript:void(0)"
                class="text-dark hover:text-primary mb-4 block text-xl font-semibold sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]"
              >
                Creative Card Component designs graphic elements
              </a>
            </h3>
            <p class="text-body-color mb-7 text-base leading-relaxed">
              Lorem ipsum dolor sit amet pretium consectetur adipiscing elit.
              Lorem consectetur adipiscing elit.
            </p>
            <a
              href="javascript:void(0)"
              class="text-body-color hover:border-primary hover:bg-primary inline-block rounded-full border border-[#E5E7EB] py-2 px-7 text-base font-medium transition hover:text-white"
            >
              View Details
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Cards Section End -->

TAILGRID blog
<!-- ====== Blog Section Start -->
<section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
  <div class="container mx-auto">
    <div class="-mx-4 flex flex-wrap justify-center">
      <div class="w-full px-4">
        <div class="mx-auto mb-[60px] max-w-[510px] text-center lg:mb-20">
          <span class="text-primary mb-2 block text-lg font-semibold">
            Our Blogs
          </span>
          <h2
            class="text-dark mb-4 text-3xl font-bold sm:text-4xl md:text-[40px]"
          >
            Our Recent News
          </h2>
          <p class="text-body-color text-base">
            There are many variations of passages of Lorem Ipsum available but
            the majority have suffered alteration in some form.
          </p>
        </div>
      </div>
    </div>
    <div class="-mx-4 flex flex-wrap">
      <div class="w-full px-4 md:w-1/2 lg:w-1/3">
        <div class="mx-auto mb-10 max-w-[370px]">
          <div class="mb-8 overflow-hidden rounded">
            <img
              src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-01.jpg"
              alt="image"
              class="w-full"
            />
          </div>
          <div>
            <span
              class="bg-primary mb-5 inline-block rounded py-1 px-4 text-center text-xs font-semibold leading-loose text-white"
            >
              Dec 22, 2023
            </span>
            <h3>
              <a
                href="javascript:void(0)"
                class="text-dark hover:text-primary mb-4 inline-block text-xl font-semibold sm:text-2xl lg:text-xl xl:text-2xl"
              >
                Meet AutoManage, the best AI management tools
              </a>
            </h3>
            <p class="text-body-color text-base">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
            </p>
          </div>
        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 lg:w-1/3">
        <div class="mx-auto mb-10 max-w-[370px]">
          <div class="mb-8 overflow-hidden rounded">
            <img
              src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-02.jpg"
              alt="image"
              class="w-full"
            />
          </div>
          <div>
            <span
              class="bg-primary mb-5 inline-block rounded py-1 px-4 text-center text-xs font-semibold leading-loose text-white"
            >
              Mar 15, 2023
            </span>
            <h3>
              <a
                href="javascript:void(0)"
                class="text-dark hover:text-primary mb-4 inline-block text-xl font-semibold sm:text-2xl lg:text-xl xl:text-2xl"
              >
                How to earn more money as a wellness coach
              </a>
            </h3>
            <p class="text-body-color text-base">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
            </p>
          </div>
        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 lg:w-1/3">
        <div class="mx-auto mb-10 max-w-[370px]">
          <div class="mb-8 overflow-hidden rounded">
            <img
              src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-03.jpg"
              alt="image"
              class="w-full"
            />
          </div>
          <div>
            <span
              class="bg-primary mb-5 inline-block rounded py-1 px-4 text-center text-xs font-semibold leading-loose text-white"
            >
              Jan 05, 2023
            </span>
            <h3>
              <a
                href="javascript:void(0)"
                class="text-dark hover:text-primary mb-4 inline-block text-xl font-semibold sm:text-2xl lg:text-xl xl:text-2xl"
              >
                The no-fuss guide to upselling and cross selling
              </a>
            </h3>
            <p class="text-body-color text-base">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Blog Section End -->

TAILGRIG VIDEO
    <!-- ====== Video Section Start -->
    <section
      x-data="{ videoOpen: false, videoSrc: '' }"
      class="relative z-10 overflow-hidden bg-primary"
    >
      <div class="container mx-auto">
        <div class="-mx-4 flex flex-wrap">
          <div class="w-full px-4 lg:w-1/2">
            <div class="max-w-[490px] py-[100px] lg:py-[140px]">
              <span class="mb-3 block text-base font-semibold text-white">
                Watch Our Intro Video
              </span>
              <h2
                class="mb-6 text-3xl font-bold text-white sm:text-4xl md:text-[40px]"
              >
                Innovative solutions to boost your projects
              </h2>
              <p class="mb-9 text-base leading-relaxed text-white">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin
                at quam fringilla, scelerisque nisl in, accumsan diam. Quisque
                sollicitudin risus eu tortor euismod imperdiet.
              </p>
              <a
                href="javascript:void(0)"
                class="inline-block rounded-full border border-white py-3 px-9 text-base font-medium text-white hover:bg-white hover:text-primary"
              >
                Know More
              </a>
            </div>
          </div>
        </div>
      </div>

      <div>
        <div class="top-0 right-0 z-10 h-full w-full lg:absolute lg:w-1/2">
          <div class="flex h-full w-full items-center justify-center">
            <img
              src="https://cdn.tailgrids.com/2.0/image/marketing/images/videos/image-02.jpg"
              alt="image"
              class="top-0 left-0 z-[-1] h-full w-full object-cover object-center lg:absolute"
            />
            <a
              href="javascript:void(0)"
              @click="videoOpen = true; videoSrc='https://www.youtube.com/embed/LXb3EKWsInQ?autoplay=1' "
              class="absolute z-40 flex h-20 w-20 items-center justify-center rounded-full bg-primary md:h-[100px] md:w-[100px]"
            >
              <span
                class="absolute top-0 right-0 z-[-1] h-full w-full animate-ping rounded-full bg-primary bg-opacity-20 delay-300 duration-1000"
              ></span>
              <svg
                width="23"
                height="27"
                viewBox="0 0 23 27"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M22.5 12.634C23.1667 13.0189 23.1667 13.9811 22.5 14.366L2.25 26.0574C1.58333 26.4423 0.750001 25.9611 0.750001 25.1913L0.750002 1.80866C0.750002 1.03886 1.58334 0.557731 2.25 0.942631L22.5 12.634Z"
                  fill="white"
                />
              </svg>
            </a>
          </div>
        </div>

        <span class="absolute left-0 top-0 z-[-1]">
          <svg
            width="644"
            height="489"
            viewBox="0 0 644 489"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <circle cx="196" cy="41" r="448" fill="white" fill-opacity="0.04" />
          </svg>
        </span>
        <span class="absolute left-0 top-0 z-[-1]">
          <svg
            width="659"
            height="562"
            viewBox="0 0 659 562"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <circle
              cx="211"
              cy="114"
              r="448"
              fill="white"
              fill-opacity="0.04"
            />
          </svg>
        </span>
        <span class="absolute right-3 top-3 z-[-1] lg:right-1/2 lg:mr-3">
          <svg
            width="50"
            height="79"
            viewBox="0 0 50 79"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <circle
              cx="47.7119"
              cy="76.9617"
              r="1.74121"
              transform="rotate(180 47.7119 76.9617)"
              fill="white"
            />
            <circle
              cx="47.7119"
              cy="61.6385"
              r="1.74121"
              transform="rotate(180 47.7119 61.6385)"
              fill="white"
            />
            <circle
              cx="47.7119"
              cy="46.3163"
              r="1.74121"
              transform="rotate(180 47.7119 46.3163)"
              fill="white"
            />
            <circle
              cx="47.7119"
              cy="16.7159"
              r="1.74121"
              transform="rotate(180 47.7119 16.7159)"
              fill="white"
            />
            <circle
              cx="47.7119"
              cy="31.3421"
              r="1.74121"
              transform="rotate(180 47.7119 31.3421)"
              fill="white"
            />
            <circle
              cx="47.7119"
              cy="1.74122"
              r="1.74121"
              transform="rotate(180 47.7119 1.74122)"
              fill="white"
            />
            <circle
              cx="32.3916"
              cy="76.9617"
              r="1.74121"
              transform="rotate(180 32.3916 76.9617)"
              fill="white"
            />
            <circle
              cx="32.3877"
              cy="61.6384"
              r="1.74121"
              transform="rotate(180 32.3877 61.6384)"
              fill="white"
            />
            <circle
              cx="32.3916"
              cy="46.3162"
              r="1.74121"
              transform="rotate(180 32.3916 46.3162)"
              fill="white"
            />
            <circle
              cx="32.3916"
              cy="16.7161"
              r="1.74121"
              transform="rotate(180 32.3916 16.7161)"
              fill="white"
            />
            <circle
              cx="32.3877"
              cy="31.342"
              r="1.74121"
              transform="rotate(180 32.3877 31.342)"
              fill="white"
            />
            <circle
              cx="32.3916"
              cy="1.74145"
              r="1.74121"
              transform="rotate(180 32.3916 1.74145)"
              fill="white"
            />
            <circle
              cx="17.0674"
              cy="76.9617"
              r="1.74121"
              transform="rotate(180 17.0674 76.9617)"
              fill="white"
            />
            <circle
              cx="17.0674"
              cy="61.6384"
              r="1.74121"
              transform="rotate(180 17.0674 61.6384)"
              fill="white"
            />
            <circle
              cx="17.0674"
              cy="46.3162"
              r="1.74121"
              transform="rotate(180 17.0674 46.3162)"
              fill="white"
            />
            <circle
              cx="17.0674"
              cy="16.7161"
              r="1.74121"
              transform="rotate(180 17.0674 16.7161)"
              fill="white"
            />
            <circle
              cx="17.0674"
              cy="31.342"
              r="1.74121"
              transform="rotate(180 17.0674 31.342)"
              fill="white"
            />
            <circle
              cx="17.0674"
              cy="1.74145"
              r="1.74121"
              transform="rotate(180 17.0674 1.74145)"
              fill="white"
            />
            <circle
              cx="1.74316"
              cy="76.9617"
              r="1.74121"
              transform="rotate(180 1.74316 76.9617)"
              fill="white"
            />
            <circle
              cx="1.74316"
              cy="61.6384"
              r="1.74121"
              transform="rotate(180 1.74316 61.6384)"
              fill="white"
            />
            <circle
              cx="1.74316"
              cy="46.3162"
              r="1.74121"
              transform="rotate(180 1.74316 46.3162)"
              fill="white"
            />
            <circle
              cx="1.74316"
              cy="16.7161"
              r="1.74121"
              transform="rotate(180 1.74316 16.7161)"
              fill="white"
            />
            <circle
              cx="1.74316"
              cy="31.342"
              r="1.74121"
              transform="rotate(180 1.74316 31.342)"
              fill="white"
            />
            <circle
              cx="1.74316"
              cy="1.74145"
              r="1.74121"
              transform="rotate(180 1.74316 1.74145)"
              fill="white"
            />
          </svg>
        </span>
      </div>

      <div
        x-show="videoOpen"
        x-transition
        class="fixed top-0 left-0 z-50 flex h-screen w-full items-center justify-center bg-black bg-opacity-70"
      >
        <div
          @click.outside="videoOpen = false; videoSrc = '' "
          class="mx-auto w-full max-w-[550px] bg-white"
        >
          <iframe class="h-[320px] w-full" x-bind:src="videoSrc"> </iframe>
        </div>

        <button
          @click="videoOpen = false; videoSrc = '' "
          class="absolute top-0 right-0 flex h-20 w-20 cursor-pointer items-center justify-center text-body-color hover:bg-black"
        >
          <svg viewBox="0 0 16 15" class="h-8 w-8 fill-current">
            <path
              d="M3.37258 1.27L8.23258 6.13L13.0726 1.29C13.1574 1.19972 13.2596 1.12749 13.373 1.07766C13.4864 1.02783 13.6087 1.00141 13.7326 1C13.9978 1 14.2522 1.10536 14.4397 1.29289C14.6272 1.48043 14.7326 1.73478 14.7326 2C14.7349 2.1226 14.7122 2.24439 14.6657 2.35788C14.6193 2.47138 14.5502 2.57419 14.4626 2.66L9.57258 7.5L14.4626 12.39C14.6274 12.5512 14.724 12.7696 14.7326 13C14.7326 13.2652 14.6272 13.5196 14.4397 13.7071C14.2522 13.8946 13.9978 14 13.7326 14C13.6051 14.0053 13.478 13.984 13.3592 13.9375C13.2404 13.8911 13.1326 13.8204 13.0426 13.73L8.23258 8.87L3.38258 13.72C3.29809 13.8073 3.19715 13.8769 3.08559 13.925C2.97402 13.9731 2.85405 13.9986 2.73258 14C2.46737 14 2.21301 13.8946 2.02548 13.7071C1.83794 13.5196 1.73258 13.2652 1.73258 13C1.73025 12.8774 1.753 12.7556 1.79943 12.6421C1.84586 12.5286 1.91499 12.4258 2.00258 12.34L6.89258 7.5L2.00258 2.61C1.83777 2.44876 1.74112 2.23041 1.73258 2C1.73258 1.73478 1.83794 1.48043 2.02548 1.29289C2.21301 1.10536 2.46737 1 2.73258 1C2.97258 1.003 3.20258 1.1 3.37258 1.27Z"
            />
          </svg>
        </button>
      </div>
    </section>
    <!-- ====== Video Section End -->

    TAILGRID TEAM
    <!-- ====== Team Section Start -->
<section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
  <div class="container mx-auto">
    <div class="-mx-4 flex flex-wrap">
      <div class="w-full px-4">
        <div class="mx-auto mb-[60px] max-w-[510px] text-center">
          <span class="text-primary mb-2 block text-lg font-semibold">
            Our Team
          </span>
          <h2
            class="text-dark mb-4 text-3xl font-bold sm:text-4xl md:text-[40px]"
          >
            Our Awesome Team
          </h2>
          <p class="text-body-color text-base">
            There are many variations of passages of Lorem Ipsum available but
            the majority have suffered alteration in some form.
          </p>
        </div>
      </div>
    </div>
    <div class="-mx-4 flex flex-wrap justify-center">
      <div class="w-full px-4 md:w-1/2 xl:w-1/4">
        <div class="mx-auto mb-10 w-full max-w-[370px]">
          <div class="relative overflow-hidden rounded-lg">
            <img
              src="https://cdn.tailgrids.com/1.0/assets/images/team/team-01/image-01.jpg"
              alt="image"
              class="w-full"
            />
            <div class="absolute bottom-5 left-0 w-full text-center">
              <div
                class="relative mx-5 overflow-hidden rounded-lg bg-white py-5 px-3"
              >
                <h3 class="text-dark text-base font-semibold">Coriss Ambady</h3>
                <p class="text-body-color text-sm">Web Developer</p>
                <div>
                  <span class="absolute left-0 bottom-0">
                    <svg
                      width="61"
                      height="30"
                      viewBox="0 0 61 30"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        cx="16"
                        cy="45"
                        r="45"
                        fill="#13C296"
                        fill-opacity="0.11"
                      />
                    </svg>
                  </span>
                  <span class="absolute top-0 right-0">
                    <svg
                      width="20"
                      height="25"
                      viewBox="0 0 20 25"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        cx="0.706257"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 0.706257 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 6.39669 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 12.0881 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 17.7785 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 0.706257 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 6.39669 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 12.0881 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 17.7785 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 0.706257 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 6.39669 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 12.0881 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 17.7785 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 0.706257 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 6.39669 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 12.0881 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 17.7785 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 0.706257 1.58989)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 6.39669 1.58989)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 12.0881 1.58989)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 17.7785 1.58989)"
                        fill="#3056D3"
                      />
                    </svg>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 xl:w-1/4">
        <div class="mx-auto mb-10 w-full max-w-[370px]">
          <div class="relative overflow-hidden rounded-lg">
            <img
              src="https://cdn.tailgrids.com/1.0/assets/images/team/team-01/image-02.jpg"
              alt="image"
              class="w-full"
            />
            <div class="absolute bottom-5 left-0 w-full text-center">
              <div
                class="relative mx-5 overflow-hidden rounded-lg bg-white py-5 px-3"
              >
                <h3 class="text-dark text-base font-semibold">
                  Glorius Cristian
                </h3>
                <p class="text-body-color text-sm">App Developer</p>
                <div>
                  <span class="absolute left-0 bottom-0">
                    <svg
                      width="61"
                      height="30"
                      viewBox="0 0 61 30"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        cx="16"
                        cy="45"
                        r="45"
                        fill="#13C296"
                        fill-opacity="0.11"
                      />
                    </svg>
                  </span>
                  <span class="absolute top-0 right-0">
                    <svg
                      width="20"
                      height="25"
                      viewBox="0 0 20 25"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        cx="0.706257"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 0.706257 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 6.39669 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 12.0881 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 17.7785 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 0.706257 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 6.39669 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 12.0881 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 17.7785 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 0.706257 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 6.39669 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 12.0881 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 17.7785 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 0.706257 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 6.39669 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 12.0881 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 17.7785 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 0.706257 1.58989)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 6.39669 1.58989)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 12.0881 1.58989)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 17.7785 1.58989)"
                        fill="#3056D3"
                      />
                    </svg>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 xl:w-1/4">
        <div class="mx-auto mb-10 w-full max-w-[370px]">
          <div class="relative overflow-hidden rounded-lg">
            <img
              src="https://cdn.tailgrids.com/1.0/assets/images/team/team-01/image-03.jpg"
              alt="image"
              class="w-full"
            />
            <div class="absolute bottom-5 left-0 w-full text-center">
              <div
                class="relative mx-5 overflow-hidden rounded-lg bg-white py-5 px-3"
              >
                <h3 class="text-dark text-base font-semibold">
                  Jackie Sanders
                </h3>
                <p class="text-body-color text-sm">UI/UX Designer</p>
                <div>
                  <span class="absolute left-0 bottom-0">
                    <svg
                      width="61"
                      height="30"
                      viewBox="0 0 61 30"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        cx="16"
                        cy="45"
                        r="45"
                        fill="#13C296"
                        fill-opacity="0.11"
                      />
                    </svg>
                  </span>
                  <span class="absolute top-0 right-0">
                    <svg
                      width="20"
                      height="25"
                      viewBox="0 0 20 25"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        cx="0.706257"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 0.706257 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 6.39669 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 12.0881 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 17.7785 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 0.706257 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 6.39669 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 12.0881 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 17.7785 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 0.706257 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 6.39669 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 12.0881 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 17.7785 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 0.706257 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 6.39669 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 12.0881 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 17.7785 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 0.706257 1.58989)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 6.39669 1.58989)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 12.0881 1.58989)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 17.7785 1.58989)"
                        fill="#3056D3"
                      />
                    </svg>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 xl:w-1/4">
        <div class="mx-auto mb-10 w-full max-w-[370px]">
          <div class="relative overflow-hidden rounded-lg">
            <img
              src="https://cdn.tailgrids.com/1.0/assets/images/team/team-01/image-04.jpg"
              alt="image"
              class="w-full"
            />
            <div class="absolute bottom-5 left-0 w-full text-center">
              <div
                class="relative mx-5 overflow-hidden rounded-lg bg-white py-5 px-3"
              >
                <h3 class="text-dark text-base font-semibold">
                  Nikolas Brooten
                </h3>
                <p class="text-body-color text-sm">Sales Manager</p>
                <div>
                  <span class="absolute left-0 bottom-0">
                    <svg
                      width="61"
                      height="30"
                      viewBox="0 0 61 30"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        cx="16"
                        cy="45"
                        r="45"
                        fill="#13C296"
                        fill-opacity="0.11"
                      />
                    </svg>
                  </span>
                  <span class="absolute top-0 right-0">
                    <svg
                      width="20"
                      height="25"
                      viewBox="0 0 20 25"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        cx="0.706257"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 0.706257 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 6.39669 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 12.0881 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="24.3533"
                        r="0.646687"
                        transform="rotate(-90 17.7785 24.3533)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 0.706257 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 6.39669 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 12.0881 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="18.6624"
                        r="0.646687"
                        transform="rotate(-90 17.7785 18.6624)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 0.706257 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 6.39669 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 12.0881 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="12.9717"
                        r="0.646687"
                        transform="rotate(-90 17.7785 12.9717)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 0.706257 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 6.39669 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 12.0881 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="7.28077"
                        r="0.646687"
                        transform="rotate(-90 17.7785 7.28077)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="0.706257"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 0.706257 1.58989)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="6.39669"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 6.39669 1.58989)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="12.0881"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 12.0881 1.58989)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="17.7785"
                        cy="1.58989"
                        r="0.646687"
                        transform="rotate(-90 17.7785 1.58989)"
                        fill="#3056D3"
                      />
                    </svg>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Team Section End -->

TAILGRID TESTMONIAL
<!-- ====== Testimonials Section Start -->
<section class="pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]">
  <div class="container mx-auto">
    <div
      x-data="
        {
        slides: ['1','2','3'],
        activeSlide: 1,
        activeButton: 'w-[30px] bg-primary',
        button: 'w-[10px] bg-[#E4E4E4]'
        }
        "
    >
      <div class="relative flex justify-center">
        <div
          class="relative w-full pb-16 md:w-11/12 lg:w-10/12 xl:w-8/12 xl:pb-0"
        >
          <div
            class="snap xs:max-w-[368px] flex-no-wrap mx-auto flex h-auto w-full max-w-[300px] overflow-hidden transition-all sm:max-w-[508px] md:max-w-[630px] lg:max-w-[738px] 2xl:max-w-[850px]"
            x-ref="carousel"
          >
            <div
              class="xs:min-w-[368px] mx-auto h-full min-w-[300px] sm:min-w-[508px] sm:p-6 md:min-w-[630px] lg:min-w-[738px] 2xl:min-w-[850px]"
            >
              <div class="w-full items-center md:flex">
                <div
                  class="relative mb-12 w-full max-w-[310px] md:mr-12 md:mb-0 md:max-w-[250px] lg:mr-14 lg:max-w-[280px] 2xl:mr-16"
                >
                  <img
                    src="https://cdn.tailgrids.com/2.0/image/marketing/images/testimonials/testimonial-01/image-01.jpg"
                    alt="image"
                    class="w-full"
                  />
                  <span class="absolute -top-6 -left-6 z-[-1] hidden sm:block">
                    <svg
                      width="77"
                      height="77"
                      viewBox="0 0 77 77"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        cx="1.66343"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 1.66343 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 1.66343 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 16.3016 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 16.3016 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 30.9398 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 30.9398 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 45.578 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 45.578 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="74.5216"
                        r="1.66343"
                        transform="rotate(-90 60.2162 74.5216)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="74.5216"
                        r="1.66343"
                        transform="rotate(-90 74.6634 74.5216)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="30.9398"
                        r="1.66343"
                        transform="rotate(-90 60.2162 30.9398)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="30.9398"
                        r="1.66343"
                        transform="rotate(-90 74.6634 30.9398)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 1.66343 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 1.66343 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 16.3016 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 16.3016 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 30.9398 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 30.9398 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 45.578 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 45.578 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 60.2162 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 74.6634 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 60.2162 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 74.6634 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 1.66343 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="1.66342"
                        r="1.66343"
                        transform="rotate(-90 1.66343 1.66342)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 16.3016 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="1.66342"
                        r="1.66343"
                        transform="rotate(-90 16.3016 1.66342)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 30.9398 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="1.66342"
                        r="1.66343"
                        transform="rotate(-90 30.9398 1.66342)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 45.578 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="1.66344"
                        r="1.66343"
                        transform="rotate(-90 45.578 1.66344)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="45.2458"
                        r="1.66343"
                        transform="rotate(-90 60.2162 45.2458)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="45.2458"
                        r="1.66343"
                        transform="rotate(-90 74.6634 45.2458)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="1.66371"
                        r="1.66343"
                        transform="rotate(-90 60.2162 1.66371)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="1.66371"
                        r="1.66343"
                        transform="rotate(-90 74.6634 1.66371)"
                        fill="#3056D3"
                      />
                    </svg>
                  </span>
                  <span class="absolute -bottom-6 -right-6 z-[-1]">
                    <svg
                      width="64"
                      height="64"
                      viewBox="0 0 64 64"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M3 32C3 15.9837 15.9837 3 32 3C48.0163 2.99999 61 15.9837 61 32C61 48.0163 48.0163 61 32 61C15.9837 61 3 48.0163 3 32Z"
                        stroke="#13C296"
                        stroke-width="6"
                      />
                    </svg>
                  </span>
                </div>
                <div class="w-full">
                  <div>
                    <div class="mb-7">
                      <img
                        src="https://cdn.tailgrids.com/2.0/image/marketing/images/testimonials/testimonial-01/lineicon.svg"
                        alt="lineicon"
                      />
                    </div>
                    <p
                      class="text-body-color mb-11 text-base font-medium italic sm:text-lg"
                    >
                      Velit est sit voluptas eum sapiente omnis! Porro, impedit
                      minus quam reprehenderit tempore sint quaerat id! Mollitia
                      perspiciatis est asperiores commodi labore!
                    </p>
                    <h4 class="text-dark text-xl font-semibold">
                      Larry Diamond
                    </h4>
                    <p class="text-body-color text-base">
                      Chief Executive Officer.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="xs:min-w-[368px] mx-auto h-full min-w-[300px] sm:min-w-[508px] sm:p-6 md:min-w-[630px] lg:min-w-[738px] 2xl:min-w-[850px]"
            >
              <div class="w-full items-center md:flex">
                <div
                  class="relative mb-12 w-full max-w-[310px] md:mr-12 md:mb-0 md:max-w-[250px] lg:mr-14 lg:max-w-[280px] 2xl:mr-16"
                >
                  <img
                    src="https://cdn.tailgrids.com/2.0/image/marketing/images/testimonials/testimonial-01/image-01.jpg"
                    alt="image"
                    class="w-full"
                  />
                  <span class="absolute -top-6 -left-6 z-[-1] hidden sm:block">
                    <svg
                      width="77"
                      height="77"
                      viewBox="0 0 77 77"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        cx="1.66343"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 1.66343 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 1.66343 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 16.3016 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 16.3016 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 30.9398 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 30.9398 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 45.578 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 45.578 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="74.5216"
                        r="1.66343"
                        transform="rotate(-90 60.2162 74.5216)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="74.5216"
                        r="1.66343"
                        transform="rotate(-90 74.6634 74.5216)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="30.9398"
                        r="1.66343"
                        transform="rotate(-90 60.2162 30.9398)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="30.9398"
                        r="1.66343"
                        transform="rotate(-90 74.6634 30.9398)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 1.66343 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 1.66343 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 16.3016 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 16.3016 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 30.9398 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 30.9398 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 45.578 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 45.578 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 60.2162 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 74.6634 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 60.2162 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 74.6634 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 1.66343 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="1.66342"
                        r="1.66343"
                        transform="rotate(-90 1.66343 1.66342)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 16.3016 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="1.66342"
                        r="1.66343"
                        transform="rotate(-90 16.3016 1.66342)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 30.9398 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="1.66342"
                        r="1.66343"
                        transform="rotate(-90 30.9398 1.66342)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 45.578 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="1.66344"
                        r="1.66343"
                        transform="rotate(-90 45.578 1.66344)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="45.2458"
                        r="1.66343"
                        transform="rotate(-90 60.2162 45.2458)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="45.2458"
                        r="1.66343"
                        transform="rotate(-90 74.6634 45.2458)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="1.66371"
                        r="1.66343"
                        transform="rotate(-90 60.2162 1.66371)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="1.66371"
                        r="1.66343"
                        transform="rotate(-90 74.6634 1.66371)"
                        fill="#3056D3"
                      />
                    </svg>
                  </span>
                  <span class="absolute -bottom-6 -right-6 z-[-1]">
                    <svg
                      width="64"
                      height="64"
                      viewBox="0 0 64 64"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M3 32C3 15.9837 15.9837 3 32 3C48.0163 2.99999 61 15.9837 61 32C61 48.0163 48.0163 61 32 61C15.9837 61 3 48.0163 3 32Z"
                        stroke="#13C296"
                        stroke-width="6"
                      />
                    </svg>
                  </span>
                </div>
                <div class="w-full">
                  <div>
                    <div class="mb-7">
                      <img
                        src="https://cdn.tailgrids.com/2.0/image/marketing/images/testimonials/testimonial-01/lineicon.svg"
                        alt="lineicon"
                      />
                    </div>
                    <p
                      class="text-body-color mb-11 text-base font-medium italic sm:text-lg"
                    >
                      Velit est sit voluptas eum sapiente omnis! Porro, impedit
                      minus quam reprehenderit tempore sint quaerat id! Mollitia
                      perspiciatis est asperiores commodi labore!
                    </p>
                    <h4 class="text-dark text-xl font-semibold">
                      Larry Diamond
                    </h4>
                    <p class="text-body-color text-base">
                      Chief Executive Officer.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="xs:min-w-[368px] mx-auto h-full min-w-[300px] sm:min-w-[508px] sm:p-6 md:min-w-[630px] lg:min-w-[738px] 2xl:min-w-[850px]"
            >
              <div class="w-full items-center md:flex">
                <div
                  class="relative mb-12 w-full max-w-[310px] md:mr-12 md:mb-0 md:max-w-[250px] lg:mr-14 lg:max-w-[280px] 2xl:mr-16"
                >
                  <img
                    src="https://cdn.tailgrids.com/2.0/image/marketing/images/testimonials/testimonial-01/image-01.jpg"
                    alt="image"
                    class="w-full"
                  />
                  <span class="absolute -top-6 -left-6 z-[-1] hidden sm:block">
                    <svg
                      width="77"
                      height="77"
                      viewBox="0 0 77 77"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        cx="1.66343"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 1.66343 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 1.66343 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 16.3016 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 16.3016 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 30.9398 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 30.9398 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 45.578 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 45.578 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="74.5216"
                        r="1.66343"
                        transform="rotate(-90 60.2162 74.5216)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="74.5216"
                        r="1.66343"
                        transform="rotate(-90 74.6634 74.5216)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="30.9398"
                        r="1.66343"
                        transform="rotate(-90 60.2162 30.9398)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="30.9398"
                        r="1.66343"
                        transform="rotate(-90 74.6634 30.9398)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 1.66343 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 1.66343 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 16.3016 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 16.3016 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 30.9398 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 30.9398 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 45.578 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 45.578 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 60.2162 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 74.6634 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 60.2162 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 74.6634 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 1.66343 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="1.66342"
                        r="1.66343"
                        transform="rotate(-90 1.66343 1.66342)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 16.3016 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="1.66342"
                        r="1.66343"
                        transform="rotate(-90 16.3016 1.66342)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 30.9398 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="1.66342"
                        r="1.66343"
                        transform="rotate(-90 30.9398 1.66342)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 45.578 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="1.66344"
                        r="1.66343"
                        transform="rotate(-90 45.578 1.66344)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="45.2458"
                        r="1.66343"
                        transform="rotate(-90 60.2162 45.2458)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="45.2458"
                        r="1.66343"
                        transform="rotate(-90 74.6634 45.2458)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="1.66371"
                        r="1.66343"
                        transform="rotate(-90 60.2162 1.66371)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="1.66371"
                        r="1.66343"
                        transform="rotate(-90 74.6634 1.66371)"
                        fill="#3056D3"
                      />
                    </svg>
                  </span>
                  <span class="absolute -bottom-6 -right-6 z-[-1]">
                    <svg
                      width="64"
                      height="64"
                      viewBox="0 0 64 64"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M3 32C3 15.9837 15.9837 3 32 3C48.0163 2.99999 61 15.9837 61 32C61 48.0163 48.0163 61 32 61C15.9837 61 3 48.0163 3 32Z"
                        stroke="#13C296"
                        stroke-width="6"
                      />
                    </svg>
                  </span>
                </div>
                <div class="w-full">
                  <div>
                    <div class="mb-7">
                      <img
                        src="https://cdn.tailgrids.com/2.0/image/marketing/images/testimonials/testimonial-01/lineicon.svg"
                        alt="lineicon"
                      />
                    </div>
                    <p
                      class="text-body-color mb-11 text-base font-medium italic sm:text-lg"
                    >
                      Velit est sit voluptas eum sapiente omnis! Porro, impedit
                      minus quam reprehenderit tempore sint quaerat id! Mollitia
                      perspiciatis est asperiores commodi labore!
                    </p>
                    <h4 class="text-dark text-xl font-semibold">
                      Larry Diamond
                    </h4>
                    <p class="text-body-color text-base">
                      Chief Executive Officer.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="absolute left-0 right-0 bottom-0 flex items-center justify-center lg:pl-[120px] 2xl:pl-0"
          >
            <button
              class="text-primary hover:bg-primary shadow-input mx-1 flex h-12 w-12 items-center justify-center rounded-full bg-white transition-all hover:text-white"
              @click="$refs.carousel.scrollLeft = $refs.carousel.scrollLeft - ($refs.carousel.scrollWidth / slides.length); activeSlide -= 1"
            >
              <svg
                width="15"
                height="13"
                viewBox="0 0 15 13"
                class="fill-current"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M5.24264 11.8033L0.46967 7.03037C0.176777 6.73748 0.176777 6.2626 0.46967 5.96971L5.24264 1.19674C5.53553 0.903845 6.01041 0.903845 6.3033 1.19674C6.59619 1.48963 6.59619 1.96451 6.3033 2.2574L2.81066 5.75004H14C14.4142 5.75004 14.75 6.08583 14.75 6.50004C14.75 6.91425 14.4142 7.25004 14 7.25004H2.81066L6.3033 10.7427C6.59619 11.0356 6.59619 11.5104 6.3033 11.8033C6.01041 12.0962 5.53553 12.0962 5.24264 11.8033Z"
                />
              </svg>
            </button>
            <button
              class="text-primary hover:bg-primary shadow-input mx-1 flex h-12 w-12 items-center justify-center rounded-full bg-white transition-all hover:text-white"
              @click="$refs.carousel.scrollLeft = $refs.carousel.scrollLeft + ($refs.carousel.scrollWidth / slides.length); activeSlide += 1"
            >
              <svg
                width="15"
                height="13"
                viewBox="0 0 15 13"
                class="fill-current"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M9.75736 11.8033L14.5303 7.03037C14.8232 6.73748 14.8232 6.2626 14.5303 5.96971L9.75736 1.19674C9.46447 0.903845 8.98959 0.903845 8.6967 1.19674C8.40381 1.48963 8.40381 1.96451 8.6967 2.2574L12.1893 5.75004H1C0.585786 5.75004 0.25 6.08583 0.25 6.50004C0.25 6.91425 0.585786 7.25004 1 7.25004H12.1893L8.6967 10.7427C8.40381 11.0356 8.40381 11.5104 8.6967 11.8033C8.98959 12.0962 9.46447 12.0962 9.75736 11.8033Z"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Testimonials Section End -->

TAILGRID ABOUT
<!-- ====== About Section Start -->
<section class="overflow-hidden pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
  <div class="container mx-auto">
    <div class="-mx-4 flex flex-wrap items-center justify-between">
      <div class="w-full px-4 lg:w-6/12">
        <div class="-mx-3 flex items-center sm:-mx-4">
          <div class="w-full px-3 sm:px-4 xl:w-1/2">
            <div class="py-3 sm:py-4">
              <img
                src="https://cdn.tailgrids.com/2.0/image/marketing/images/about/about-01/image-1.jpg"
                alt=""
                class="w-full rounded-2xl"
              />
            </div>
            <div class="py-3 sm:py-4">
              <img
                src="https://cdn.tailgrids.com/2.0/image/marketing/images/about/about-01/image-2.jpg"
                alt=""
                class="w-full rounded-2xl"
              />
            </div>
          </div>
          <div class="w-full px-3 sm:px-4 xl:w-1/2">
            <div class="relative z-10 my-4">
              <img
                src="https://cdn.tailgrids.com/2.0/image/marketing/images/about/about-01/image-3.jpg"
                alt=""
                class="w-full rounded-2xl"
              />
              <span class="absolute -right-7 -bottom-7 z-[-1]">
                <svg
                  width="134"
                  height="106"
                  viewBox="0 0 134 106"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <circle
                    cx="1.66667"
                    cy="104"
                    r="1.66667"
                    transform="rotate(-90 1.66667 104)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="16.3333"
                    cy="104"
                    r="1.66667"
                    transform="rotate(-90 16.3333 104)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="31"
                    cy="104"
                    r="1.66667"
                    transform="rotate(-90 31 104)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="45.6667"
                    cy="104"
                    r="1.66667"
                    transform="rotate(-90 45.6667 104)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="60.3334"
                    cy="104"
                    r="1.66667"
                    transform="rotate(-90 60.3334 104)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="88.6667"
                    cy="104"
                    r="1.66667"
                    transform="rotate(-90 88.6667 104)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="117.667"
                    cy="104"
                    r="1.66667"
                    transform="rotate(-90 117.667 104)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="74.6667"
                    cy="104"
                    r="1.66667"
                    transform="rotate(-90 74.6667 104)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="103"
                    cy="104"
                    r="1.66667"
                    transform="rotate(-90 103 104)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="132"
                    cy="104"
                    r="1.66667"
                    transform="rotate(-90 132 104)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="1.66667"
                    cy="89.3333"
                    r="1.66667"
                    transform="rotate(-90 1.66667 89.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="16.3333"
                    cy="89.3333"
                    r="1.66667"
                    transform="rotate(-90 16.3333 89.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="31"
                    cy="89.3333"
                    r="1.66667"
                    transform="rotate(-90 31 89.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="45.6667"
                    cy="89.3333"
                    r="1.66667"
                    transform="rotate(-90 45.6667 89.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="60.3333"
                    cy="89.3338"
                    r="1.66667"
                    transform="rotate(-90 60.3333 89.3338)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="88.6667"
                    cy="89.3338"
                    r="1.66667"
                    transform="rotate(-90 88.6667 89.3338)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="117.667"
                    cy="89.3338"
                    r="1.66667"
                    transform="rotate(-90 117.667 89.3338)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="74.6667"
                    cy="89.3338"
                    r="1.66667"
                    transform="rotate(-90 74.6667 89.3338)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="103"
                    cy="89.3338"
                    r="1.66667"
                    transform="rotate(-90 103 89.3338)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="132"
                    cy="89.3338"
                    r="1.66667"
                    transform="rotate(-90 132 89.3338)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="1.66667"
                    cy="74.6673"
                    r="1.66667"
                    transform="rotate(-90 1.66667 74.6673)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="1.66667"
                    cy="31.0003"
                    r="1.66667"
                    transform="rotate(-90 1.66667 31.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="16.3333"
                    cy="74.6668"
                    r="1.66667"
                    transform="rotate(-90 16.3333 74.6668)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="16.3333"
                    cy="31.0003"
                    r="1.66667"
                    transform="rotate(-90 16.3333 31.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="31"
                    cy="74.6668"
                    r="1.66667"
                    transform="rotate(-90 31 74.6668)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="31"
                    cy="31.0003"
                    r="1.66667"
                    transform="rotate(-90 31 31.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="45.6667"
                    cy="74.6668"
                    r="1.66667"
                    transform="rotate(-90 45.6667 74.6668)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="45.6667"
                    cy="31.0003"
                    r="1.66667"
                    transform="rotate(-90 45.6667 31.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="60.3333"
                    cy="74.6668"
                    r="1.66667"
                    transform="rotate(-90 60.3333 74.6668)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="60.3333"
                    cy="30.9998"
                    r="1.66667"
                    transform="rotate(-90 60.3333 30.9998)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="88.6667"
                    cy="74.6668"
                    r="1.66667"
                    transform="rotate(-90 88.6667 74.6668)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="88.6667"
                    cy="30.9998"
                    r="1.66667"
                    transform="rotate(-90 88.6667 30.9998)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="117.667"
                    cy="74.6668"
                    r="1.66667"
                    transform="rotate(-90 117.667 74.6668)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="117.667"
                    cy="30.9998"
                    r="1.66667"
                    transform="rotate(-90 117.667 30.9998)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="74.6667"
                    cy="74.6668"
                    r="1.66667"
                    transform="rotate(-90 74.6667 74.6668)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="74.6667"
                    cy="30.9998"
                    r="1.66667"
                    transform="rotate(-90 74.6667 30.9998)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="103"
                    cy="74.6668"
                    r="1.66667"
                    transform="rotate(-90 103 74.6668)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="103"
                    cy="30.9998"
                    r="1.66667"
                    transform="rotate(-90 103 30.9998)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="132"
                    cy="74.6668"
                    r="1.66667"
                    transform="rotate(-90 132 74.6668)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="132"
                    cy="30.9998"
                    r="1.66667"
                    transform="rotate(-90 132 30.9998)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="1.66667"
                    cy="60.0003"
                    r="1.66667"
                    transform="rotate(-90 1.66667 60.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="1.66667"
                    cy="16.3333"
                    r="1.66667"
                    transform="rotate(-90 1.66667 16.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="16.3333"
                    cy="60.0003"
                    r="1.66667"
                    transform="rotate(-90 16.3333 60.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="16.3333"
                    cy="16.3333"
                    r="1.66667"
                    transform="rotate(-90 16.3333 16.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="31"
                    cy="60.0003"
                    r="1.66667"
                    transform="rotate(-90 31 60.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="31"
                    cy="16.3333"
                    r="1.66667"
                    transform="rotate(-90 31 16.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="45.6667"
                    cy="60.0003"
                    r="1.66667"
                    transform="rotate(-90 45.6667 60.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="45.6667"
                    cy="16.3333"
                    r="1.66667"
                    transform="rotate(-90 45.6667 16.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="60.3333"
                    cy="60.0003"
                    r="1.66667"
                    transform="rotate(-90 60.3333 60.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="60.3333"
                    cy="16.3333"
                    r="1.66667"
                    transform="rotate(-90 60.3333 16.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="88.6667"
                    cy="60.0003"
                    r="1.66667"
                    transform="rotate(-90 88.6667 60.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="88.6667"
                    cy="16.3333"
                    r="1.66667"
                    transform="rotate(-90 88.6667 16.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="117.667"
                    cy="60.0003"
                    r="1.66667"
                    transform="rotate(-90 117.667 60.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="117.667"
                    cy="16.3333"
                    r="1.66667"
                    transform="rotate(-90 117.667 16.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="74.6667"
                    cy="60.0003"
                    r="1.66667"
                    transform="rotate(-90 74.6667 60.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="74.6667"
                    cy="16.3333"
                    r="1.66667"
                    transform="rotate(-90 74.6667 16.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="103"
                    cy="60.0003"
                    r="1.66667"
                    transform="rotate(-90 103 60.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="103"
                    cy="16.3333"
                    r="1.66667"
                    transform="rotate(-90 103 16.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="132"
                    cy="60.0003"
                    r="1.66667"
                    transform="rotate(-90 132 60.0003)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="132"
                    cy="16.3333"
                    r="1.66667"
                    transform="rotate(-90 132 16.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="1.66667"
                    cy="45.3333"
                    r="1.66667"
                    transform="rotate(-90 1.66667 45.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="1.66667"
                    cy="1.66683"
                    r="1.66667"
                    transform="rotate(-90 1.66667 1.66683)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="16.3333"
                    cy="45.3333"
                    r="1.66667"
                    transform="rotate(-90 16.3333 45.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="16.3333"
                    cy="1.66683"
                    r="1.66667"
                    transform="rotate(-90 16.3333 1.66683)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="31"
                    cy="45.3333"
                    r="1.66667"
                    transform="rotate(-90 31 45.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="31"
                    cy="1.66683"
                    r="1.66667"
                    transform="rotate(-90 31 1.66683)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="45.6667"
                    cy="45.3333"
                    r="1.66667"
                    transform="rotate(-90 45.6667 45.3333)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="45.6667"
                    cy="1.66683"
                    r="1.66667"
                    transform="rotate(-90 45.6667 1.66683)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="60.3333"
                    cy="45.3338"
                    r="1.66667"
                    transform="rotate(-90 60.3333 45.3338)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="60.3333"
                    cy="1.66683"
                    r="1.66667"
                    transform="rotate(-90 60.3333 1.66683)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="88.6667"
                    cy="45.3338"
                    r="1.66667"
                    transform="rotate(-90 88.6667 45.3338)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="88.6667"
                    cy="1.66683"
                    r="1.66667"
                    transform="rotate(-90 88.6667 1.66683)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="117.667"
                    cy="45.3338"
                    r="1.66667"
                    transform="rotate(-90 117.667 45.3338)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="117.667"
                    cy="1.66683"
                    r="1.66667"
                    transform="rotate(-90 117.667 1.66683)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="74.6667"
                    cy="45.3338"
                    r="1.66667"
                    transform="rotate(-90 74.6667 45.3338)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="74.6667"
                    cy="1.66683"
                    r="1.66667"
                    transform="rotate(-90 74.6667 1.66683)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="103"
                    cy="45.3338"
                    r="1.66667"
                    transform="rotate(-90 103 45.3338)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="103"
                    cy="1.66683"
                    r="1.66667"
                    transform="rotate(-90 103 1.66683)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="132"
                    cy="45.3338"
                    r="1.66667"
                    transform="rotate(-90 132 45.3338)"
                    fill="#3056D3"
                  />
                  <circle
                    cx="132"
                    cy="1.66683"
                    r="1.66667"
                    transform="rotate(-90 132 1.66683)"
                    fill="#3056D3"
                  />
                </svg>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full px-4 lg:w-1/2 xl:w-5/12">
        <div class="mt-10 lg:mt-0">
          <span class="text-primary mb-2 block text-lg font-semibold">
            Why Choose Us
          </span>
          <h2 class="text-dark mb-8 text-3xl font-bold sm:text-4xl">
            Make your customers happy by giving services.
          </h2>
          <p class="text-body-color mb-8 text-base">
            It is a long established fact that a reader will be distracted by
            the readable content of a page when looking at its layout. The point
            of using Lorem Ipsum is that it has a more-or-less.
          </p>
          <p class="text-body-color mb-12 text-base">
            A domain name is one of the first steps to establishing your brand.
            Secure a consistent brand image with a domain name that matches your
            business.
          </p>
          <a
            href="javascript:void(0)"
            class="bg-primary inline-flex items-center justify-center rounded-lg py-4 px-10 text-center text-base font-normal text-white hover:bg-opacity-90 lg:px-8 xl:px-10"
          >
            Get Started
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== About Section End -->


  <!-- NEWSLETTER SUBSCRIPTION START -->
<div class="flex items-center justify-center py-2">
  <div class="mx-auto w-full max-w-screen-lg bg-blue-700 py-2">
    <div class="grid gap-5 md:grid-cols-2 md:gap-10 lg:gap-20">
      <div class="flex justify-center md:justify-end">
        <img class="w-full max-w-sm" src="https://ouch-cdn2.icons8.com/sKnF2PmYhkmP28DzIm6KqWSknT03UVWjg3FLlGYIOp4/rs:fit:684:456/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9zdmcvOTI3/L2U4OWQ2NmZiLTg0/NzEtNDc3NS1hNTA0/LTMwNWRiYmJkNzg0/MC5zdmc.png" alt="Marketing newsletter via computer Illustration in PNG, SVG" />
      </div>
      <div class="flex items-center">
        <div class="mx-auto md:mx-0">
          <h3 class="text-4xl font-bold text-white">Subscribe</h3>
          <p class="mt-2 max-w-[20rem] text-lg text-white/80">Join our weekly digest. You'll also receive some of our best posts today.</p>
          <form action="" class="mt-4 flex flex-col">
            <input type="email" name="email" id="email" placeholder="Enter your email" class="w-full rounded border border-white/50 bg-transparent px-3 py-2 text-white placeholder:text-white/50 md:max-w-[18rem]" />
            <button type="submit" class="mt-4 w-full max-w-[14rem] rounded bg-white/30 px-14 py-2 text-center text-white">Subscribe</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- NEWSLETTER SUBSCRIPTION END -->
</x-home-main>
</x-frontend>

