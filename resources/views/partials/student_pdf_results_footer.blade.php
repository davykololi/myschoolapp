<footer>
	<hr class="hr_portrait_bottom"/>
	<p style="text-align: left;margin-left: 110px;margin-right: 110px;font-size: 16px;width: 100%;">
		<span style="text-align:left;"><b>School Motto:</b> <i>{{Auth::user()->school->motto}}</i></span>
		<span style="text-align:right;"><b style="margin-left: 500px;">Year:</b> <i>{{ date('Y') }}</i></span>
	</p>
	<img src="data:image/png;base64,{!! base64_encode(QrCode::size(100)->generate(Auth::user()->full_name.' '.$title)) !!}" align="right" style="margin-top: -55px;margin-right: 110px;">
</footer>