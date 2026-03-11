<div>
    
                      @if (session()->has('message'))
                          <div class="alert alert-success">
                              {{ session('message') }}
                          </div>
                          
                      @else
                          @if (session()->has('error'))
                              <div class="alert alert-danger">
                                  {{ session('error') }}
                              </div>
                          @endif
                      @endif

    <!-- Full Table -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Artigos <a href="{{ route('web.admin.users.add') }}" class="ms-2 btn btn-info btn-sm rounded-0">Adicionar</a></h3>
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
                                <input type="checkbox" name="" id="">
                            </th>
                            <th>Nome</th>
                            <th>Usuario</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->users as $item)
                            

                        <tr>
                            <td class="text-center">
                               <input type="checkbox" name="selected_items[]" id="item_1" value="1">
                            </td>
                            <td>
                                <a href="be_pages_generic_profile.html" class="d-block">{{ $item->name.' '.$item->last_name  }}</a>
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
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>	Publicado <br>{{ $item->created_at->format('Y/m/d H:i') }}</td>
                            
                        </tr>


                        @endforeach
                        
                    </tbody>
                </table>
                {{ $this->users->links('livewire::bootstrap') }}
            </div>
        </div>
    </div>
    <!-- END Full Table -->
</div>
