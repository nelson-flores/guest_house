
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
                <h1>Documentos</h1>
                <h2>FENA – Feira Económica de Nampula</h2>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Pagina Inicial</a></li>
                    <li>Documentos</li>
                </ol>
            </div>
        </header>
    @endsection

    <main>
        <section class="section-base">
            <div class="container">
                <div class="row row-fit-lg">
                    <div class="col-lg-12">
    <table class="table table-strip table-hover">
        <thead class="table-light">
            <tr>
                <th style="width:100px">#</th>
                <th>Descri&ccedil;&atilde;o</th>
                <th>Tipo</th>
                <th>Data</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($this->documents as $i=> $item)
                
            <tr>
                <td>{{ $this->documents->firstItem() + $i }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ strtoupper($item->extension) }}</td>
                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                <td>
                    <button wire:click='download({{ $item->id }})' class="btn btn-sm btn-info">
                        Baixar
                    </button>
                </td>
            </tr> 


            @empty

            <tr>
                <td class="text-center" colspan="5">Sem Documentos Disponiveis</td>
            </tr>

            @endforelse
        </tbody>
    </table>

                {{ $this->documents->links('livewire::bootstrap') }}       

                    </div>
                </div>
            </div>
        </section>
    </main>

</div>
