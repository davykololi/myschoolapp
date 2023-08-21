<footer>
	<hr class="landscape_hr_bottom"/>
	<p>
		<b style="text-align: left;margin-left: 160px;justify-content: left;">School Motto:</b> <i>{{Auth::user()->school->motto}}</i>
	</p>
	<img src="data:image/png;base64,{!! base64_encode(QrCode::size(150)->generate($title)) !!}" align="right" style="margin-right: 120px; margin-top: -70px;">
</footer>