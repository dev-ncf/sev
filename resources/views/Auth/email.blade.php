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
                Registo de estudante</h4>
        </div>
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('email-verify', $user->id) }}" method="POST"
                enctype="multipart/form-data" id="form-principal">
                @csrf

                <div class="flex items-center flex-wrap justify-between gap20 mb-27" id="div-1">
                    <h3> Verificação de email</h3>
                    <fieldset class="name">
                        <div class="body-title">Email <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="" name="email" tabindex="0"
                            value="{{ $user->email }}" aria-required="true" required readonly>
                        <div style="display: block "><span class="error"></span></div>
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title">Codigo de Verificação <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Codigo de 6 digitos" name="code"
                            tabindex="0" aria-required="true" required style="font-size: 24pt" autofocus>
                        <div style="display: block "><span class="error"></span></div>
                    </fieldset>


                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit" id="btn-1">Verificar</button>
                    </div>
                    <div class="bot">
                        <div></div>
                        <a class="tf-button w208" href="{{ route('reenviar-email', $user->id) }}">Reenviar o código</a>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
