<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-4 pt-3">
    {{-- MENU PANTALLA MOVIL --}}
    <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <div class="avatar-lg me-4">
          <img class="rounded-circle p-2" src="{{Storage::url('img/favicon_food.png')}}" width="60px" alt="">
        </div>
        <div class="d-block">
          <h4 style="color: rgb(214, 189, 121) ">{{config('app.name')}}
          </h4>
        </div>
      </div>
      <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
          aria-expanded="true" aria-label="Toggle navigation">
          <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
    </div>
    {{-- FIN PANTALLA MOVIL --}}
    <ul class="nav flex-column pt-3 pt-md-0">
      <li class="nav-item d-none d-md-block">
        <a href="home" class="nav-link d-flex align-items-center">
          <img class="rounded-circle p-2" src="{{Storage::url('img/favicon_food.png')}}" width="60px" alt=""> <span
            style="color: rgb(214, 189, 121) ">{{config('app.name')}}</span>
        </a>
      </li>
      @can('home')
      <li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}">
        <a href="{{route('home')}}" class="nav-link">
          <span class="sidebar-icon">
            <i class="fas fa-tachometer-alt"></i>
          </span>
          <span class="sidebar-text">Dashboard</span>
        </a>
      </li>
      @endcan
       
      <li class="nav-item ">
        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-clientes">
          <span>
            <span class="sidebar-icon">
              <i class="fas fa-id-card-alt"></i>
            </span>
            <span class="sidebar-text">Clientes</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </span>
        </span>
        <div
          class="multi-level collapse 
          {{ (request()->is('tutores')) ? 'show' : '' }}
          {{ (request()->is('vinculosestudiantes*')) ? 'show' : '' }}
          {{ (request()->is('estudiantes*')) ? 'show' : '' }}" 
          role="list"  id="submenu-clientes" aria-expanded="false">

          <ul class="flex-column nav">
            @can('tutores.index')
            <li class="nav-item {{ (request()->is('tutores')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('tutores')}}">
                <i class="fas fa-user-tie"></i>
                <span class="sidebar-text">Tutores</span>
              </a>
            </li>
            @endcan                       

            @can('estudiantes.index')
            <li class="nav-item {{ (request()->is('estudiantes*')) ? 'active' : '' }} {{ (request()->is('vinculosestudiantes*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('estudiantes.index')}}">
                <i class="fas fa-user-graduate"></i>
                <span class="sidebar-text">Estudiantes</span>
              </a>
            </li>
            @endcan                       
          </ul>
        </div>
      </li>
      @can('items.index')
      <li class="nav-item ">
        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-items">
          <span>
            <span class="sidebar-icon">
              <i class="fas fa-boxes"></i>
            </span>
            <span class="sidebar-text">Productos</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </span>
        </span>
        <div
          class="multi-level collapse 
          {{ (request()->is('catitems*')) ? 'show' : '' }}
          {{ (request()->is('items*')) ? 'show' : '' }}" 
          role="list"  id="submenu-items" aria-expanded="false">

          <ul class="flex-column nav">
            @can('items.create')
            <li class="nav-item {{ (request()->is('catitems*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('catitems.index')}}">
                <i class="fas fa-tags"></i>
                <span class="sidebar-text">Categorias</span>
              </a>
            </li>
            @endcan  
            @can('items.create')
            <li class="nav-item {{ (request()->is('items/create')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('items.create')}}">
                <i class="fas fa-plus"></i>
                <span class="sidebar-text">Registrar</span>
              </a>
            </li>
            @endcan                       

            @can('items.index')
            <li class="nav-item {{ (request()->is('items')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('items.index')}}">
                <i class="fas fa-stream"></i>
                <span class="sidebar-text">Listado</span>
              </a>
            </li>
            @endcan                       
          </ul>
        </div>
      </li>
      @endcan 
      {{-- @can('menus.index') --}}
      <li class="nav-item ">
        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-menus">
          <span>
            <span class="sidebar-icon">
              <i class="fas fa-concierge-bell"></i>
            </span>
            <span class="sidebar-text">Menus</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </span>
        </span>
        <div
          class="multi-level collapse 
          {{ (request()->is('menus*')) ? 'show' : '' }}
          {{ (request()->is('elaborarmenu*')) ? 'show' : '' }}" 
          role="list"  id="submenu-menus" aria-expanded="false">

          <ul class="flex-column nav">
            <li class="nav-item {{ (request()->is('programarmenu')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('programarmenu')}}">
                <i class="fas fa-calendar-alt"></i>
                <span class="sidebar-text">Programa Semanal</span>
              </a>
            </li>  

            {{-- @can('menus.create') --}}
            <li class="nav-item {{ (request()->is('elaborarmenu*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('elaborarmenu',0)}}">
                <i class="fas fa-plus"></i>
                <span class="sidebar-text">Elaborar nuevo</span>
              </a>
            </li>
            {{-- @endcan                        --}}

            {{-- @can('menus.index') --}}
            <li class="nav-item {{ (request()->is('menus')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('menus.index')}}">
                <i class="fas fa-stream"></i>
                <span class="sidebar-text">Listado</span>
              </a>
            </li>
            {{-- @endcan      --}}                            
          </ul>
        </div>
      </li>
      {{-- @endcan  --}}

      @can('empleados.index')
      <li class="nav-item ">
        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-empleados">
          <span>
            <span class="sidebar-icon">
              <i class="fas fa-user-shield"></i>
            </span>
            <span class="sidebar-text">Empleados</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </span>
        </span>
        <div
          class="multi-level collapse 
          {{ (request()->is('empleados*')) ? 'show' : '' }}" 
          role="list"  id="submenu-empleados" aria-expanded="false">

          <ul class="flex-column nav">
            @can('empleados.create')
            <li class="nav-item {{ (request()->is('empleados/create')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('empleados.create')}}">
                <i class="fas fa-plus"></i>
                <span class="sidebar-text">Registrar</span>
              </a>
            </li>
            @endcan                       

            @can('empleados.index')
            <li class="nav-item {{ (request()->is('empleados')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('empleados.index')}}">
                <i class="fas fa-stream"></i>
                <span class="sidebar-text">Listado</span>
              </a>
            </li>
            @endcan                       
          </ul>
        </div>
      </li>
      @endcan    

      <li class="nav-item ">
        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-app1">
          <span>
            <span class="sidebar-icon">
              <i class="fas fa-cogs"></i>
            </span>
            <span class="sidebar-text">Configuración</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </span>
        </span>
        <div
          class="multi-level collapse 
          {{ (request()->is('cursos*')) ? 'show' : '' }}
          {{ (request()->is('precios*')) ? 'show' : '' }}
          " 
          role="list"  id="submenu-app1" aria-expanded="false">

          <ul class="flex-column nav">
            @can('cursos.index')
            <li class="nav-item {{ (request()->is('cursos')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('cursos')}}">
                <i class="fas fa-sort-amount-up"></i>
                <span class="sidebar-text">Cursos</span>
              </a>
            </li>
            @endcan                       
            {{-- @can('precios.index') --}}
            <li class="nav-item {{ (request()->is('precios*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('precios.index')}}">
                <i class="fas fa-dollar-sign"></i>
                <span class="sidebar-text">Precios</span>
              </a>
            </li>
            {{-- @endcan     --}}
            
          </ul>
        </div>
      </li>
      @can('settings')
          <li class="nav-item ">
        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-app">
          <span>
            <span class="sidebar-icon">
              <i class="fas fa-tools"></i>
            </span>
            <span class="sidebar-text">Param. del Sistema</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </span>
        </span>
        <div
          class="multi-level collapse 
          {{ (request()->is('empresas*')) ? 'show' : '' }} 
          {{ (request()->is('settings*')) ? 'show' : '' }} 
          {{ (request()->is('roles*')) ? 'show' : '' }} 
          {{ (request()->is('users*')) ? 'show' : '' }}"
          role="list" id="submenu-app" aria-expanded="false">

          <ul class="flex-column nav">
            @can('empresas.index')
            <li class="nav-item {{ (request()->is('empresas*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('empresas.index')}}">
                <i class="fas fa-fw fa-building"></i>
                <span class="sidebar-text">Empresas</span>
              </a>
            </li>
            @endcan            
            @can('users.index')
            <li class="nav-item {{ (request()->is('users*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('users.index')}}">
                <i class="fas fa-users"></i>
                <span class="sidebar-text">Usuarios</span>
              </a>
            </li>
            @endcan
            @can('roles.index')
            <li class="nav-item {{ (request()->is('roles*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('roles.index')}}">
                <i class="fas fa-user-tag"></i>
                <span class="sidebar-text">Roles - Permisos</span>
              </a>
            </li>
            @endcan
            @can('settings')
            <li class="nav-item {{ (request()->is('settings')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('settings')}}">
                <i class="fas fa-sliders-h"></i>
                <span class="sidebar-text">Comp. de Inicio</span>
              </a>
            </li>
            @endcan
          </ul>
        </div>
      </li>
      @endcan
      
      

    </ul>
  </div>
</nav>