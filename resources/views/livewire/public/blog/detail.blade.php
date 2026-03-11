
<div>

    @section('header')
        @include('elements.public.nav-outer')

        <header class="header-image ken-burn-center light"
                data-parallax="true"
                data-natural-height="538"
                data-natural-width="1280"
                data-bleed="0"
                data-image-src="{{ url('landing/media/fena2025/bg.jpeg') }}"
                data-offset="0">
            <div class="container">
                <h1>{{ $post->title }}</h1>
                <h2>Feira Económica de Nampula</h2>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Pagina Inicial</a></li>
                    <li>Blog</li>
                    <li>Post</li>
                </ol>
            </div>
        </header>
    @endsection

    <main>
        <section class="section-base section-color">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                            <img src="{{ url($post->thumbnail) }}" alt="" width="100%">
                        <hr class="space-sm" />
                        <div class="row">
                            <div class="col-lg-8">
                                <ul class="icon-list icon-list-horizontal icon-list-blog">
                                    <li>
                                        <i class="icon-calendar"></i><a href="#">{{ $post->created_at->format('d/m/Y') }}</a>
                                    </li>
                                    <li>
                                        <i class="icon-bookmark"></i>
                                        <a class="category-animals" href="#">Finance</a>,
                                        <a class="category-people" href="#">Software</a>,
                                        <a class="category-travels" href="#">Hardware</a>
                                    </li>
                                    <!--li>
                                        <i class="icon-user"></i><a href="#">Admin</a>
                                    </li-->
                                </ul>
                            </div>
                            <!--div class="col-lg-4">
                                <div class="icon-links icon-social social-colors align-right align-left-md">
                                    <a data-social="share-facebook" class="facebook"><i class="icon-facebook"></i></a>
                                    <a data-social="share-twitter" class="twitter"><i class="icon-twitter"></i></a>
                                    <a data-social="share-linkedin" class="linkedin"><i class="icon-linkedin"></i></a>
                                </div>
                            </div-->
                        </div>
                        <hr class="space" />
                       
                        {!! $post->content !!}
                    </div>
                    <div class="col-lg-3 widget">
                        <hr class="space visible-md" />
                        <form class="form-box" method="get" action="{{ route('web.public.blog.index') }}">
                            <div class="input-text-btn">
                                <input class="input-text" name="q" type="text" placeholder="Pesquisar ..." /><input type="submit" value="Pesquisar" class="btn" />
                            </div>
                        </form>
                        <hr class="space-sm" />
                        <h3>Categorias</h3>
                        <hr class="space-xs" />
                        <div class="menu-inner menu-inner-vertical">
                            <ul>
                                @foreach ($this->categories as $item)
                                    
                                <li>
                                    <a href="#">
                                       {{$item->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <hr class="space-sm" />
                        <h3>Ultimos artigos</h3>
                        <hr class="space-sm" />
                        <div class="menu-inner menu-inner-vertical menu-inner-image">
                            <ul>
                                @foreach ($this->latest as $item)
                                    
                                <li>
                                    <a href="#">
                                        <img src="{{ url($item->thumbnail) }}" alt="" />
                                        <span>{{ $item->created_at->format('d/m/Y') }}</span>
                                        {{ $item->title }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <hr class="space-sm" />
                        <h3>Tags</h3>
                        <hr class="space-sm" />
                        <div class="list-tags">
                            @foreach ($this->tags as $item)
                                <a class="text-light">{{ $item->name }}</a>
                            @endforeach
                        </div>
                        <hr class="space-sm" />
                    </div>
                </div>

            </div>
        </section>
    </main>
</div>
