                        <div class="mb-4 text-center">
                            <div class="col-md-6">
                                <input id="code" type="text" class="bg-transparent focus:bg-white dark:text-slate-400 dark:focus:text-slate-400 dark:focus:bg-slate-900" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus placeholder="__ __ __ __">
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>