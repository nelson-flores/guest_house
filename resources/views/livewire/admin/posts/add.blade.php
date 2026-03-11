<div>
    <form action="#" method="POST" wire:submit.prevent="save()">

        <div class="block bg-transparent border-0 shadow-none">
            <div class="block-header">
                <h3 class="block-title">Adicionar novo post</h3>
                <div class="block-options">
                    <div class="btn-group">

                        <a href="{{ route('web.admin.posts.index') }}" class="btn btn-sm btn-default"><i
                                class="fa fa-arrow-left"></i> Voltar a Lista de Artigos</a>
                        <button class="btn btn-info btn-sm">Publicar</button>
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

                            <div class="col-md-8 col-lg-9">
                                <div class="form-group">
                                    <label for="title" class="form-label">Titulo</label>
                                    <input type="text" class="form-control" id="title" placeholder="Titulo do Post"
                                        wire:model="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="content" class="form-label">Conteúdo</label>
                                    <div wire:ignore>
                                        <textarea class="form-control" id="editor" wire:model="content">
                                        </textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <div class="block">
                                    <div class="block-header">
                                        <h3 class="block-title">Configurações</h3>
                                    </div>
                                    <div class="block-content pb-4">

                                        <div class="form-group">
                                            <label for="thumbnail" class="form-label">Imagem de Destaque</label>
                                            <input type="file" class="form-control" id="thumbnail"
                                                wire:model="thumbnail">
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="form-label">Estado</label>
                                            <select class="form-control" id="status" wire:model="status" required>
                                                <option value="">Selecione o estado</option>
                                                <option value="draft">Rascunho</option>
                                                <option value="published" selected>Publico</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="category" class="form-label">Categoria</label>
                                            <div wire:ignore>
                                            <select class="form-control js-select2" id="category" wire:model="selectedCategories"
                                                multiple>
                                                <option value="">Selecione uma categoria</option>
                                                @foreach($this->categoriesList as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tags" class="form-label">Tags</label>
                                            <div wire:ignore>
                                            <select class="form-control js-select2" id="tags" wire:model="selectedTags" multiple>
                                                @foreach($this->tagsList as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
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


    @script
    <script type="text/javascript">

        $('#editor').summernote({
            height: 500,
            callbacks: {
                onImageUpload: function (files) {
                    uploadImage(files[0]);
                },
                onChange: function (contents, $editable) {
                  @this.set('content', contents);
                }
            }
        });
        
        One.helpersOnLoad(['jq-select2']);
    </script>
    @endscript

</div>