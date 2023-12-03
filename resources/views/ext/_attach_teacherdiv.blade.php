                                    {!! html()->multiselect('teachers[]',$teachers,old('teachers'),['class'=>'','multiple'=>'multiple']) !!}
                                    @error('teachers')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror

