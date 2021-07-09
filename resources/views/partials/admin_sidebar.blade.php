		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="/storage/storage/{{Auth::user()->image }}" alt="{{Auth::user()->full_name }}" class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{Auth::user()->title }} {{Auth::user()->first_name }} {{Auth::user()->last_name }}
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="{{route('admin.profile')}}">
											<span class="link-collapse">Profile</span>
										</a>
									</li>
									<li>
										<a href="{{route('admin.change-password.form')}}">
											<span class="link-collapse">Change Password</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li>
										<a href="../demo1/index.html">
											<span class="sub-item">Dashboard 1</span>
										</a>
									</li>
									<li>
										<a href="../demo2/index.html">
											<span class="sub-item">Dashboard 2</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Base</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="components/avatars.html">
											<span class="sub-item">Avatars</span>
										</a>
									</li>
									<li>
										<a href="components/buttons.html">
											<span class="sub-item">Buttons</span>
										</a>
									</li>
									<li>
										<a href="components/gridsystem.html">
											<span class="sub-item">Grid System</span>
										</a>
									</li>
									<li>
										<a href="components/panels.html">
											<span class="sub-item">Panels</span>
										</a>
									</li>
									<li>
										<a href="components/notifications.html">
											<span class="sub-item">Notifications</span>
										</a>
									</li>
									<li>
										<a href="components/sweetalert.html">
											<span class="sub-item">Sweet Alert</span>
										</a>
									</li>
									<li>
										<a href="components/font-awesome-icons.html">
											<span class="sub-item">Font Awesome Icons</span>
										</a>
									</li>
									<li>
										<a href="components/simple-line-icons.html">
											<span class="sub-item">Simple Line Icons</span>
										</a>
									</li>
									<li>
										<a href="components/flaticons.html">
											<span class="sub-item">Flaticons</span>
										</a>
									</li>
									<li>
										<a href="components/typography.html">
											<span class="sub-item">Typography</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-th-list"></i>
								<p>Sidebar Layouts</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="sidebar-style-1.html">
											<span class="sub-item">Sidebar Style 1</span>
										</a>
									</li>
									<li>
										<a href="overlay-sidebar.html">
											<span class="sub-item">Overlay Sidebar</span>
										</a>
									</li>
									<li>
										<a href="compact-sidebar.html">
											<span class="sub-item">Compact Sidebar</span>
										</a>
									</li>
									<li>
										<a href="static-sidebar.html">
											<span class="sub-item">Static Sidebar</span>
										</a>
									</li>
									<li>
										<a href="icon-menu.html">
											<span class="sub-item">Icon Menu</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Forms</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="forms/forms.html">
											<span class="sub-item">Basic Form</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Tables</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="tables/tables.html">
											<span class="sub-item">Basic Table</span>
										</a>
									</li>
									<li>
										<a href="tables/datatables.html">
											<span class="sub-item">Datatables</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#maps">
								<i class="fas fa-map-marker-alt"></i>
								<p>Maps</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="maps/jqvmap.html">
											<span class="sub-item">JQVMap</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#charts">
								<i class="far fa-chart-bar"></i>
								<p>Charts</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="charts">
								<ul class="nav nav-collapse">
									<li>
										<a href="charts/charts.html">
											<span class="sub-item">Chart Js</span>
										</a>
									</li>
									<li>
										<a href="charts/sparkline.html">
											<span class="sub-item">Sparkline</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="widgets.html">
								<i class="fas fa-desktop"></i>
								<p>Widgets</p>
								<span class="badge badge-success">4</span>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-bars"></i>
								<p>Menu Levels</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
									<li>
										<a data-toggle="collapse" href="#subnav1">
											<span class="sub-item">Level 1</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav1">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="{{ route('admin.classes.index') }}">
														<span class="sub-item">CLASSES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.streams.index') }}">
														<span class="sub-item">STREAMS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.intakes.index') }}">
														<span class="sub-item">INTAKES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.dormitories.index') }}">
														<span class="sub-item">DORMITORIES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.departments.index') }}">
														<span class="sub-item">DEPARTMENTS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.libraries.index') }}">
														<span class="sub-item">LIBRARIES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.position-students.index') }}">
														<span class="sub-item">STUDENT ROLES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.position-staffs.index') }}">
														<span class="sub-item">SUB STAFF ROLES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.category-subjects.index') }}">
														<span class="sub-item">SUBJECT CATEGORIES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.category-exams.index') }}">
														<span class="sub-item">EXAM CATEGORIES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.category-fields.index') }}">
														<span class="sub-item">FIELD CATEGORIES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.category-halls.index') }}">
														<span class="sub-item">HALL CATEGORIES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.category-games.index') }}">
														<span class="sub-item">GAME CATEGORIES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.category-farms.index') }}">
														<span class="sub-item">FARM CATEGORIES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.fields.index') }}">
														<span class="sub-item">FIELDS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.games.index') }}">
														<span class="sub-item">GAMES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.farms.index') }}">
														<span class="sub-item">FARMS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.parents.index') }}">
														<span class="sub-item">PARENTS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.students.index') }}">
														<span class="sub-item">STUDENTS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.teachers.index') }}">
														<span class="sub-item">TEACHERS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.subjects.index') }}">
														<span class="sub-item">SUBJECTS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.subs.index') }}">
														<span class="sub-item">CLASS SUBJECTS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.staffs.index') }}">
														<span class="sub-item">SUBSTAFFS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.clubs.index') }}">
														<span class="sub-item">CLUBS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.assignments.index') }}">
														<span class="sub-item">ASSIGNMENTS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.exams.index') }}">
														<span class="sub-item">EXAMS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.meetings.index') }}">
														<span class="sub-item">MEETINGS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.rewards.index') }}">
														<span class="sub-item">AWARDS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.attendances.index') }}">
														<span class="sub-item">ATTENDANCES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.halls.index') }}">
														<span class="sub-item">HALLS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.timetables.index') }}">
														<span class="sub-item">TIMETABLES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.notes.index') }}">
														<span class="sub-item">NOTES</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.report_view') }}">
														<span class="sub-item">REPORT</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.reports.index') }}">
														<span class="sub-item">REPORTS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.letters.index') }}">
														<span class="sub-item">LETTERS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.classes.reportcardForm') }}">
														<span class="sub-item">REPORT CARDS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.classMarksheet.form') }}">
														<span class="sub-item">MARK SHEETS</span>
													</a>
												</li>
												<li>
													<a href="{{ route('admin.grade-systems.index') }}">
														<span class="sub-item">GRADING SYSTEM</span>
													</a>
												</li>
					</ul>
										</div>
									</li>
									<li>
										<a data-toggle="collapse" href="#subnav2">
											<span class="sub-item">Level 1</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav2">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
					</ul>
										</div>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Level 1</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->