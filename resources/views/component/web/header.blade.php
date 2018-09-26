<header id="header">
	<div class="menu-header">
		<div class="container">
			<div class="row no-gape">
				<div class="logo">
					<a href="https://123job.vn" title="123job.vn">
						<img class="" src="uploads/logo.png" alt="123job.vn | Việc làm mới hiệu quả, Tìm việc làm mới nhanh" />
					</a>
				</div>
				@if (\Request::is('search-job') || \Request::is('job-detail')) 
					@include('component.web.form_search_header')
				@endif
					@include('component.web.profile')
			</div>
		</div>
	</div>
</header>