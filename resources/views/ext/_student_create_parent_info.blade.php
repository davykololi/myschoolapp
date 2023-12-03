                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one" for="student_role">
                                        Mothers Name: 
                                    </label>
                                    <input value="{{ old('mothers_name') }}" type="text" name="mothers_name" class="form-input-one" placeholder="Mother's Name">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Mother's Phone Number:</label>
                                    <input value="{{ old('mothers_phone_number') }}" type="text" name="mothers_phone_number" class="form-input-one" placeholder="Mother's Phone Number">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Mother's National ID:</label>
                                    <input value="{{ old('mothers_national_id') }}" type="text" name="mothers_national_id" class="form-input-one" placeholder="Mother's ID">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Mother's Occupation: </label>
                                    <input value="{{ old('mothers_occupation') }}" type="text" name="mothers_occupation" class="form-input-one" placeholder="Mother's Occupation">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Mothers's Designation:</label>
                                    <input value="{{ old('mothers_designation') }}" type="text" name="mothers_designation" class="form-input-one" placeholder="Mother's Designation">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Mother's Annual Income:</label>
                                    <input value="{{ old('mothers_annual_income') }}" type="number" name="mothers_annual_income" class="form-input-one" placeholder="Mother's Income" min="0">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Father's Name:</label>
                                    <input value="{{ old('fathers_name') }}" type="text" name="fathers_name" class="form-input-one" placeholder="Father's Name">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Father's Phone Number:</label>
                                    <input value="{{ old('fathers_phone_number') }}" type="text" name="fathers_phone_number" class="form-input-one" placeholder="Father's Phone Number">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Father's National ID:</label>
                                    <input value="{{ old('fathers_national_id') }}" type="text" name="fathers_national_id" class="form-input-one" placeholder="Father's ID">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Father's Occupation:</label>
                                    <input value="{{ old('fathers_occupation') }}" type="text" name="fathers_occupation" class="form-input-one" placeholder="Father's Occupation">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Father's Designation:</label>
                                    <input value="{{ old('fathers_designation') }}" type="text" name="fathers_designation" class="form-input-one" placeholder="Father's Designation">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Father's Annual Income:</label>
                                    <input value="{{ old('fathers_annual_income') }}" type="number" name="fathers_annual_income" class="form-input-one" placeholder="Father's Income" min="0">
                                </div>
                            </div>
                        </div>
            
                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Guardian Name:</label>
                                    <input value="{{ old('guardian_name') }}" type="text" name="guardian_name" class="form-input-one" placeholder="Guardian's Name">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Guardian Relationship:</label>
                                    <input value="{{ old('guardian_relationship') }}" type="text" name="guardian_relationship" class="form-input-one" placeholder="Guardian's Relationship">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Guardian Phone Number:</label>
                                    <input value="{{ old('guardian_phone_number') }}" type="text" name="guardian_phone_number" class="form-input-one" placeholder="Guardian's Phone Number">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Guardian Occupation:</label>
                                    <input value="{{ old('guardian_occupation') }}" type="text" name="guardian_occupation" class="form-input-one" placeholder="Guardian's Occupation">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Home Email Address:</label>
                                    <input value="{{ old('home_email_address') }}" type="text" name="home_email_address" class="form-input-one" placeholder="Home's Email">
                                </div>
                            </div>

                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Home Postal Address:</label>
                                    <input value="{{ old('home_postal_address') }}" type="text" name="home_postal_address" class="form-input-one" placeholder="Home's Postal Address">
                                </div>
                            </div>
                        </div>