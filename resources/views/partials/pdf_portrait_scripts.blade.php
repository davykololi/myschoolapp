	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/booststrap/4.3.1/js/booststrap.min.js"></script>
	<script type="text/php">
		if(isset($pdf)){
			$x = 250;
			$y = 800;
			$text = "Page {PAGE_NUM} of {PAGE_COUNT}";
			$font = null;
			$size = 14;
			$color = array(0,0,0);
			$word_space = 0.0; 
			$char_space = 0.0;
			$angle = 0.0;
			$pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
		}
	</script>


	