                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('Attach Assignments:') }}</label>
                                    {{ html()->multiselect('assignments[]',$assignments,old('assignments'),['class'=>'form-control','multiple'=>'multiple']) }}
                                    @error('assignments')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>