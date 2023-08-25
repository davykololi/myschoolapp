                    <div class="flex flex-col md:flex-row lg:flex-row">
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Salutation
                                </label>
                                <input type="text" name="salutation" class="form-input-one" placeholder="Mr., Mrs. Dr. Pst. Rev.">
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
                                <input type="text" name="first_name" class="form-input-one" placeholder="First Name">
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
                                <input type="text" name="middle_name" class="form-input-one" placeholder="Middle Name">
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
                                <input type="text" name="last_name" class="form-input-one" placeholder="Last Name">
                                @error('last_name')
                                    <span class="text-[red]">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row lg:flex-row">
                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Gender
                                </label>
                                <select class="form-input-one" id="gender" name="gender" data-fouc data-placeholder="Choose..">
                                    <option value="">Select Gender</option>
                                    <option {{ (old('gender') == "Male") ? 'selected' : '' }} value="Male">Male</option>
                                    <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                    <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Other</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Date Of Birth
                                </label>
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="dob" class="form-input-one" placeholder="Select Date">
                                </div>
                                @error('dob')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Upload Photo
                                </label>
                                <input type="file" name="image" class="form-input-one-photo-upload">
                                <span class="italic font-hairline text-sm">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300">

                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Contact Information
                    </h6>
                    <div class="flex flex-col md:flex-row lg:flex-row">
                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Address
                                </label>
                                <input type="text" name="address" class="form-input-one" placeholder="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Phone
                                </label>
                                <input type="text" name="phone_no" class="form-input-one" placeholder="+254 720********">
                                @error('phone_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Email
                                </label>
                                <input type="email" class="form-input-one" placeholder="example@gmail.com">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Genetical Information
                    </h6>                
                    <div class="flex flex-col md:flex-row lg:flex-row">
                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">
                                    Blood Group
                                </label>
                                @include('ext._attach_blood_group')
                            </div>
                        </div>
                    </div>
