<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.superadmin_head')
<body>
	<div class="wrapper">
		<div class="main-header">
			@include('partials.logo')
			@include('partials.superadmin_navbar')
		</div>
		@include('partials.superadmin_sidebar')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Pages</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Starter Page</a>
							</li>
						</ul>
					</div>
					<div class="page-category">
						<main class="py-4">
            				@yield('content')
        				</main>
					</div>
				</div>
			</div>
			@include('partials.superadmin_footer')
		</div>

	</div>
	@include('partials.superadmin_scripts')
</body>
</html>