                                    {{ html()->multiselect('subjects[]',$subjects,old('subjects'),['class'=>'flex-grow','multiple'=>'multiple']) }}
                                    @error('subjects')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                