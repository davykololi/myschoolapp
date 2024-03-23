@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
	<div class="max-w-screen mb-8">
 		<!-- Element where PSPDFKit will be mounted. -->
 		<h2 class="text-center text-lg uppercase font-bold mb-4 -mt-2">{{ $title }}</h2>
		<div id="pspdfkit" style="height: 100vh"></div>

		<script src="{{ asset('assets/dist/pspdfkit.js') }}"></script>

		<script>
			PSPDFKit.load({
				container: "#pspdfkit",
				document: "/storage/files/{{ $note->file }}", // Add the path to your document here.
			})
			.then(function(instance) {
				console.log("PSPDFKit loaded", instance);
			})
			.catch(function(error) {
				console.error(error.message);
			});
		</script>
	</div>
</x-frontend-main>
@endsection
