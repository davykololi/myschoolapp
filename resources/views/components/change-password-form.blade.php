<div class="max-w-screen h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="w-full md:w-1/3 lg:w-1/3 mx-auto">
                <div class="uppercase text-2xl text-center font-bold">Change Password</div>
   
                <div class="mt-4 border p-8 bg-transparent rounded">
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf 
   
                         @include('partials.errors')
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="password-form-input" name="current_password" autocomplete="current-password" placeholder="Current Password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="password-form-input" name="new_password" autocomplete="current-password" placeholder="New Password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="password-form-input" name="new_confirm_password" autocomplete="current-password" placeholder="Confirm Password">
                            </div>
                        </div>
   
                        <div class="form-group row mb-0">
                            <div class="my-4">
                                <button type="submit" class="bg-blue-800 text-white hover:text-red-800 hover:bg-white px-4 py-1 rounded">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>