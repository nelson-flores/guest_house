<div>

    <div class="block bg-transparent border-0 shadow-none">
        <div class="block-header">
            <h3 class="block-title">Albums</h3>
        </div>
        <div class="block-content">

            <div class="row">

                <div class="col-12">

                    <div class="row">

                        <div class="col-md-3">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title">Novo Album</h3>
                                </div>
                                <div class="block-content pb-4">

                                    <form action="#" method="POST" wire:submit.prevent='save()'   enctype="multipart/form-data">


                                        <div class="form-group">
                                            <label for="file" class="form-label">Capa</label>
                                            <input type="file" class="form-control" id="slug" placeholder="fArquivo.."
                                                wire:model="file" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="form-label">Titulo</label>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Nome da Album" wire:model="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="form-label">Descricao</label>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Nome da Album" wire:model="description">
                                        </div>
                                        <div class="form-group pt-4">
                                            <button class="btn btn-info btn-sm">Salvar Album</button>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>

                        <div class="col-md-9">


                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 100px;">
                                                #
                                            </th>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Evento</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($this->albums as $item)

                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" name="selected_items[]" id="item_1" value="1">
                                            </td>
                                            <td>
                                                <a href="be_pages_generic_profile.html" class="d-block">{{ $item->title
                                                    }}</a>
                                                <div class="btn-group">
                                                    <a href="{{ url($item->cover) }}" target="_blank" class="btn btn-sm btn-success" title="Download">
                                                        <i class="fa fa-fw fa-download"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        title="Delete" wire:click='delete({{ $item->id }})'>
                                                        <i class="fa fa-fw fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ optional($item->event)->name }}</td>
                                            <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>

                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $this->albums->links('livewire::bootstrap') }}
                            </div>









                        </div>







                    </div>




                </div>

            </div>





        </div>
    </div>



</div>