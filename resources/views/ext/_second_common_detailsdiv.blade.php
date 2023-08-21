                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2 my-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label>ID Number: <span class="text-danger">*</span></label>
                                <input value="{{ old('id_no') }}" type="text" name="id_no" placeholder="ID Number" class="form-control">
                                @error('id_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label>Employment Number: <span class="text-danger">*</span></label>
                                <input value="{{ old('emp_no') }}" type="text" name="emp_no" placeholder="Employment Number" class="form-control">
                                @error('emp_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label>Profession: <span class="text-danger">*</span></label>
                                <input value="{{ old('designation') }}" class="form-control" placeholder="designation" name="designation" type="text">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    