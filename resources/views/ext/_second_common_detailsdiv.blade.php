                    <hr class="mt-6 border-b-1 border-blueGray-300">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Identification Details
                    </h6>
                    <div class="flex flex-col md:flex-row lg:flex-row">
                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one" htmlfor="grid-password">ID Number</label>
                                <input value="{{ old('id_no') }}" type="text" name="id_no" placeholder="ID Number" class="form-input-one">
                                @error('id_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one">Employment Number:</label>
                                <input value="{{ old('emp_no') }}" type="text" name="emp_no" placeholder="Employment Number" class="form-input-one">
                                @error('emp_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                            <div class="relative w-full mb-3">
                                <label class="form-input-label-one">Profession:</label>
                                <input value="{{ old('designation') }}" class="form-input-one" placeholder="designation" name="Designation" type="text">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    