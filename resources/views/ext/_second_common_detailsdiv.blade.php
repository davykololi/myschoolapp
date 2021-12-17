                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ID Number: <span class="text-danger">*</span></label>
                                <input value="{{ old('id_no') }}" type="text" name="id_no" placeholder="ID Number" class="form-control">
                                @error('id_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Employment Number: <span class="text-danger">*</span></label>
                                <input value="{{ old('emp_no') }}" type="text" name="emp_no" placeholder="Employment Number" class="form-control">
                                @error('emp_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Profession: <span class="text-danger">*</span></label>
                                <input value="{{ old('designation') }}" class="form-control" placeholder="designation" name="designation" type="text">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    