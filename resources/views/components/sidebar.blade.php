<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="{{ route('dashboard') }}">PT. Asyari Al Hutama</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="{{ route('dashboard') }}">PT</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li class="{{ Request::is('/') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-house">
					</i> <span>Dashboard</span>
				</a>
			</li>
			<li class="{{ Request::is('user') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-pencil-ruler">
					</i> <span>User</span>
				</a>
			</li>
			<li class="menu-header">Production</li>
			<li class="nav-item dropdown {{ Request::is('production') ? 'active' : '' }}">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Production</span></a>
				<ul class="dropdown-menu">
					<li class='{{ Route::currentRouteName() == 'production.index' ? 'active' : '' }}'>
						<a class="nav-link" href="{{ route('production.index') }}">List Production</a>
					</li>

					{{-- <li class='{{ Route::currentRouteName() == 'material.index' ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('material.index') }}">Daftar Material</a>
                    </li> --}}

				</ul>
			</li>
			<li class="menu-header">Materials</li>
			<li class='{{ Request::is('material') ? 'active' : '' }}'>
				<a class="nav-link" href="{{ route('material.index') }}"><i class="fas fa-window-restore"></i> <span>Daftar
						Materials</span></a>
			</li>
			<li class="menu-header">Brands</li>
			<li class="{{ Route::currentRouteName() == 'brand.index' ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('brand.index') }}"><i class="fas fa-pencil-ruler">
					</i> <span>Brand</span>
				</a>
			</li>

			<li class="menu-header">Formula</li>
			<li class="{{ Request::is('formula') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('formula.index') }}"><i class="fas fa-water">
					</i> <span>Daftar Formula</span>
				</a>
			</li>

			<li class="menu-header">Product</li>
			<li class="{{ Request::is('product') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('product.index') }}"><i class="fas fa-file">
					</i> <span>Daftar Product</span>
				</a>
			</li>
			<li class="menu-header">Category</li>
			<li class="{{ Request::is('category') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-diagram-project">
					</i> <span>Daftar Catetory</span>
				</a>
			</li>
		</ul>





		<div class="hide-sidebar-mini mt-4 mb-4 p-3">
			<a href="{{ route('logout') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
				<i class="fas fa-rocket"></i> LOGOUT
			</a>
		</div>
	</aside>
</div>
