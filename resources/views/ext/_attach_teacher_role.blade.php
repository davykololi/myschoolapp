                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('Teacher Roles:') }}</label>
                                    {!! html()->multiselect('roles[]',$roles,old('roles'),['class'=>'form-control','multiple'=>'multiple']) !!}
                                    @error('roles')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>