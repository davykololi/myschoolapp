                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <input id="password" type="password" class="form-input-one @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <input id="password-confirm" type="password" class="form-input-one" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>