<header>
	<img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/storage/storage/'.Auth::user()->school->image))) !!}" width="120px" height="120px" align="left" style="margin-left: 100px;margin-right: auto;margin-top: 15px;">
	<h1 class="uc center">{{ Auth::user()->school->name }}</h1>
	<h3 class="school_margin center">{{ Auth::user()->school->postal_address }}</h3>
	<a href=""><p class="email_margin center"><i><u>{{ Auth::user()->school->email }}</u></i></p></a>
	<hr style="width: 85%;border-top: 10px groove brown;margin-top: -10px;"/>
</header>
