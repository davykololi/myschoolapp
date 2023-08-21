                    <div class="w-full flex flex-col md:flex-row lg:flex-row pb-4 gap-2">
                        <div class="w-full md:1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label>Salutation: <span class="text-danger">*</span></label>
                                <input value="{{ $teacher->salutation }}" type="text" name="salutation" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label>First Name: <span class="text-danger">*</span></label>
                                <input value="{{ $teacher->first_name }}" type="text" name="first_name" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label>Middle Name: <span class="text-danger">*</span></label>
                                <input value="{{ $teacher->middle_name }}" type="text" name="middle_name" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label>Last Name: <span class="text-danger">*</span></label>
                                <input value="{{ $teacher->last_name }}" type="text" name="last_name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col md:flex-row lg:flex-row pb-4 gap-2">
                        <div class="w-full md:1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label>Postal Address: <span class="text-danger">*</span></label>
                                <input value="{{ $teacher->address }}" class="form-control" name="address" type="text">
                            </div>
                        </div>

                        <div class="w-full md:1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label>Email Address: <span class="text-danger">*</span></label>
                                <input type="email" value="{{ $teacher->email }}" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="w-full md:1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label>Phone: <span class="text-danger">*</span></label>
                                <input value="{{ $teacher->phone_no }}" type="text" name="phone_no" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col md:flex-row lg:flex-row pb-4 gap-2">
                        <div class="w-full md:1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label>Date of Birth: <span class="text-danger">*</span></label>
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input name="dob" value="{{ $teacher->dob }}" type="text" class="form-control">
                                </div>
                                @error('dob')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label for="gender">Gender: <span class="text-danger">*</span></label>
                                <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    <option {{ ($teacher->gender  == 'Male' ? 'selected' : '') }} value="Male">Male</option>
                                    <option {{ ($teacher->gender  == 'Female' ? 'selected' : '') }} value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label>Blood Group: <span class="text-danger">*</span></label>
                                @include('ext._attach_blood_group')
                            </div>
                        </div>
                        <div class="w-full md:1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label class="d-block">Upload Passport Photo:<span class="text-danger">*</span></label>
                                <input value="{{ old('image') }}" accept="image/*" type="file" name="image" class="form-input-styled" data-fouc>
                                <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col md:flex-row lg:flex-row pb-4 gap-2">
                        <div class="w-full md:1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label>ID Number: <span class="text-danger">*</span></label>
                                <input value="{{ $teacher->id_no }}" type="text" name="id_no" class="form-control">
                            </div>
                        </div>

                        <div class="w-full md:1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label>Employment Number: <span class="text-danger">*</span></label>
                                <input value="{{ $teacher->emp_no }}" type="text" name="emp_no" class="form-control">
                            </div>
                        </div>

                        <div class="w-full md:1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label>Profession: <span class="text-danger">*</span></label>
                                <input value="{{ $teacher->designation }}" class="form-control" name="designation" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row pb-4 gap-2">
                        <div class="w-full">
                            <div class="flex flex-col">
                                <label>History: <span class="text-danger">*</span></label>
                                <textarea name="history" rows="5" cols="40" class="form-control" id="summary-ckeditor">
                                    {!! $teacher->history !!}
                                </textarea>
                            </div>
                        </div>
                    </div>