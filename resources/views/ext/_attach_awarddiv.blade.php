                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('Attach Awards:') }}</label>
                                    {{ html()->multiselect('rewards[]',$rewards,old('rewards'),['class'=>'form-control','multiple'=>'multiple']) }}
                                    @error('rewards')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>