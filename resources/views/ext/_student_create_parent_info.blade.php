                <div class="mt-4 px-4 md:px-8 lg:px-8 my-4 py-2"> <!-- Start of parent guardian information -->
                    <h2 class="uppercase text-center font-bold text-2xl underline">Parent/Guardian Information</h2>
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