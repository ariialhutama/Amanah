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
            <li class="@if (Request::segment(1) == 'dashboard') active @endif">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-house">
                    </i> <span>Dashboard</span>
                </a>
            </li>
            <li class="@if (Request::segment(1) == 'user') active @endif">
                <a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>User</span>
                </a>
            </li>
            <li class="menu-header">Production</li>
            <li class="nav-item dropdown @if (Request::segment(1) == 'production') active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Production</span></a>
                <ul class="dropdown-menu">
                    <li class="@if (Request::segment(1) == 'production') active @endif">
                        <a class="nav-link" href="{{ route('production.index') }}">List
                            Production</a>
                    </li>

                </ul>
            </li>
            <li class="menu-header">Materials</li>
            <li class="@if (Request::segment(1) == 'material') active @endif">
                <a class="nav-link" onclick="closeSidebar()" href="{{ route('material.index') }}"><i
                        class="fas fa-window-restore"></i>
                    <span>Daftar
                        Materials</span></a>
            </li>
            <li class="menu-header">Brands</li>
            <li class="@if (Request::segment(1) == 'brand') active @endif">
                <a class="nav-link" href="{{ route('brand.index') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Brand</span>
                </a>
            </li>

            <li class="menu-header">Formula</li>
            <li class="@if (Request::segment(1) == 'formula') active @endif">
                <a class="nav-link" href="{{ route('formula.index') }}"><i class="fas fa-water">
                    </i> <span>Daftar Formula</span>
                </a>
            </li>

            <li class="menu-header">Product</li>
            <li class="@if (Request::segment(1) == 'product') active @endif" onclick="closeSidebar()">
                <a class="nav-link" href="{{ route('product.index') }}"><i class="fas fa-file">
                    </i> <span>Daftar Product</span>
                </a>
            </li>
            <li class="menu-header">Category</li>
            <li class="@if (Request::segment(1) == 'category') active @endif">
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
@
@push('scripts')
    <script src="{{ asset('js/scripts.js') }}"></script>


    <script>
        function closeSidebar() {
            // Menutup sidebar ketika menu diklik
            let sidebar = document.querySelector('.main-sidebar');
            sidebar.classList.remove('sidebar-gone');
        }

        // Untuk toggle sidebar jika diperlukan
        // document.querySelector('#sidebar-toggle').addEventListener('click', function() {
        // let sidebar = document.querySelector('.main-sidebar');
        // sidebar.classList.toggle('active');
        // });
    </script>
@endpush
