                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->salutation }}" type="salutation" name="salutation" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->first_name }}" type="text" name="first_name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Middle Name: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->middle_name }}" type="text" name="middle_name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->last_name }}" type="text" name="last_name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Postal Address: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->name }}" class="form-control" name="address" type="text">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email Address: <span class="text-danger">*</span></label>
                                <input type="email" value="{{ $staff->email }}" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">Gender: <span class="text-danger">*</span></label>
                                <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    <option {{ ($staff->gender  == 'Male' ? 'selected' : '') }} value="Male">Male</option>
                                    <option {{ ($staff->gender  == 'Female' ? 'selected' : '') }} value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Phone: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->phone_no }}" type="text" name="phone_no" class="form-control">
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Date of Birth: <span class="text-danger">*</span></label>
                                <div class="relative w-full" data-te-datepicker-init data-te-format="dd, mmm, yyyy" data-te-input-wrapper-init>
                                    <input name="dob" value="{{ $staff->dob }}" type="text" class="form-control">
                                </div>
                                @error('dob')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="d-block">Upload Passport Photo:<span class="text-danger">*</span></label>
                                <input value="{{ old('image') }}" accept="image/*" type="file" name="image" class="form-input-styled" data-fouc>
                                <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ID Number: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->id_no }}" type="text" name="id_no" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Employment Number: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->emp_no }}" type="text" name="emp_no" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Profession: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->designation }}" class="form-control" name="designation" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Blood Group: <span class="text-danger">*</span></label>
                                @include('ext._attach_blood_group')
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sub Staff Role: <span class="text-danger">*</span></label>
                                @include('ext._attach_staff_roles')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>History: <span class="text-danger">*</span></label>
                                <textarea name="history" rows="5" cols="40" class="form-control" id="summary-ckeditor">
                                    {!! $staff->history !!}
                                </textarea>
                            </div>
                        </div>
                    </div>