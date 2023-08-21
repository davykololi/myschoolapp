                                    {{ html()->multiselect('students[]',$students,old('students'),['class'=>'bg-blue-800','multiple'=>'multiple']) }}
                                    @error('students')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                