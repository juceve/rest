<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
  <div class="container-fluid px-0">
    <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
      <div class="d-flex align-items-center">
      </div>
      <!-- Navbar links -->
      <ul class="navbar-nav align-items-center">
        <li class="nav-item dropdown ms-lg-3">
          <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <div class="media d-flex align-items-center">

              <div class="media-body  text-dark align-items-center d-none d-lg-block">
                <span class="mb-0 font-small fw-bold text-gray-900">{{ Auth::user()->name }}</span>
                <small class="text-success">[{{Auth::user()->roles->pluck('name')[0]}}]</small> 
              </div>
              <img class="avatar rounded-circle ms-2" alt="Image placeholder"
                src="{{ Storage::url(Auth::user()->avatar)}}">
            </div>
          </a>
          <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
            <a class="dropdown-item d-flex align-items-center" href="#">
              <span><i class="fas fa-id-badge"></i> Mi Perfil</span>
            </a>
            <div role="separator" class="dropdown-divider my-1"></div>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span><i class="fas fa-sign-out-alt"></i> Cerrar sesión</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>