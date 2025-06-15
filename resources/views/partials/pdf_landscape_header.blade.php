<header>
	@if(Auth::user()->school->image === 'image.png')
	<img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/static/school_logo.png'))) !!}" width="150px" height="150px" align="left" style="margin-left: 75px;margin-right: auto;margin-top: 20px;">
	@else
	<img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/storage/storage/'.$school->image))) !!}" width="150px" height="150px" align="left" style="margin-left: 75px;margin-right: auto;margin-top: 20px;">
	@endif
	<h1 class="uc main-heading">{{ Auth::user()->school->name }}</h1>
	<p class="postal-mt">{{ Auth::user()->school->postal_address }}</p>
	<p class="school_margin">Tel: {{ Auth::user()->school->phone_no }}</p>
	<p class="email_margin">Email: <i><a href="#">{{ Auth::user()->school->email }}</a></i></p>
	<hr class="landscape_hr_top"/>
</header>
<br/>
