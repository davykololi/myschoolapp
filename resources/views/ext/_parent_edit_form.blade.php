                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title: <span class="text-danger">*</span></label>
                                <input value="{{ $parent->title }}" type="text" name="title" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name: <span class="text-danger">*</span></label>
                                <input value="{{ $parent->name }}" type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Postal Address: <span class="text-danger">*</span></label>
                                <input value="{{ $parent->address }}" class="form-control" name="address" type="text">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email Address: <span class="text-danger">*</span></label>
                                <input type="email" value="{{ $parent->email }}" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">Gender: <span class="text-danger">*</span></label>
                                <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    <option {{ ($parent->gender  == 'Male' ? 'selected' : '') }} value="Male">Male</option>
                                    <option {{ ($parent->gender  == 'Female' ? 'selected' : '') }} value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Phone: <span class="text-danger">*</span></label>
                                <input value="{{ $parent->phone_no }}" type="text" name="phone_no" class="form-control">
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Date of Birth: <span class="text-danger">*</span></label>
                                <input name="dob" value="{{ $parent->dob }}" type="date" class="form-control date-pick">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Blood Group: <span class="text-danger">*</span></label>
                                @include('ext._blood_group_div')
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
                                <input value="{{ $parent->id_no }}" type="text" name="id_no" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Employment Number: <span class="text-danger">*</span></label>
                                <input value="{{ $parent->emp_no }}" type="text" name="emp_no" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Profession: <span class="text-danger">*</span></label>
                                <input value="{{ $parent->designation }}" class="form-control" name="designation" type="text">
                            </div>
                        </div>
                    </div>

                    