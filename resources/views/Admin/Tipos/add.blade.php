@extends('Layouts.admin')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3> Infomações do Tipo</h3>
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
                    <a href="#">
                        <div class="text-tiny">Tipo</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Novo Tipo</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('tipoSolicitacao.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Nome <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Nome do Departamento" name="nome" tabindex="0"
                        value="" aria-required="true" required="">
                </fieldset>
                <fieldset class="name">
                    <div class="body-title"> Descrição <span class="tf-color-1"></span></div>
                    <input class="flex-grow" type="text" placeholder="Descrição do Departamento" name="descricao"
                        tabindex="0" aria-required="true">
                </fieldset>



                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
