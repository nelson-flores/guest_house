<div>

    @section('header')
    @include('elements.public.nav-outer')

    <header class="header-image ken-burn-center light" data-parallax="true" data-natural-height="538"
        data-natural-width="1280" data-bleed="0" data-image-src="{{ url('landing/media/fena2025/bg.jpeg') }}"
        data-offset="0">
        <div class="container">
            <h1>Cadastre-se Como Expositor</h1>
            <h2>Formulario de manifestacao de interesse</h2>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Pagina Inicial</a></li>
                <li>Form</li>
            </ol>
        </div>
    </header>
    @endsection

    <main>




        <section class="section-base">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="boxed-area">
                            <div class="title">
                                <p>Manifestação de Interesse</p>
                            </div>

                            <h4 class="text-justify">
                                Este formulário destina-se à manifestação de interesse para aquisição de um stand de
                                exposição na FENA 2026.
                            </h4>
                        </div>


                    </div>
                    <div class="col-lg-8">




                        <style>
                            .input-text::placeholder,
                            .input-textarea::placeholder,
                            select:required:invalid {
                                color: #999;
                            }

                            .input-text.required::placeholder::after {
                                content: " *";
                                color: red;
                            }

                            .form-label {
                                color: #000;
                                text-transform: uppercase
                            }
                        </style>
                        <form class="form-box text-dark" wire:submit.prevent="submit">

                            <div class="row mt-3">

                                <div class="col-lg-6">
                                    <label class="form-label">
                                        Nome da Entidade / Empresa <span style="color:red">*</span>
                                    </label>
                                    <input wire:model.defer="company_name" type="text" class="input-text"
                                        placeholder="Nome da Entidade / Empresa" required
                                        pattern="^[A-Za-zÀ-ÿ0-9\s]{3,}$" title="Informe pelo menos 3 caracteres">
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">
                                        Nome do Responsável <span style="color:red">*</span>
                                    </label>
                                    <input wire:model.defer="full_name" type="text" class="input-text"
                                        placeholder="Nome do Responsável" required pattern="^[A-Za-zÀ-ÿ\s]{3,}$"
                                        title="Use apenas letras">
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">
                                        Ramo de Actividade <span style="color:red">*</span>
                                    </label>
                                    <input wire:model.defer="company_activity" type="text" class="input-text"
                                        placeholder="Ramo de Actividade" required pattern="^[A-Za-zÀ-ÿ\s]{3,}$">
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">
                                        Endereço <span style="color:red">*</span>
                                    </label>
                                    <input wire:model.defer="address" type="text" class="input-text"
                                        placeholder="Endereço" required pattern=".{5,}" title="Endereço muito curto">
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">
                                        Telefone / WhatsApp <span style="color:red">*</span>
                                    </label>
                                    <input wire:model.defer="phone" type="text" class="input-text"
                                        placeholder="8xxxxxxxx ou +258xxxxxxxx" required
                                        pattern="^(\+258)?8[4-7][0-9]{7}$" title="Número inválido. Ex: 84xxxxxxx">
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">
                                        Email <span style="color:red">*</span>
                                    </label>
                                    <input wire:model.defer="email" type="email" class="input-text"
                                        placeholder="exemplo@email.com" required>
                                </div>

                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="form-label">
                                        Espaço Expositivo <span style="color:red">*</span>
                                    </label>
                                    <select wire:model="event_payment_plan_id" class="input-text" required>
                                        <option value="">— Selecione o espaço expositivo —</option>
                                        @foreach ($this->plans as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }} - {{ money($item->price) }} MZN
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <!-- CAMPOS NÃO OBRIGATÓRIOS -->
                            <div class="mb-3">
                                <label class="form-label">Necessidades especiais</label>
                                <textarea wire:model.defer="special_needs" class="input-textarea"
                                    placeholder="Ex: acessibilidade, energia extra, etc."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Observações adicionais</label>
                                <textarea wire:model.defer="additional_observations" class="input-textarea"
                                    placeholder="Outras informações relevantes"></textarea>
                            </div>

                            <div class="form-checkbox mt-3">
                                <input type="checkbox" wire:model="confirmacao" required>
                                <label>
                                    Declaro que as informações são verdadeiras.
                                    <span style="color:red">*</span>
                                </label>
                            </div>
                            @if (session()->has('error'))
                            <div class="alert alert-danger mt-2">
                                {{ session('error') }}
                            </div>
                            @endif


                            @if (session()->has('success'))
                            <div class="alert alert-success mt-2">
                                {{ session('success') }}
                            </div>
                            @endif


                            @if (empty($registration_id))
                            <button class="btn btn-xs mt-3" type="submit" wire:loading.attr="disabled">
                                <span wire:loading.remove>Submeter Manifestação de Interesse</span>
                                <span wire:loading>
                                    <i class="fa fa-spinner fa-spin mx-1"></i> Processando...
                                </span>
                            </button>
                            @endif

                            @if (!empty($registration_id))
                            <button class="btn btn-xs mt-3" type="button" wire:click="download({{ $registration_id }})"
                                wire:loading.attr="disabled">
                                <span wire:loading.remove>Baixe o seu formulario em PDF</span>
                                <span wire:loading>
                                    <i class="fa fa-spinner fa-spin mx-1"></i> Baixando...
                                </span>
                            </button>
                            @endif

                        </form>






                    </div>
                </div>
            </div>
        </section>





    </main>


</div>