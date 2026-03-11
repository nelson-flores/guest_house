<div>

                    <form action="#" method="POST" wire:submit.prevent="save()"  enctype="multipart/form-data">

    <div class="block bg-transparent border-0 shadow-none">
        <div class="block-header">
            <h3 class="block-title">Adicionar Evento</h3>
            <div class="block-options">
                <div class="btn-group">

                    <a href="{{ route('web.admin.events.index') }}" class="btn btn-sm btn-default"><i
                            class="fa fa-arrow-left"></i> Voltar a Lista de Eventos</a>
                </div>
            </div>
        </div>
        <div class="block-content">
@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@elseif (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
            <div class="row">

                <div class="col-12">
<div class="row">
    

                        <div class="col-md-8">
                            <div class="block">
                                <div class="block-content row">

                                    <div class="form-group col-md-6">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="name" wire:model.defer="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image" class="form-label">Tipo</label>
                                        <select class="form-control" id="status" wire:model.defer="type" required>
                                            <option value="">Selecione o tipo</option>
                                            <option value="exhibition">Exposicao</option>
                                            <option value="conference">Conferencia</option>
                                            <option value="workshop">Workshop</option>
                                            <option value="other">Outro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="excerpt" class="form-label">Edicao</label>
                                        <input type="number" class="form-control" id="name" wire:model.defer="edition_number">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="excerpt" class="form-label">Endereco</label>
                                        <input type="text" class="form-control" id="name" wire:model.defer="address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="excerpt" class="form-label">Data de Inicio</label>
                                        <input type="date" class="form-control" id="name" wire:model.defer="start_date">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="excerpt" class="form-label">Data de Termino</label>
                                        <input type="date" class="form-control" id="name" wire:model.defer="end_date">
                                    </div>
                                        <div class="form-group col-12">
                                            <label for="description" class="form-label">Descrição</label>
                                            <textarea class="form-control" id="description" rows="3" wire:model="description"></textarea>
                                        </div>
                                    <div class="form-group">
                                        <button class="my-3 btn btn-info rounded-0">Adicionar</button>
                                    </div>
                                </div>
                            </div>


                        </div>







                    </div>




                </div>

            </div>





        </div>
    </div>

</form>

</div>