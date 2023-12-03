	<script src="{{ mix('js/app.js') }}"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/booststrap/4.3.1/js/booststrap.min.js"></script>
	<script type="text/php">
		if(isset($pdf)){
			$x = 600;
			$y = 780;
			$text = "Page {PAGE_NUM} of {PAGE_COUNT}";
			$font = null;
			$size = 14;
			$color = array(250,0,0);
			$word_space = 0.0; // default
			$char_space = 0.0; // default 
			$angle = 0.0; // default
			$background_color = array(300,0,0);
			$pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
		}
	</script>
