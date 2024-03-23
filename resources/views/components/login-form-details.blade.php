        @csrf
        <div>
          <label class="block mb-2 text-white dark:text-blue-900" for="username">E-Mail</label>
            <input class="w-full bg-transparent p-2 mb-6 text-indigo-700 border-white outline-none focus:bg-white rounded py-2 placeholder-sky-500 font-bold text-lg" type="email" name="email" autocomplete="off" style="text-align: center;" onclick ="this.removeAttribute('readonly');" placeholder="Email Address">
            @error('email')
              <p class="text-[red] w-fit text-sm italic -mt-6">{{ $message }}</p>
            @enderror
        </div>
        <div>
          <label class="block mb-2 text-white dark:text-blue-900" for="password">Password</label>
          <input class="w-full bg-transparent p-2 mb-6 text-indigo-700 border-white outline-none focus:bg-white rounded py-2 placeholder-sky-500 font-bold text-lg" type="password" name="password" autocomplete="off" style="text-align: center;" onclick ="this.removeAttribute('readonly');" placeholder="Enter Password">
          @error('password')
            <p class="text-[red] w-fit text-sm italic -mt-6">{{ $message }}</p>
          @enderror
        </div>
        <div>          
          <input class="w-full bg-blue-800 hover:bg-white text-white hover:text-black font-bold py-2 px-4 mb-6 rounded cursor-pointer" type="submit">
        </div>       
