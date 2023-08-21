                                    {!! html()->multiselect('clubs[]',$clubs,old('clubs'),['class'=>'flex-grow','multiple'=>'multiple']) !!}
                                    @error('clubs')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror