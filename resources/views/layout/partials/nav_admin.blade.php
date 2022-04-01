<!-- Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							@if(Auth::user()->hasRole('Admin'))
							<li class="menu-title"> 
								<span><i class="fe fe-home"></i> Main</span>
							</li>
							<li class="{{ Request::is('admin/index_admin') ? 'active' : '' }}"> 
								<a href="index_admin"><span>Dashboard</span></a>
							</li>
							
							<li class="menu-title"> 
								<span><i class="fe fe-document"></i> Pages</span>
							</li>
							<li class="submenu"> 
								<a href="#"><span>Users</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('admin/user') ? 'active' : '' }}" href="{{ url('admin/user') }}"> User </a></li>
									<li><a class="{{ Request::is('admin/user/create') ? 'active' : '' }}" href="{{ url('admin/user/create') }}"> Add User </a></li>
								</ul>
							</li>

							<li class="submenu"> 
								<a href="#"><span>Quiz Questons</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('admin/quiz') ? 'active' : '' }}" href="{{ url('admin/quiz') }}"> Questions </a></li>
									<li><a class="{{ Request::is('admin/quiz/create') ? 'active' : '' }}" href="{{ url('admin/quiz/create') }}"> Add Question </a></li>
								</ul>
							</li>

							<li class="{{ Request::is('admin/quiz_result') ? 'active' : '' }}"> 
								<a href="{{ url('admin/quiz_result') }}"><span>Quiz Result</span></a>
							</li>

							@endif
							@if(Auth::user()->hasRole('User'))
							<li class="menu-title"> 
								<span><i class="fe fe-home"></i> Result</span>
							</li>
							<li class="{{ Request::is('user/q_result') ? 'active' : '' }}"> 
								<a href="{{ url('user/q_result') }}"><span>Quiz Results</span></a>
							</li>
							@endif
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->