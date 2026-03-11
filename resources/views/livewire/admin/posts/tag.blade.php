<div>

        <div class="block bg-transparent border-0 shadow-none">
            <div class="block-header">
                <h3 class="block-title">Etiquetas</h3>
            </div>
            <div class="block-content">

                <div class="row">

                    <div class="col-12">

                        <div class="row">

                            <div class="col-md-3">
                                <div class="block">
                                    <div class="block-header">
                                        <h3 class="block-title">Nova Etiqueta</h3>
                                    </div>
                                    <div class="block-content pb-4">

    <form action="#" method="POST" wire:submit.prevent='save()'>


                                        <div class="form-group">
                                            <label for="name" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="name" placeholder="Nome da Etiqueta"
                                                wire:model="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" class="form-control" id="slug" placeholder="Slug"
                                                wire:model="slug" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="excerpt" class="form-label">Etiqueta Superior</label>
                                            <select class="form-control" id="excerpt" wire:model="excerpt">
                                                <option value="">Selecione uma etiqueta superior</option>
                                                @foreach($tags??[] as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="form-label">Descrição</label>
                                            <textarea class="form-control" id="description" rows="3" wire:model="description"></textarea>
                                        </div>
                                        <div class="form-group pt-4">
                                            <button class="btn btn-info btn-sm">Salvar</button>
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
                            <th>Slug</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->tags as $item)
                            
                        <tr>
                            <td class="text-center">
                               <input type="checkbox" name="selected_items[]" id="item_1" value="1">
                            </td>
                            <td>
                                <a href="be_pages_generic_profile.html" class="d-block">{{ $item->name }}</a>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip"
                                        title="Edit">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-alt-secondary" title="Delete" wire:click='delete({{ $item->id }})'>
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                            
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
                {{ $this->tags->links('livewire::bootstrap') }}
            </div>









                            </div>







                        </div>




                    </div>

                </div>





            </div>
        </div>



</div>