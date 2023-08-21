<footer style="height: 2cm;margin-top: -100px;">
	<hr class="hr_portrait_bottom"/>
	<p style="text-align: left;margin-left: 110px;margin-right: 110px;font-size: 16px;width: 100%;">
		<span style="text-align:left;"><b>School Motto:</b> <i>{{Auth::user()->school->motto}}</i></span>
		<span style="text-align:right;"><b>Year:</b> <i>{{ date('Y') }}</i></span>
	</p>
	<span align="right" style="margin-left: 980px; margin-top: -50px;display: inline-flex;">
		<img src="data:image/png;base64,{!! base64_encode(QrCode::size(70)->generate(Auth::user()->full_name.' '.$title)) !!}" >
	</span>
</footer>