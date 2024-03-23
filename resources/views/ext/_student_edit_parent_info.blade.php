                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one" for="student_role">
                                        Mothers Name: 
                                    </label>
                                    <input value="{{ $student->student_info->mothers_name }}" type="text" name="mothers_name" class="form-input-one">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Mother's Phone Number:</label>
                                    <input value="{{ $student->student_info->mothers_phone_number }}" type="text" name="mothers_phone_number" class="form-input-one">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Mother's National ID:</label>
                                    <input value="{{ $student->student_info->mothers_national_id }}" type="text" name="mothers_national_id" class="form-input-one">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Mother's Occupation: </label>
                                    <input value="{{ $student->student_info->mothers_occupation }}" type="text" name="mothers_occupation" class="form-input-one">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Mothers's Designation:</label>
                                    <input value="{{ $student->student_info->mothers_designation }}" type="text" name="mothers_designation" class="form-input-one">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Mother's Annual Income:</label>
                                    <input value="{{ $student->student_info->mothers_annual_income }}" type="number" name="mothers_annual_income" class="form-input-one" min="0">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Father's Name:</label>
                                    <input value="{{ $student->student_info->fathers_name }}" type="text" name="fathers_name" class="form-input-one">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Father's Phone Number:</label>
                                    <input value="{{ $student->student_info->fathers_phone_no }}" type="text" name="fathers_phone_number" class="form-input-one">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Father's National ID:</label>
                                    <input value="{{ $student->student_info->fathers_national_id }}" type="text" name="fathers_national_id" class="form-input-one">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Father's Occupation:</label>
                                    <input value="{{ $student->student_info->fathers_occupation }}" type="text" name="fathers_occupation" class="form-input-one">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Father's Designation:</label>
                                    <input value="{{ $student->student_info->fathers_designation }}" type="text" name="fathers_designation" class="form-input-one">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Father's Annual Income:</label>
                                    <input value="{{ $student->student_info->fathers_annual_income }}" type="number" name="fathers_annual_income" class="form-input-one" min="0">
                                </div>
                            </div>
                        </div>
            
                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Guardian Name:</label>
                                    <input value="{{ $student->student_info->guardian_name }}" type="text" name="guardian_name" class="form-input-one">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Guardian Relationship:</label>
                                    <input value="{{ $student->student_info->guardian_relationship }}" type="text" name="guardian_relationship" class="form-input-one">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Guardian Phone Number:</label>
                                    <input value="{{ $student->student_info->guardian_phone_number }}" type="text" name="guardian_phone_number" class="form-input-one">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Guardian Occupation:</label>
                                    <input value="{{ $student->student_info->guardian_occupation }}" type="text" name="guardian_occupation" class="form-input-one">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Home Email Address:</label>
                                    <input value="{{ $student->student_info->home_email_address }}" type="text" name="home_email_address" class="form-input-one">
                                </div>
                            </div>

                            <div class="w-full md:w-1/3 lg:w-1/3">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Home Postal Address:</label>
                                    <input value="{{ $student->student_info->home_postal_address }}" type="text" name="home_postal_address" class="form-input-one">
                                </div>
                            </div>
                        </div>