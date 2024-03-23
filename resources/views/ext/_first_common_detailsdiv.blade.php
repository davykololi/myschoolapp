                    <hr class="mt-6 border-b-1 border-blueGray-300">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Personal Information
                    </h6>
                    <div class="flex flex-col md:flex-row lg:flex-row mb-4">
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Salutation
                                </label>
                                <input type="text" name="salutation" class="user-form-input" value="{{old('salutation')}}" placeholder="Mr. Mrs. Dr. Pst. Rev.">
                                @error('salutation')
                                <span class="text-[red]">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    First Name
                                </label>
                                <input type="text" name="first_name" class="user-form-input" value="{{old('first_name')}}" placeholder="First Name">
                                @error('first_name')
                                    <span class="text-[red]">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Middle Name
                                </label>
                                <input type="text" name="middle_name" class="user-form-input" value="{{old('middle_name')}}" placeholder="Middle Name">
                                @error('middle_name')
                                    <span class="text-[red]">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Last Name
                                </label>
                                <input type="text" name="last_name" class="user-form-input" value="{{old('last_name')}}" placeholder="Last Name">
                                @error('last_name')
                                    <span class="text-[red]">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row lg:flex-row mb-4">
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Upload Photo
                                </label>
                                <input type="file" name="image" class="user-form-input" value="{{old('image')}}">
                                <span class="italic font-hairline text-sm">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Gender
                                </label>
                                <select class="form-input-one" id="gender" name="gender" data-te-select-size="sm" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Gender">
                                    <option {{ (old('gender') == "Male") ? 'selected' : '' }} value="Male">Male</option>
                                    <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                    <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Other</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Date Of Birth
                                </label>
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="dob" class="user-form-input" value="{{old('dob')}}" placeholder="Select Date">
                                </div>
                                @error('dob')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Blood Group
                                </label>
                                @include('ext._attach_blood_group')
                            </div>
                        </div>
                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Contact Information
                    </h6>
                    <div class="flex flex-col md:flex-row lg:flex-row mb-4">
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Current Postal Address
                                </label>
                                <input type="text" name="current_address" class="user-form-input" value="{{old('current_address')}}" placeholder="Current Address">
                                @error('current_address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Permanent Postal Address
                                </label>
                                <input type="text" name="permanent_address" class="user-form-input" value="{{old('permanent_address')}}" placeholder="Permanent Address">
                                @error('permanent_address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Phone
                                </label>
                                <input type="text" name="phone_no" class="user-form-input" value="{{old('phone_no')}}" placeholder="+254 720********">
                                @error('phone_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Email
                                </label>
                                <input type="email" name="email" class="user-form-input" value="{{old('email')}}" placeholder="example@gmail.com">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
