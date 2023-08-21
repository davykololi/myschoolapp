                <div class="mt-4 px-4 md:px-8 lg:px-8 border-2 my-4 py-2">
                    <h2 class="uppercase text-center font-bold">Personal Details</h2>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Title: <span class="text-danger">*</span></label>
                                <input value="{{ $student->salutation }}" type="text" name="salutation" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label class="">First Name: <span class="text-danger">*</span></label>
                                <input value="{{ $student->first_name }}" type="text" name="first_name" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Middle Name: <span class="text-danger">*</span></label>
                                <input value="{{ $student->middle_name }}" type="text" name="middle_name" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Last Name: <span class="text-danger">*</span></label>
                                <input value="{{ $student->last_name }}" type="text" name="last_name" class="form-control">
                            </div>
                        </div>
                    </div>

                

                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Date Of Birth:</label>
                                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input name="dob" value="{{ $student->dob }}" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 flex-grow" placeholder="Select a date"/>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label for="gender">Gender: <span class="text-danger">*</span></label>
                                <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    <option {{ ($student->gender  == 'Male' ? 'selected' : '') }} value="Male">Male</option>
                                    <option {{ ($student->gender  == 'Female' ? 'selected' : '') }} value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Blood Group: <span class="text-danger">*</span></label>
                                @include('ext._attach_blood_group')
                                @error('blood_group')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Religion: <span class="text-danger">*</span></label>
                                <input value="{{ old('religion') }}" type="text" name="religion" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Email address: </label>
                                <input type="email" value="{{ $student->email }}" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Phone:</label>
                                <input value="{{ $student->phone_no }}" type="text" name="phone_no" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label class="d-block">Upload Passport Photo:</label>
                                <input value="{{ old('image') }}" accept="image/*" type="file" name="image" class="form-input-styled" data-fouc>
                                <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label for="student_role">Parent: </label>
                                @include('ext._attach_parentdiv')
                            </div>
                        </div>
                    </div>
                </div><!-- End of Personal Details -->

                <div class="mt-4 px-4 md:px-8 lg:px-8 border-2 my-4 py-2"> <!-- Start of School Details -->
                    <h2 class="uppercase text-center font-bold">School Based Details</h2>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Date of Admission: <span class="text-danger">*</span></label>
                                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input value="{{ $student->doa }}" type="text" name="doa" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" placeholder="Select a date"/>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Admission Number: <span class="text-danger">*</span></label>
                                <input value="{{ $student->admission_no }}" type="text" name="admission_no" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Marks Attained: <span class="text-danger">*</span></label>
                                <input value="{{ $student->adm_mark }}" type="number" min="{{ $student->adm_mark}}" name="adm_mark" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Stream: <span class="text-danger">*</span></label>
                                @include('ext._get_streams_ids')
                            </div>
                        </div>

                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label for="gender">Intake: <span class="text-danger">*</span></label>
                                @include('ext._attach_intakediv')
                            </div>
                        </div>

                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Dormitory: <span class="text-danger">*</span></label>
                                @include('ext._attach_dormitorydiv')
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Student Role: <span class="text-danger">*</span></label>
                                @include('ext._attach_student_role')
                            </div>
                        </div>
                    </div>
                </div> <!-- End of school based details -->

                <div class="mt-4 px-4 md:px-8 lg:px-8 border-2 my-4 py-2"> <!-- Start of parent guardian information -->
                    <h2 class="uppercase text-center font-bold">Parent/Guardian Information</h2>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Mother's Name: <span class="text-danger">*</span></label>
                                <input value="{{ old('mothers_name') }}" type="text" name="mothers_name" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Mother's Phone Number: <span class="text-danger">*</span></label>
                                <input value="{{ old('mothers_phone_number') }}" type="text" name="mothers_phone_number" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Mother's National ID: <span class="text-danger">*</span></label>
                                <input value="{{ old('mothers_national_id') }}" type="text" name="mothers_national_id" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Mother's Occupation: <span class="text-danger">*</span></label>
                                <input value="{{ old('mothers_occupation') }}" type="text" name="mothers_occupation" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Mothers's Designation: <span class="text-danger">*</span></label>
                                <input value="{{ old('mothers_designation') }}" type="text" name="mothers_designation" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Mother's Annual Income: <span class="text-danger">*</span></label>
                                <input value="{{ old('mothers_annual_income') }}" type="number" name="mothers_annual_income" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Father's Name: <span class="text-danger">*</span></label>
                                <input value="{{ old('fathers_name') }}" type="text" name="fathers_name" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Father's Phone Number: <span class="text-danger">*</span></label>
                                <input value="{{ old('fathers_phone_number') }}" type="text" name="fathers_phone_number" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Father's National ID: <span class="text-danger">*</span></label>
                                <input value="{{ old('fathers_national_id') }}" type="text" name="fathers_national_id" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Father's Occupation: <span class="text-danger">*</span></label>
                                <input value="{{ old('fathers_occupation') }}" type="text" name="fathers_occupation" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Father's Designation: <span class="text-danger">*</span></label>
                                <input value="{{ old('fathers_designation') }}" type="text" name="fathers_designation" class="form-control">
                            </div>
                        </div>

                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Father's Annual Income: <span class="text-danger">*</span></label>
                                <input value="{{ old('fathers_annual_income') }}" type="number" name="fathers_annual_income" class="form-control">
                            </div>
                        </div>
                    </div>
            
                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Guardian Name: <span class="text-danger">*</span></label>
                                <input value="{{ old('guardian_name') }}" type="text" name="guardian_name" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Guardian Relationship: <span class="text-danger">*</span></label>
                                <input value="{{ old('guardian_relationship') }}" type="text" name="guardian_relationship" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Guardian Phone Number: <span class="text-danger">*</span></label>
                                <input value="{{ old('guardian_phone_number') }}" type="text" name="guardian_phone_number" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:1/4">
                            <div class="flex flex-col">
                                <label>Guardian Occupation: <span class="text-danger">*</span></label>
                                <input value="{{ old('guardian_occupation') }}" type="text" name="guardian_occupation" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Home Email Address: <span class="text-danger">*</span></label>
                                <input value="{{ old('home_email_address') }}" type="text" name="home_email_address" class="w-[220px]">
                            </div>
                        </div>

                        <div class="w-full md:1/3 lg:1/3">
                            <div class="flex flex-col">
                                <label>Home Postal Address: <span class="text-danger">*</span></label>
                                <input value="{{ old('home_postal_address') }}" type="text" name="home_postal_address" class="w-[220px]">
                            </div>
                        </div>
                    </div>
                </div>