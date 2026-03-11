
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
                <h1>Galeria de Imagens</h1>
                <h2>Feira Económica de Nampula</h2>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Pagina Inicial</a></li>
                    <li>Galeria</li>
                </ol>
            </div>
        </header>
    @endsection

    <main>
        <section class="section-base ">
            <div class="container pt-3">
                <div class="album album active" data-album-anima="fade-bottom" data-columns-md="2" data-columns-sm="1">
             
                    <div class="cnt-album-box">
                        <p class="album-title"><span>{{ $album->title }}</span> <a href="{{ route('web.public.gallery.index') }}">Galeria</a></p>
                        <div class="album-item active fade-bottom" style="animation-duration: 500ms; transition-timing-function: ease; transition-delay: 0ms;">
                                <div class="grid-list list-gallery" data-lightbox-anima="fade-top" data-columns="3" data-columns-md="2">
                            
                                <div class="grid-box">
                            @foreach ($medias as $item)
                                    <div class="grid-item">
                                        <a class="img-box" href="{{ url($item->file_path) }}">
                                            <img src="{{ url($item->thumbnail_path ?? $item->file_path) }}" alt="">
                                        </a>
                                    </div>
                            @endforeach
                                </div>
                                <div class="list-pagination">
                                    <ul class="pagination" data-page-items="6" data-pagination-anima="fade-right"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
</div>
