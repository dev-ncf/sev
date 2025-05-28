@extends('Layouts.auth')
@section('admin-content')
    <div class="main-content-wrap">

        <!-- new-category -->

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center">

            <img class="logo" src="{{ asset('images/logo/logour.png') }}" width="100" height="100"
                style="align-self: center">
            <h3 style="color: #000088">Universidade Rovuma</h3>
            <h4
                style="text-decoration: underline;text-transform: uppercase;color: #000088; text-shadow: -1px 2px;margin-bottom: 20px">
                Suporte ao usuario</h4>
        </div>
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('recuperar-senha') }}" method="POST"
                enctype="multipart/form-data" id="form-principal">
                @csrf

                <div class="flex items-center flex-wrap justify-between gap20 mb-27" id="div-1">
                    <h3> Recuperação de Senha</h3>
                    <fieldset class="name">
                        <div class="body-title">Email <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="" name="email" tabindex="0" value=""
                            aria-required="true" required>
                        <div style="display: block "><span class="error"></span></div>
                    </fieldset>

                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit" id="btn-1">Verificar Senha</button>
                    </div>
                    <div class="bot">
                        <div></div>
                        <a href="/" class="tf-button w208" id="btn-1">Voltar ao login</a>
                    </div>


                </div>

            </form>
        </div>
    </div>
@endsection
