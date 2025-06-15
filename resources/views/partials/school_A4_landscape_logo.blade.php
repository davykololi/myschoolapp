<div id="landscape_logo">
	@if(Auth::user()->school->image === 'image.png')
	<img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/static/school_logo.png'))) !!}" width="600px" height="600px">
	@else
	<img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/storage/storage/'.$school->image))) !!}" width="600px" height="600px">
	@endif
</div>