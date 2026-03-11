<div>
    <!-- Full Table -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">FICHA DE INSCRIÇÃO</h3>
            <div class="block-options">
                <input type="text" placeholder="Pesquisar..." class="form-control form-control-sm" id="table-search"
                    name="table-search">
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">
                                #
                            </th>
                            <th>Nome</th>
                            <th>Evento</th>
                            <th>Empresa</th>
                            <th>Contacto</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->registrations as $i => $item)
                        <tr>
                            <td class="text-center">
                                {{ $this->registrations->firstItem() + $i }}
                            </td>
                            <td>
                                <span class="mb-1 d-block">{{ $item->full_name }}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="tooltip"
                                        title="Download" wire:click="download({{ $item->id }})"
                                        wire:loading.attr="disabled">
                                        <span wire:loading.remove><i class="fa fa-fw fa-download"></i> Baixar ficha de
                                            inscrição</span>
                                        <span wire:loading >
                                            <i class="fa fa-spinner fa-spin mx-1"></i> Baixando...
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                        title="Delete" wire:click="delete({{ $item->id }})">
                                        <i class="fa fa-fw fa-trash"></i> Remover
                                    </button>
                                </div>
                            </td>
                            <td>{{ $item->event->name }}</td>
                            <td>{{ $item->company_name }}</td>
                            <td>{{ $item->phone }} | {{ $item->email }}</td>
                            <td>{{$item->status}} <br>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $this->registrations->links('livewire::bootstrap') }}
            </div>
        </div>
    </div>
    <!-- END Full Table -->
</div>