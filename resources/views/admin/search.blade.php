@if(isset($searchResults))
	@if($searchResults->isEmpty())
		<h2>Sorry, no results found for the term <b class="search_results">"{!! $searchterm !!}"</b>.</h2>
		<a href="{!! url()->previous() !!}" class="wow fadeInLeftBig">Go Back</a>
	@else
		<h2>There are {{$searchResults->count()}} results for the term <b class="search_results">"{!! $searchterm !!}"</b></h2>
		<hr/>
		@foreach($searchResults->groupByType() as $type => $modelSearchResults)
			<h2>{{ucwords($type)}}</h2>
		@foreach($modelSearchResults as $searchResult)
			<ul>
				<a href="{!! $searchResult->url !!}">{!! $searchResult->title !!}</a>
			</ul>
		@endforeach
		@endforeach
	@endif
@endif

