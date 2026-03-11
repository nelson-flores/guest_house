

    <!-- Header -->
    <header id="page-header">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <button class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
          </button>
        </div>

        <div class="d-flex align-items-center">
          <!-- Utilizador -->
          <div class="dropdown d-inline-block ms-2">
            <button class="btn btn-sm btn-alt-secondary d-flex align-items-center" data-bs-toggle="dropdown">
              <img class="rounded-circle" src="{{ url('admin_assets/media/avatars/avatar10.jpg') }}"
                style="width:21px;">
              <span class="d-none d-sm-inline-block ms-2">{{ user()->name }}</span>
              <i class="fa fa-angle-down ms-1"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end p-0 border-0">
              <div class="p-3 text-center bg-body-light border-bottom">
                <p class="fw-medium mb-0">{{ user()->name.' '.user()->last_name }}</p>
                <p class="text-muted fs-sm mb-0">{{ user()->code }}</p>
              </div>
              <div class="p-2">
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Definições</a>
              </div>
              <div class="dropdown-divider"></div>
              <div class="p-2">
                <a class="dropdown-item" href="{{ route('web.admin.auth.logout') }}">Terminar Sessão</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>