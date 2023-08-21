                                    {{ html()->multiselect('streams[]',$streams,old('streams'),['class'=>'flex flex-grow','multiple'=>'multiple']) }}
                                    @error('streams')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            