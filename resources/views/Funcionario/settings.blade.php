@extends('Layouts.funcionario')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Perfil do usuário</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="#">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Perfil</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="col-lg-12">
                <div class="page-content my-account__edit">
                    <div class="my-account__edit-form">
                        <form name="account_edit_form" action="{{ route('user.update', $user->id) }}" method="POST"
                            class="form-new-product form-style-1 needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                            <fieldset class="name">
                                <div class="body-title">Nome <span class="tf-color-1">*</span>
                                </div>
                                <input class="flex-grow" type="text" placeholder="Full Name" name="name"
                                    tabindex="0" value="{{ $user->nome }}" aria-required="true" required>
                            </fieldset>

                            <fieldset class="name">
                                <div class="body-title">Email <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="email" placeholder="Email Address" name="email"
                                    tabindex="0" value="{{ $user->email }}" aria-required="true">
                            </fieldset>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="my-3">
                                        <h5 class="text-uppercase mb-0">Mudar Senha</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <fieldset class="name">
                                        <div class="body-title pb-3">Senha actual <span class="tf-color-1"></span>
                                        </div>
                                        <input class="flex-grow" type="password" placeholder="Senha actual"
                                            id="old_password" name="old_password" aria-required="true">
                                    </fieldset>

                                </div>
                                <div class="col-md-12">
                                    <fieldset class="name">
                                        <div class="body-title pb-3">Nova senha <span class="tf-color-1"></span>
                                        </div>
                                        <input class="flex-grow" type="password" placeholder="Nova senha" id="new_password"
                                            name="password" aria-required="true">
                                    </fieldset>

                                </div>
                                <div class="col-md-12">
                                    <fieldset class="name">
                                        <div class="body-title pb-3">Confirmar nova senha <span class="tf-color-1"></span>
                                        </div>
                                        <input class="flex-grow" type="password" placeholder="Confirmar nova senha"
                                            cfpwd="" data-cf-pwd="#new_password" id="new_password_confirmation"
                                            name="password_confirmation" aria-required="true">
                                        <div class="invalid-feedback">Passwords did not match!
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <div class="my-3 " style="display: flex;align-items: center;">
                                        <p style="margin-right: 5px">Mostrar senha? </p><input type="checkbox"
                                            class="btn btn-primary tf-button " title="Mostrar senha" id="show-pas">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="my-3">
                                        <button type="submit" class="btn btn-primary tf-button w208">
                                            Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('show-pas').addEventListener('change', (event) => {
            if (event.target.checked) {
                document.getElementById('old_password').type = 'text'
                document.getElementById('new_password_confirmation').type = 'text'
                document.getElementById('new_password').type = 'text'

            } else {
                document.getElementById('old_password').type = 'password'
                document.getElementById('new_password_confirmation').type = 'password'
                document.getElementById('new_password').type = 'password'
            }

        })
    </script>
@endsection
