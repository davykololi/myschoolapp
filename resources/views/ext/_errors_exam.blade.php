							@if($errors->has('exam'))
                                <span class="text-[red]">
                                    <strong>{{$errors->first('exam')}}</strong>
                                </span>
                            @endif