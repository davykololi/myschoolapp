<header>
	<img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/storage/storage/'.$school->image))) !!}" width="150px" height="150px" align="left" style="margin-left: 80px;margin-right: auto;margin-top: 15px;">
	<h1 class="uc center" style="color:midnightblue;">{{ Auth::user()->school->name }}</h1>
	<h3 class="school_margin center">{{ Auth::user()->school->postal_address }}</h3>
	<a href=""><p class="email_margin center"><i>{{ Auth::user()->school->email }}</i></p></a>
	<hr class="landscape_hr_top"/>
</header>
<br/>
