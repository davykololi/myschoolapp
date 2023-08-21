                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('Attach Departments:') }}</label>
                                    {!! html()->multiselect('departments[]',$departments,old('departments'),['class'=>'form-control','multiple'=>'multiple']) !!}
                                    @error('departments')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                        