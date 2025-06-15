                        <hr class="mt-6 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Personal Information
                        </h6>
                        <div class="w-full flex flex-col md:flex-row lg:flex-row mb-6 gap-2">
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Salutation</label>
                                <div class="flex flex-col">
                                    <input type="text" name="salutation" id="salutation" class="user-form-input" value="{{ $teacher->user->salutation }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >First Name</label>
                                <div class="flex flex-col">
                                    <input type="text" name="first_name" id="first_name" class="user-form-input" value="{{ $teacher->user->first_name }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Middle Name</label>
                                <div class="flex flex-col">
                                    <input type="text" name="middle_name" id="middle_name" class="user-form-input" value="{{ $teacher->user->middle_name }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Last Name</label>
                                <div class="flex flex-col">
                                    <input type="text" name="last_name" id="last_name" class="user-form-input" value="{{ $teacher->user->last_name }}">
                                </div>
                            </div>
                        </div>

                        <div class="w-full flex flex-col md:flex-row lg:flex-row mb-6 gap-2">
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Upload Passport Photo:</label>
                                <div class="flex flex-col">
                                    <input type="file" name="image" id="image" class="user-form-input" value="{{ $teacher->image }}">
                                    @error('image')
                                    <span class="text-red-700">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Gender Status</label>
                                <div class="flex flex-col">
                                    <input type="text" name="gender" id="gender" class="user-form-input" value="{{ $teacher->gender }}">
                                </div>
                            </div>
                            
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >DOB</label>
                                <div class="flex flex-col">
                                    <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                        <input type="text" name="dob" id="dob" class="user-form-input" value="{{ $teacher->dob }}">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Blood Group</label>
                                <div class="flex flex-col">
                                    @include('ext._attach_blood_group')
                                </div>
                            </div>
                        </div>

                        <hr class="mt-12 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Identification Details
                        </h6>
                        <div class="w-full flex flex-col md:flex-row lg:flex-row mb-6 gap-2">
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >ID NO.</label>
                                <div class="flex flex-col">
                                    <input type="text" name="id_no" id="id_no" class="user-form-input" value="{{ $teacher->id_no }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Emp. No.</label>
                                <div class="flex flex-col">
                                    <input type="text" name="emp_no" id="emp_no" class="user-form-input" value="{{ $teacher->emp_no }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Designation</label>
                                <div class="flex flex-col">
                                    <input type="text" name="designation" id="designation" class="user-form-input" value="{{ $teacher->designation }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Position</label>
                                <div class="flex flex-col">
                                    @include('ext._attach_position')
                                </div>
                            </div>
                        </div>

                        <hr class="mt-12 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Contact Information
                        </h6>
                        <div class="w-full flex flex-col md:flex-row lg:flex-row mb-6 gap-2">
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Current Postal Address</label>
                                <div class="flex flex-col">
                                    <input type="text" name="current_address" id="current_address" class="user-form-input" value="{{ $teacher->current_address }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Permanent Postal Address</label>
                                <div class="flex flex-col">
                                    <input type="text" name="permanent_address" id="permanent_address" class="user-form-input" value="{{ $teacher->permanent_address }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Email</label>
                                <div class="flex flex-col">
                                    <input type="text" name="email" id="email" class="user-form-input" value="{{ $teacher->user->email }}">
                                </div>
                            </div> 
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Phone No.</label>
                                <div class="flex flex-col">
                                    <input type="text" name="phone_no" id="phone_no" class="user-form-input" value="{{ $teacher->phone_no }}" required>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-12 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            More Information
                        </h6>
                        <div class="w-full flex flex-col md:flex-row lg:flex-row mt-8 mb-2 gap-2">
                            <div class="w-full">
                                <label class="control-label col-sm-2" >More Information</label>
                                <div class="flex flex-col">
                                    <textarea class="form-control" id="summary-ckeditor" name="history">{!! $teacher->history !!}</textarea>
                                </div>
                            </div>
                        </div> 