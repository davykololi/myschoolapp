<div class="mt-2">
	<p class="text-white">
		We sent code to email : {{ substr(auth()->user()->email, 0, 5) . '******' . substr(auth()->user()->email,  -2) }}
	</p>
</div>