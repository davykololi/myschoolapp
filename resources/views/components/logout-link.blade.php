            <form method="POST" action="{{ route('logout') }}" class="-mt-1" style="float: right;">
              @csrf
              <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="px-4 py-2 text-white font-bold hover:text-black cursor-pointer dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white rounded">
                Cancel
              </a>
            </form>