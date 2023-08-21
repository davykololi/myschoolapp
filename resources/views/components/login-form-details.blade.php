          @csrf
          <div x-data="{show: false, product:['apple','orange','avocado','mango','peer'], email: '', password: '', toggle: '0', }">
            <div class="flex items-center rounded-md relative">
              <input type="email" x-model="email" name="email" class="w-full px-4 mb-3 rounded border py-2 placeholder-sky-500 bg-transparent focus:bg-white dark:text-slate-400 dark:focus:text-slate-400 dark:focus:bg-slate-900" placeholder="Email Address" autocomplete="off" onclick ="this.removeAttribute('readonly');"/>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute bottom-5 right-5 inline w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>
            </div>
            <div class="w-64 -mt-1">
              @error('email')
                <p class="text-[red] w-fit text-sm italic">{{ $message }}</p>
              @enderror
            </div>
            <div class="flex items-center rounded-md relative">
              <input :type="show ? 'text' : 'password' " x-model="password" name="password" class="w-full px-4 mb-5 rounded border py-2 placeholder-sky-500 bg-transparent focus:bg-white dark:text-slate-400 dark:focus:text-slate-400 dark:focus:bg-slate-900" placeholder="Enter Password" autocomplete="off" onclick ="this.removeAttribute('readonly');">
              <a @click="show = !show" class="absolute inline-block bottom-7 right-5">
                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
                <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </a>
            </div>
            <div class="w-64 -mt-1">
              @error('password')
                <p class="text-[red] w-fit text-sm italic">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <button type="submit" class="block px-4 py-1 bg-transparent text-white mt-8 border border-white rounded mb-2">
            Login
          </button>
