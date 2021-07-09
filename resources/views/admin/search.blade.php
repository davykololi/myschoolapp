<form method="get" action="{{route('admin.search')}}"  class="navbar-left navbar-form nav-search mr-md-3">
	<div class="input-group">
		<div class="input-group-prepend">
			<button type="submit" class="btn btn-search pr-1">
				<i class="fa fa-search search-icon"></i>
			</button>
		</div>
		<input type="text" name="query" value="{{isset($searchterm) ? $searchterm : ''}}" placeholder="Search ..." class="form-control">
	</div>
</form>
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