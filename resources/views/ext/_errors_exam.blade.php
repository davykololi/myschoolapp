							@if($errors->has('exam'))
                                <span class="help-block">
                                    <strong>{{$errors->first('exam')}}</strong>
                                </span>
                            @endif