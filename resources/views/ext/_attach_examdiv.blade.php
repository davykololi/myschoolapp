                                    {!! html()->multiselect('exams[]',$exams,old('exams'),['class'=>'flex-grow','multiple'=>'multiple']) !!}
                                    @error('exams')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                