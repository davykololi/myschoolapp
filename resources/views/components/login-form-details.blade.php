        @csrf
        <div class="mb-4">
            <input class="w-full bg-transparent p-2 mb-6 text-white border-white outline-none focus:bg-black rounded py-2 placeholder-sky-500 font-bold text-lg" type="email" name="email" autocomplete="off" style="box-shadow: rgb(0 0 0 / 21%) 0px 5px 0px;" onclick ="this.removeAttribute('readonly');" placeholder="Enter Email Address">
            @error('email')
              <p class="text-[red] w-fit text-sm italic -mt-6">{{ $message }}</p>
            @enderror
        </div>
        <div>
          <input class="w-full bg-transparent p-2 mb-6 text-white border-white outline-none focus:bg-black rounded py-2 placeholder-sky-500 font-bold text-lg" type="password" name="password" autocomplete="off" style="box-shadow: rgb(0 0 0 / 21%) 0px 5px 0px;" onclick ="this.removeAttribute('readonly');" placeholder="Enter Password">
          @error('password')
            <p class="text-[red] w-fit text-sm italic -mt-6">{{ $message }}</p>
          @enderror
        </div>
        <div class="my-4">          
          <input class="w-full bg-blue-800 hover:bg-white text-white hover:text-black font-bold py-2 px-4 mb-6 rounded cursor-pointer" type="submit">
        </div>       
