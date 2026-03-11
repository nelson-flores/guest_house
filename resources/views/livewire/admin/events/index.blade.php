<div>
    
    <!-- Full Table -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Eventos <a href="{{ route('web.admin.events.add') }}" class="ms-2 btn btn-info btn-sm rounded-0">Adicionar</a></h3>
            <div class="block-options">
                <input type="text" placeholder="Pesquisar..." class="form-control form-control-sm" id="table-search" name="table-search">
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
                            <th>Tipo</th>
                            <th>Edicao</th>
                            <th>Endereco</th>
                            <th>Data</th>
                            <th>Registo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->events as $i => $item)
                            

                        <tr>
                            <td class="text-center">
                                {{ $this->events->firstItem() + $i }}
                            </td>
                            <td>
                                <a href="be_pages_generic_profile.html" class="d-block">{{ $item->name }}</a>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip"
                                        title="Edit">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip"
                                        title="Delete" wire:click="delete({{ $item->id }})" >
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->edition }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ format_date($item->start_date).' - '.format_date($item->end_date) }}</td>
                            <td>{{ $item->created_at->format('Y/m/d H:i') }}</td>
                            
                        </tr>


                        @endforeach
                        
                    </tbody>
                </table>
                {{ $this->events->links('livewire::bootstrap') }}
            </div>
        </div>
    </div>
    <!-- END Full Table -->
</div>
