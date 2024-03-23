<footer>
	<hr class="hr_receipt_bottom" style="margin-top:5px;" />
	<hr class="hr_portrait_bottom"/>
	<p style="text-align: left;margin-left: 110px;margin-right: 110px;font-size: 16px;width: 100%;">
		<span style="text-align:left;"><b>School Motto:</b> <i class="blue">{{Auth::user()->school->motto}}</i></span>
		<span class="pull-right"><b style="margin-left: 400px;">Year:</b> <i class="blue">{{ date('Y') }}</i></span>
	</p>
</footer>