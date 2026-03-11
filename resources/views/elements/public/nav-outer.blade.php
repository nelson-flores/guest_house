




    <nav class="menu-top-logo menu-fixed" data-menu-anima="fade-in">
        <div class="container">
            <div class="menu-brand">
                <a href="{{ route('web.public.home') }}">
                    <img class="logo-default scroll-hide" src="{{ url('landing/media/logo.png') }}" alt="logo"  style="padding: 3px;  background: #fff;"/>
                    <img class="logo-retina scroll-hide" src="{{ url('landing/media/logo.png') }}" alt="logo"  style="padding: 3px;  background: #fff;"/>
                    <img class="logo-default scroll-show" src="{{ url('landing/media/logo.png') }}" alt="logo" style="padding: 3px;  background: #fff;" />
                    <img class="logo-retina scroll-show" src="{{ url('landing/media/logo.png') }}" alt="logo"  style="padding: 3px;  background: #fff;"/>
                </a>
            </div>
            <i class="menu-btn"></i>
            <div class="menu-cnt">
                <ul id="main-menu">
                    <li class="">
                        <a href="{{ route('web.public.home') }}">Pagina Inicial</a>
                    </li>
                    <li>
                                <a href="{{ route('web.public.about') }}">Sobre</a>
                    </li>
                    <li class="">
                                <a href="{{ route('web.public.form') }}">Cadastre-se como Expositor</a>
                    </li>
                    <li class="">
                        <a href="{{ route('web.public.documents') }}">Documentos</a>
                    </li>
                    <li class="">
                        <a href="{{ route('web.public.contact') }}">Contacto</a>
                    </li>
                    <li class="dropdown">
                        <a href="#">Mais</a>
                        <ul>
                            <li>
                                <a href="{{ route('web.public.blog.index') }}">Artigos</a>
                            </li>
                            <li>
                                <a href="{{ route('web.public.gallery.index') }}">Galeria</a>
                            </li>
                        </ul>
                    </li>
                    <!--li class="nav-label">
                        <a href="#"><span>Call us:</span>+258 84 640 4783</a>
                    </li-->
                </ul>
                <div class="menu-right">
                    <div class="custom-area">
                       <img src="{{ url('landing/themekit/media/GRMNPL.png') }}" width="100px" alt="">
                    </div>
                    <ul class="lan-menu">
                        <li class="dropdown">
                            <a href="#"><img src="{{ url('landing/media/pt.png') }}" alt="lang" />PT </a>
                            <ul>
                                <li><a href="#"><img src="{{ url('landing/media/pt.png') }}" alt="lang" />PT</a></li>
                                <!--li><a href="#"><img src="{{ url('landing/media/en.png') }}" alt="lang" />EN</a></li-->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>