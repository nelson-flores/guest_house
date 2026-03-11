<!-- Sidebar -->
<nav id="sidebar" aria-label="Navegação Principal">
    <div class="content-header">
        <a class="fw-semibold text-dual" href="{{ route('web.public.home') }}">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider text-center">
                <img src="{{ url('assets/images/cta.png') }}" alt="CEP/CTA" width="80">
            </span>
        </a>

        <div class="d-flex align-items-center gap-1">
            <!-- Modo Escuro -->
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="dropdown">
                    <i class="far fa-fw fa-moon" data-dark-mode-icon></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end smini-hide border-0">
                    <button class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout"
                        data-action="dark_mode_off">
                        <i class="far fa-sun fa-fw opacity-50"></i>
                        <span class="fs-sm fw-medium">Claro</span>
                    </button>
                    <button class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout"
                        data-action="dark_mode_on">
                        <i class="far fa-moon fa-fw opacity-50"></i>
                        <span class="fs-sm fw-medium">Escuro</span>
                    </button>
                    <button class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout"
                        data-action="dark_mode_system">
                        <i class="fa fa-desktop fa-fw opacity-50"></i>
                        <span class="fs-sm fw-medium">Sistema</span>
                    </button>
                </div>
            </div>

            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
        </div>
    </div>

    <div class="js-sidebar-scroll">
        <div class="content-side">
            <ul class="nav-main">

                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ route('web.public.home') }}">
                        <i class="nav-main-link-icon si si-home"></i>
                        <span class="nav-main-link-name">Página Inicial</span>
                    </a>
                </li>

                <li class="nav-main-heading">PAINEL</li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" href="#">
                        <i class="nav-main-link-icon si si-docs"></i>
                        <span class="nav-main-link-name">Artigos</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('web.admin.posts.index') }}">
                                <span class="nav-main-link-name">
                                    Todos os Artigos
                                </span>
                            </a></li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('web.admin.posts.add') }}">
                                <span class="nav-main-link-name">
                                    Novo Artigo
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('web.admin.posts.categories') }}">
                                <span class="nav-main-link-name">
                                    Categorias
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('web.admin.posts.tags') }}">
                                <span class="nav-main-link-name">
                                    Etiquetas
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" href="#">
                        <i class="nav-main-link-icon si si-users"></i>
                        <span class="nav-main-link-name">Membros</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item"><a class="nav-main-link" href="{{ route('web.admin.gallery.index') }}"><span class="nav-main-link-name">
                                    Toda a Galeria</span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="{{ route('web.admin.gallery.album') }}"><span class="nav-main-link-name">
                                    Albuns
                                </span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="{{ route('web.admin.gallery.add') }}"><span class="nav-main-link-name">
                                    Adicionar Fotos
                                </span></a></li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" href="#">
                        <i class="nav-main-link-icon si si-credit-card"></i>
                        <span class="nav-main-link-name">Financas</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item"><a class="nav-main-link" href="{{ route('web.admin.gallery.index') }}"><span class="nav-main-link-name">
                                    Toda a Galeria</span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="{{ route('web.admin.gallery.album') }}"><span class="nav-main-link-name">
                                    Albuns
                                </span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="{{ route('web.admin.gallery.add') }}"><span class="nav-main-link-name">
                                    Adicionar Fotos
                                </span></a></li>
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" href="#">
                        <i class="nav-main-link-icon si si-calendar"></i>
                        <span class="nav-main-link-name">Eventos</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('web.admin.events.index') }}">
                                <span class="nav-main-link-name">
                                    Todos os Eventos
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('web.admin.events.add') }}">
                                <span class="nav-main-link-name">
                                    Novo Evento
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" href="#">
                        <i class="nav-main-link-icon si si-picture"></i>
                        <span class="nav-main-link-name">Galeria</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item"><a class="nav-main-link" href="{{ route('web.admin.gallery.index') }}"><span class="nav-main-link-name">
                                    Toda a Galeria</span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="{{ route('web.admin.gallery.album') }}"><span class="nav-main-link-name">
                                    Albuns
                                </span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="{{ route('web.admin.gallery.add') }}"><span class="nav-main-link-name">
                                    Adicionar Fotos
                                </span></a></li>
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" href="#">
                        <i class="nav-main-link-icon si si-settings"></i>
                        <span class="nav-main-link-name">CMS</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item"><a class="nav-main-link" href="#"><span class="nav-main-link-name">
                                   Equipe
                                </span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="#"><span class="nav-main-link-name">
                                    Sobre o CEP
                                </span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="#"><span class="nav-main-link-name">
                                    Termos de Uso
                                </span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="#"><span class="nav-main-link-name">
                                    Política de Privacidade
                                </span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="#"><span class="nav-main-link-name">
                                    Parceiros
                                </span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="#"><span class="nav-main-link-name">
                                    Perguntas Frequentes
                                </span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="#"><span class="nav-main-link-name">
                                    Mais
                                </span></a></li>

                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" href="#">
                        <i class="nav-main-link-icon si si-bar-chart"></i>
                        <span class="nav-main-link-name">Estatistica</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item"><a class="nav-main-link" href="#"><span class="nav-main-link-name">
                                    Todos os Usuários</span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="#"><span class="nav-main-link-name">
                                    Adicionar Usuário</span></a></li>
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" href="#">
                        <i class="nav-main-link-icon si si-users"></i>
                        <span class="nav-main-link-name">Usuários</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item"><a class="nav-main-link" href="#"><span class="nav-main-link-name">
                                    Todos os Usuários</span></a></li>
                        <li class="nav-main-item"><a class="nav-main-link" href="#"><span class="nav-main-link-name">
                                    Adicionar Usuário</span></a></li>
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                        <i class="nav-main-link-icon si si-wrench"></i>
                        <span class="nav-main-link-name">Definições</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>