<footer>
	<hr class="hr_portrait_bottom"/>
	<p style="text-align: left;margin-left: 100px;font-size: 16px;">
		<b>School Motto:</b> <i>{{Auth::user()->school->motto}}</i>
	</p>
		<img src="data:image/png;base64,{!! base64_encode(QrCode::size(80)->generate($title.' '.$markName.' '.'OVERAL POSITION:'.''.$overalPosition.' '.'STREAM POSITION:'.''.$streamPosition)) !!}" align="right" style="margin-right: 100px; margin-top: -50px;">
</footer>