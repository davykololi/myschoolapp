<header>
	@if(Auth::user()->school->image === "image.png")
	<img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/static/school_logo.png'))) !!}" width="120px" height="120px" align="left" style="margin-left: 110px;margin-right: auto;margin-top: 22px;">
	@else
	<img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/storage/storage/'.Auth::user()->school->image))) !!}" width="120px" height="120px" align="left" style="margin-left: 110px;margin-right: auto;margin-top: 20px;">
	@endif
	<h1 class="uc main-heading">{{ Auth::user()->school->name }}</h1>
	<div style="font-size: 18px; margin-left: 370px;line-height: 25px;margin-top: 32px;">
		<p class="postal-mt">{{ Auth::user()->school->postal_address }}</p>
		<p class="school_margin">Tel: {{ Auth::user()->school->phone_no }}</p>
		<p class="email_margin">Email: <i><a href="#">{{ Auth::user()->school->email }}</a></i></p>
	</div>
	<hr style="width: 82%;border-top: 10px groove brown;margin-top: -4px;"/>
</header>
