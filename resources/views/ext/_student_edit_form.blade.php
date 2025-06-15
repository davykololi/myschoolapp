                    <!-- Personal Information -->
                    <hr class="mt-6 border-b-1 border-blueGray-300">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Personal Information
                    </h6>
                    <div class="flex flex-col md:flex-row lg:flex-row mb-4">
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="salutation">
                                    Salutation
                                </label>
                                <input type="text" name="salutation" class="user-form-input" value="{{ $student->user->salutation }}">
                                @error('salutation')
                                <span class="text-[red]">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="first_name">
                                    First Name
                                </label>
                                <input type="text" name="first_name" class="user-form-input" value="{{ $student->user->first_name }}">
                                @error('first_name')
                                    <span class="text-[red]">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="middle_name">
                                    Middle Name
                                </label>
                                <input type="text" name="middle_name" class="user-form-input" value="{{ $student->user->middle_name }}">
                                @error('middle_name')
                                    <span class="text-[red]">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="last_name">
                                    Last Name
                                </label>
                                <input type="text" name="last_name" class="user-form-input" value="{{ $student->user->last_name }}">
                                @error('last_name')
                                    <span class="text-[red]">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row lg:flex-row mb-4">
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full">
                                <label class="form-input-label-one" htmlfor="image">
                                    Upload Photo
                                </label>
                                <input type="file" name="image" class="user-form-input" value="{{ $student->image }}">
                                <span class="italic font-hairline text-sm">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="gender">
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
                                <label class="form-input-label-one" htmlfor="dob">
                                    Date Of Birth
                                </label>
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="dob" class="user-form-input" value="{{ $student->dob }}">
                                </div>
                                @error('dob')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="blood_group">
                                    Blood Group
                                </label>
                                @include('ext._attach_blood_group')
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row lg:flex-row mb-4">
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="phone_no">
                                    Phone <i>(Optional)</i>
                                </label>
                                <input type="text" name="phone_no" class="user-form-input" value="{{ $student->phone_no }}">
                                @error('phone_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="email">
                                    Email
                                </label>
                                <input type="email" name="email" class="user-form-input" value="{{ $student->user->email }}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="stream">
                                    The Parent/Guardian
                                </label>
                                @include('ext._get_parent_id')
                            </div>
                        </div>
                    </div>


                    <hr class="mt-6 border-b-1 border-blueGray-300">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Admission Details
                    </h6>
                    <div class="flex flex-col md:flex-row lg:flex-row">
                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="stream">
                                    Stream
                                </label>
                                @include('ext._get_streams_ids')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="intake">
                                    Intake
                                </label>
                                @include('ext._attach_intakediv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="doa">
                                    Date Of Admission
                                </label>
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="doa" class="user-form-input" value="{{$student->doa }}">
                                </div>
                                @error('doa')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row lg:flex-row">
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="admission_no">
                                    Admission Number
                                </label>
                                <input type="text" name="admission_no" class="user-form-input" value="{{ $student->admission_no }}">
                                @error('admission_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="adm_mark">
                                    Admission Marks
                                </label>
                                <input type="number" name="adm_mark" min="200" class="user-form-input" value="{{ $student->adm_mark }}" placeholder="Admission Marks">
                                @error('adm_mark')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" for="position">
                                    Student Position: 
                                </label>
                                @include('ext._attach_position')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" for="dormitory">
                                    Dormitory: 
                                </label>
                                @include('ext._attach_dormitorydiv')
                            </div>
                        </div>
                    </div>

                    <!-- Extra Parent/Guardian Information About Student -->
                    <hr class="mt-6 border-b-1 border-blueGray-300">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Additional Parent/Guardian Information
                    </h6>
                    @if(!is_null($student->student_info))
                        @include('ext._student_edit_parent_info')
                    @else
                        @include('ext._student_create_parent_info')
                    @endif
                    
