<footer>
	<hr class="landscape_hr_bottom"/>
	<p style="width: 100%;">
		<span>
			<b style="text-align: left;margin-left: 80px;justify-content: left;">School Motto:</b> 
			<i class="blue">{{Auth::user()->school->motto}}</i>
		</span>
		<span style="float: right;margin-right: 400px;"><b>Year:</b> <i class="blue">{{ date('Y') }}</i></span>
	</p>
	<img src="data:image/png;base64,{!! base64_encode(QrCode::size(120)->generate($downloadTitle)) !!}" align="right" style="margin-right: 80px; margin-top: -70px;">
</footer>