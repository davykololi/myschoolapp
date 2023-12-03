                                    {!! html()->multiselect('meetings[]',$meetings,old('meetings'),['class'=>'flex-grow','multiple'=>'multiple']) !!}
                                    @error('meetings')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                