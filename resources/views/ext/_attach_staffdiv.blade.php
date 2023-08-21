                                    {!! html()->multiselect('staffs[]',$staffs,old('staffs'),['class'=>'flex-grow','multiple'=>'multiple']) !!}
                                    @error('staffs')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror