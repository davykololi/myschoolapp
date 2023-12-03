                    <div class="form-group">
                        <label class="control-label col-sm-2" >Category</label>
                        <div class="col-md-10">
                            <select id="subject_category" type="subject_category" value="{{old('subject_category')}}" class="form-control" name="subject_category">
                                <option value="">Select Category</option>
                                @foreach ($subjectCategories as $key => $subjectCategory)
                                    <option value="{{$subjectCategory->id}}">{{$subjectCategory->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('subject_category'))
                                <span class="help-block">
                                    <strong>{{$errors->first('subject_category')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>