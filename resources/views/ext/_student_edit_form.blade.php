                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title: <span class="text-danger">*</span></label>
                                <input value="{{ $student->title }}" type="text" name="title" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name: <span class="text-danger">*</span></label>
                                <input value="{{ $student->name }}" type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Address: <span class="text-danger">*</span></label>
                                <input value="{{ $student->address }}" class="form-control" name="address" type="text">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email address: </label>
                                <input type="email" value="{{ $student->email }}" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">Gender: <span class="text-danger">*</span></label>
                                <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    <option {{ ($student->gender  == 'Male' ? 'selected' : '') }} value="Male">Male</option>
                                    <option {{ ($student->gender  == 'Female' ? 'selected' : '') }} value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Phone:</label>
                                <input value="{{ $student->phone_no }}" type="text" name="phone_no" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Date Of Birth:</label>
                                <input name="dob" value="{{ $student->dob }}" type="date" class="form-control date-pick">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="d-block">Upload Passport Photo:</label>
                                <input value="{{ old('image') }}" accept="image/*" type="file" name="image" class="form-input-styled" data-fouc>
                                <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Blood Group: <span class="text-danger">*</span></label>
                                @include('ext._blood_group_div')
                                @error('blood_group')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Parent/Gurdian: <span class="text-danger">*</span></label>
                                @include('ext._attach_parentdiv')
                                @error('parent')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date of Admission: <span class="text-danger">*</span></label>
                                <input value="{{ $student->doa }}" type="text" name="doa" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Admission Number: <span class="text-danger">*</span></label>
                                <input value="{{ $student->admission_no }}" type="text" name="admission_no" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Student Role: <span class="text-danger">*</span></label>
                                @include('ext._attach_student_rolediv')
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Class: <span class="text-danger">*</span></label>
                                @include('ext._attach_streamdiv')
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">Intake: <span class="text-danger">*</span></label>
                                @include('ext._attach_intakediv')
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Dormitory: <span class="text-danger">*</span></label>
                                @include('ext._attach_dormitorydiv')
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>History: <span class="text-danger">*</span></label>
                                <textarea name="history" rows="5" cols="40" class="form-control" id="summary-ckeditor">
                                    {!! $student->history !!}
                                </textarea>
                            </div>
                        </div>
                    </div>