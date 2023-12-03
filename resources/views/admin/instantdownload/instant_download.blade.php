<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
            <div>
                <h5 class="uppercase text-center text-2xl font-hairline">INSTANT PDF GENERATION</h5> 
                <x-back-button/>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.instant.download',Auth::user()->school->id) }}" method="get" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Content</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="content" id="summary-ckeditor" rows="10" cols="70" class="prose"></textarea>
                        </div>
                    </div>
                    <div class="w-full">
                    <div class="mt-4">
                        <x-generate-button/>
                    </div>
            </div>
                </form>
            </div>   
  </x-backend-main>
</div>  
</x-admin>







