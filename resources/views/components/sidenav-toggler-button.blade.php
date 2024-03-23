
<!-- Toggler -->
@auth <!-- Start of Authorized User -->
<!-- Start of Superadmin Toggler Button -->
@if(Auth::user()->hasRole('superadmin'))
<button
  class="md:-my-2 lg:-my-2 inline-block rounded bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
  data-te-sidenav-toggle-ref
  data-te-target="#sidenav-35"
  aria-controls="#sidenav-35"
  aria-haspopup="true">
  <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
@endif
<!-- End of Superadmin Toggler Button -->

<!-- Start of Admin Toggler Button -->
@if(Auth::user()->hasRole('admin'))
<button
  class="sm:pb-4 md:pb-0 lg:pb-0 inline-block rounded bg-primary px-6 py-1 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg dark:bg-gray-800 dark:text-slate-400 mx-2 mt-1"
  data-te-sidenav-toggle-ref
  data-te-target="#sidenav-13"
  aria-controls="#sidenav-13"
  aria-haspopup="true">
  <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
@endif
<!-- End of Admin Toggler Button -->

<!-- Start of Accountant Toggler Button -->
@if(Auth::user()->hasRole('accountant'))
<button
  class="sidebar-toggler-button"
  data-te-sidenav-toggle-ref
  data-te-target="#sidenav-20"
  aria-controls="#sidenav-20"
  aria-haspopup="true">
  <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
@endif
<!-- End of Accountant Toggler Button -->

<!-- Start of Teacher Toggler Button -->
@if(Auth::user()->hasRole('teacher'))
<button
  class="sidebar-toggler-button"
  data-te-sidenav-toggle-ref
  data-te-target="#sidenav-10"
  aria-controls="#sidenav-10"
  aria-haspopup="true">
  <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
@endif
<!-- End of Teacher Toggler Button -->

<!-- Start of Matron Toggler Button -->
@if(Auth::user()->hasRole('matron'))
<button
  class="sidebar-toggler-button"
  data-te-sidenav-toggle-ref
  data-te-target="#sidenav-79"
  aria-controls="#sidenav-79"
  aria-haspopup="true">
  <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
@endif
<!-- End of Matron Toggler Button -->

<!-- Start of Librarian Toggler Button -->
@if(Auth::user()->hasRole('librarian'))
<button
  class="sm:pb-4 md:pb-0 lg:pb-0 inline-block rounded bg-primary px-6 py-1 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg dark:bg-gray-800 dark:text-slate-400 mx-2 mt-1"
  data-te-sidenav-toggle-ref
  data-te-target="#sidenav-3"
  aria-controls="#sidenav-3"
  aria-haspopup="true">
  <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
@endif
<!-- End of Librarian Toggler Button -->

<!-- Start of Student Toggler Button -->
@if(Auth::user()->hasRole('student'))
<button
  class="sidebar-toggler-button"
  data-te-sidenav-toggle-ref
  data-te-target="#sidenav-8"
  aria-controls="#sidenav-8"
  aria-haspopup="true">
  <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
@endif
<!-- End of Student Toggler Button -->

<!-- Start of Parent Toggler Button -->
@if(Auth::user()->hasRole('parent'))
<button
  class="-my-2 inline-block rounded bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
  data-te-sidenav-toggle-ref
  data-te-target="#sidenav-47"
  aria-controls="#sidenav-47"
  aria-haspopup="true">
  <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
@endif
<!-- End of Parent Toggler Button -->


<!-- Start of Staff Toggler Button -->
@if(Auth::user()->hasRole('subordinate'))
<button
  class="sidebar-toggler-button"
  data-te-sidenav-toggle-ref
  data-te-target="#sidenav-67"
  aria-controls="#sidenav-67"
  aria-haspopup="true">
  <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
@endif
<!-- End of Parent Toggler Button -->
@endauth <!-- End of Authorized User -->
<!-- Toggler -->