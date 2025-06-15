<header>
	<div class="container">
		<div class="row">
			<div class="cols-md-2">
				<img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/storage/storage/'.Auth::user()->school->image))) !!}" width="120px" height="120px" align="left" style="margin-left: 110px;margin-right: auto;margin-top: 22px;">
			</div>
			<div class="cols-md-10">
				<h1 class="uc main-heading">{{ Auth::user()->school->name }}</h1>
				<p class="postal-mt">{{ Auth::user()->school->postal_address }}</p>
				<p class="school_margin">Tel: {{ Auth::user()->school->phone_no }}</p>
				<p class="email_margin"><i>Email: <a href="#">{{ Auth::user()->school->email }}</a></i></p>
				<hr style="width: 82%;border-top: 10px groove brown;margin-top: -2px;"/>
				<hr style="width: 82%;border-top: 2px dashed midnightblue;margin-top: -5px;"/>
			<div>
		</div>
	</div>
</header>
