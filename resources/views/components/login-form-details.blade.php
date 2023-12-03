        @csrf
        <div>
          <label class="block mb-2 text-blue-900" for="username">E-Mail</label>
          <input class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="email" name="email" autocomplete="off">
          @error('email')
            <p class="text-[red] w-fit text-sm italic -mt-6">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="block mb-2 text-blue-900" for="password">Password</label>
          <input class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="password" name="password" autocomplete="off">
          @error('password')
            <p class="text-[red] w-fit text-sm italic -mt-6">{{ $message }}</p>
          @enderror
        </div>
        <div>          
          <input class="w-full bg-indigo-700 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-6 rounded" type="submit">
        </div>       
