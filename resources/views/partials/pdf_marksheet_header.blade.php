<header>
	<img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/storage/storage/'.$school->image))) !!}" width="150px" height="150px" align="left" style="margin-left: 100px;margin-right: auto;margin-top: 21px;">
	<h1 class="uc main-heading">{{ Auth::user()->school->name }}</h1>
	<p class="postal-mt uc">{{ Auth::user()->school->postal_address }}</p>
	<p class="school_margin"><span class="uc">Tel:</span> {{ Auth::user()->school->phone_no }}</p>
	<p class="email_margin"><span class="uc">Email:</span> <i><a href="#">{{ Auth::user()->school->email }}</a></i></p>
	<hr class="landscape_hr_top"/>
</header>
<br/>
