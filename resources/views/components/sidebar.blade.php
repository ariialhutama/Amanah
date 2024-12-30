<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="index.html">PT. Asyari Al Hutama</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="index.html">PT</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			{{-- <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}"> --}}
			{{-- <li class="nav-item dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>

			</li> --}}
			{{-- <li class="nav-item dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
				<ul class="dropdown-menu">
					<li class='{{ Request::is('dashboard') ? 'active' : '' }}'>
						<a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
					</li>

				</ul>
			</li> --}}


			<li class="{{ Request::is('dashboard') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('dashboard') }}"><i class="fa-solid fa-house">
					</i> <span>Dashboard</span>
				</a>
			</li>
			<li class="{{ Request::is('user') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('user.index') }}"><i class="fa-solid fa-pencil-ruler">
					</i> <span>User</span>
				</a>
			</li>
			{{-- <li class="{{ Request::is('production') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('production.index') }}"><i class="fa-solid  fa-user-secret">
                    </i> <span>Production</span>
                </a>
            </li> --}}
			<li class="menu-header">Production</li>
			<li class="nav-item dropdown {{ Request::is('production') ? 'active' : '' }}">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Production</span></a>
				<ul class="dropdown-menu">
					<li class='{{ Request::is('materialproduct') ? 'active' : '' }}'>
						<a class="nav-link" href="{{ route('materialproduct.index') }}">Material</a>
					</li>
					<li class='{{ Request::is('production') ? 'active' : '' }}'>
						<a class="nav-link" href="{{ route('production.index') }}">Perhitungan</a>
					</li>

				</ul>
			</li>


		</ul>



		<div class="hide-sidebar-mini mt-4 mb-4 p-3">
			<a href="{{ route('logout') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
				<i class="fas fa-rocket"></i> LOGOUT
			</a>
		</div>
	</aside>
</div>
