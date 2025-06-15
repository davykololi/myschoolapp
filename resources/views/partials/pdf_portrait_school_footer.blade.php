<footer>
	<hr class="hr_portrait_bottom"/>
	<p style="text-align: left;margin-left: 110px;margin-right: 110px;font-size: 16px;width: 100%;">
		<span style="text-align:left;" class="mr"><b>School Motto:</b> <i class="blue">{{Auth::user()->school->motto}}</i></span>
		<span class="pull-right mr"><b style="margin-left: 550px;">Year:</b> <i class="blue">{{ date('Y') }}</i></span>
	</p>
	<img src="data:image/png;base64,{!! base64_encode(QrCode::size(100)->generate($downloadTitle)) !!}" align="right" style="margin-right: 111px; margin-top: -50px;">
</footer>