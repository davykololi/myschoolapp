                    <div class="max-w-full py-2 flex flex-col md:flex-row lg:flex-row gap-2">
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label class="italic">Salutation: <span class="text-[red]">*</span></label>
                                <input value="{{ old('salutation') }}" type="text" name="salutation" placeholder="Mr./ Mrs./ Miss./ Dr./ Pst./ Rev." class="bg-gray-300 leading-tight dark:bg-gray-700">
                                @error('salutation')
                                    <span class="text-[red]">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <div class="flex flex-col ">
                                <label class="italic">First Name: <span class="text-danger">*</span></label>
                                <div class="border border-[2px] justify-center flex items-center rounded-md shadow-md">
                                    <div>
                                        <button type=" submit" class="flex items-center bg-gray-100 rounded-l-md border border-white justify-center w-12 h-12 text-white" :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'" :disabled="search.length == 0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    <input value="{{ old('first_name') }}" type="text" name="first_name" placeholder="First Name" class="leading-tight w-full h-12 px-4 py-1 rounded-r-md border border-gray-100 text-gray-800 focus:outline-none">
                                    @error('first_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label class="italic">Middle Name: <span class="text-danger">*</span></label>
                                <div class="border border-[2px] justify-center flex items-center rounded-md shadow-md">
                                    <div>
                                        <button type=" submit" class="flex items-center bg-gray-100 rounded-l-md border border-white justify-center w-12 h-12 text-white" :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'" :disabled="search.length == 0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    <input value="{{ old('middle_name') }}" type="text" name="middle_name" placeholder="Middle Name" class="leading-tight w-full h-12 px-4 py-1 rounded-r-md border border-gray-100 text-gray-800 focus:outline-none">
                                    @error('middle_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label class="italic">Last Name: <span class="text-danger">*</span></label>
                                <div class="border border-[2px] justify-center flex items-center rounded-md shadow-md">
                                    <div>
                                        <button type=" submit" class="flex items-center bg-gray-100 rounded-l-md border border-white justify-center w-12 h-12 text-white" :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'" :disabled="search.length == 0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    <input value="{{ old('last_name') }}" type="text" name="last_name" placeholder="Last Name" class="leading-tight w-full h-12 px-4 py-1 rounded-r-md border border-gray-100 text-gray-800 focus:outline-none">
                                    @error('last_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="max-w-full py-2 flex flex-col md:flex-row lg:flex-row gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="italic">Phone: <span class="text-danger">*</span></label>
                                <div class="border border-[2px] justify-center flex items-center rounded-md shadow-md">
                                    <div>
                                        <button type=" submit" class="flex items-center bg-gray-100 rounded-l-md border border-white justify-center w-12 h-12 text-white" :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'" :disabled="search.length == 0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <input value="{{ old('phone_no') }}" type="text" name="phone_no" class="leading-tight w-full h-12 px-4 py-1 rounded-r-md border border-gray-100 text-gray-800 focus:outline-none" placeholder="Mobile Number" >
                                    @error('phone_no')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="italic">Postal Address: <span class="text-danger">*</span></label>
                                <input value="{{ old('address') }}" type="text" class="leading-tight" placeholder="Postal Address" name="address">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="italic">Email: <span class="text-danger">*</span></label>
                                <div class="border border-[2px] justify-center flex items-center rounded-md shadow-md">
                                    <div>
                                        <button type=" submit" class="flex items-center bg-gray-100 rounded-l-md border border-white justify-center w-12 h-12 text-white" :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'" :disabled="search.length == 0">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.8">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.33398 4.16667C2.87756 4.16667 2.50065 4.54357 2.50065 5V15C2.50065 15.4564 2.87756 15.8333 3.33398 15.8333H16.6673C17.1238 15.8333 17.5007 15.4564 17.5007 15V5C17.5007 4.54357 17.1238 4.16667 16.6673 4.16667H3.33398ZM0.833984 5C0.833984 3.6231 1.95708 2.5 3.33398 2.5H16.6673C18.0442 2.5 19.1673 3.6231 19.1673 5V15C19.1673 16.3769 18.0442 17.5 16.6673 17.5H3.33398C1.95708 17.5 0.833984 16.3769 0.833984 15V5Z" fill="#637381"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.984696 4.52154C1.24862 4.14449 1.76823 4.0528 2.14527 4.31673L10.0007 9.81554L17.8562 4.31673C18.2332 4.0528 18.7528 4.14449 19.0167 4.52154C19.2807 4.89858 19.189 5.41818 18.8119 5.68211L10.4786 11.5154C10.1917 11.7163 9.80977 11.7163 9.52284 11.5154L1.1895 5.68211C0.812463 5.41818 0.720767 4.89858 0.984696 4.52154Z" fill="#637381"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    <input type="email" value="{{ old('email') }}" name="email" class="leading-tight w-full h-12 px-4 py-1 rounded-r-md border border-gray-100 text-gray-800 focus:outline-none" placeholder="info@yourmai.com">
                                </div>
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="max-w-full py-2 flex flex-col md:flex-row lg:flex-row gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="italic" for="gender">Gender: <span class="text-danger">*</span></label>
                                <select class="leading-tight" id="gender" name="gender" data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    <option {{ (old('gender') == "Male") ? 'selected' : '' }} value="Male">Male</option>
                                    <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="italic">Date of Birth: <span class="text-danger">*</span></label>
                                <div class="relative w-full py-1" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="dob" value="{{ old('dob')}}"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" placeholder="Select a date"/>
                                </div>
                                @error('dob')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <div class="">
                                    <label class="block text-base font-medium text-black">Upload Photo:</label>
                                    <div class="relative">
                                        <input name="image" type="file" class="w-full rounded-md border border-form-stroke  text-[#929DA7] outline-none transition file:mr-4 file:rounded file:border-[.5px] file:border-stroke file:bg-[#EEEEEE] file:py-1 file:px-[10px] file:text-sm file:font-medium focus:border-primary file:focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]">
                                        <span class="">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                    </div>
                                </div>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="max-w-full flex flex-col md:flex-row lg:flex-row gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="italic" for="blood_group">Blood Group: <span class="text-danger">*</span></label>
                                @include('ext._attach_blood_group')
                            </div>
                        </div>
                    </div>

                    
                    
                
                    