



<div>









                <!-- Page Content -->
                <div class="bg-body-dark bg-pattern" style="background-image: url('{{ url("a_assets/media/various/bg-pattern-inverse.png") }}');">
                    <div class="row mx-0 justify-content-center">
                        <div class="hero-static col-lg-6 col-xl-4">
                            <div class="content content-full overflow-hidden">
                                <!-- Header -->
                                <div class="py-30 text-center">
                                    <a class="link-effect font-w700" href="{{ route('web.public.home') }}">
                                        <img src="{{ url('assets/images/logo.png') }}" alt="" class="">
                                    </a>

                                </div>
                                <!-- END Header -->

                            
                                <form wire:submit.prevent="login" method="post">
                                    <div class="block block-themed block-rounded block-shadow">
                                        <div class="block-header bg-gd-dusk">
                                            <h3 class="block-title">Digite o seu usuario e senha</h3>
                                            <div class="block-options">
                                                <a class="btn-block-option" href="{{ url('web.public.home') }}">
                                                    <i class="si si-home"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="block-content">

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

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="user">Usuario</label>
                                                    <input type="text" class="form-control" wire:model="user" name="user">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="password">Senha</label>
                                                    <input type="password" class="form-control" wire:model="password" name="password">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-sm-6 d-sm-flex align-items-center push">
                                                    <div class="custom-control custom-checkbox mr-auto ml-0 mb-0">
                                                        <input type="checkbox" class="custom-control-input" wire:model='remember' name="emember">
                                                        <label class="custom-control-label" for="remember">Guardar sessao</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-sm-right push">
                                                    <button type="submit" class="btn btn-alt-primary">
                                                        <i class="si si-login mr-10"></i> Entrar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-content bg-body-light">
                                            <div class="form-group text-center">
                                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('web.admin.auth.forgot') }}">
                                                    <i class="fa fa-warning mr-5"></i> Esqueceu sua senha?
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->











</div>