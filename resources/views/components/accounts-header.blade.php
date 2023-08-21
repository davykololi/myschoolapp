      <header class="header bg-blue-300 shadow py-4 px-4 md:px-16 md:mx-16">
        <div class="header-content flex items-center flex-row">
          @include('ext.student-search-form')
          <div class="flex ml-auto">
            <a href class="flex flex-row items-center">
              <img
                src="https://pbs.twimg.com/profile_images/378800000298815220/b567757616f720812125bfbac395ff54_normal.png"
                alt
                class="h-10 w-10 bg-gray-200 border rounded-full"
              />
              <span class="flex flex-col ml-2">
                <span class="truncate w-20 font-semibold tracking-wide leading-none">John Doe</span>
                <span class="truncate w-20 text-gray-500 text-xs leading-none mt-1">Manager</span>
              </span>
            </a>
          </div>
        </div>
      </header>