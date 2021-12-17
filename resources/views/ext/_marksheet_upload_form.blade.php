            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Year: <span class="text-danger">*</span></label>
                        @include('ext._attach_yeardiv')
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Term: <span class="text-danger">*</span></label>
                        @include('ext._attach_termdiv')
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Class: <span class="text-danger">*</span></label>
                        @include('ext._attach_classdiv')
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Exam: <span class="text-danger">*</span></label>
                        @include('ext._attach_examdiv')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Teacher: <span class="text-danger">*</span></label>
                        @include('ext._attach_teacherdiv')
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="d-block">Upload Marksheet File:<span class="text-danger">*</span></label>
                        <input type="file" name="file">
                    </div>
                </div>
            </div>