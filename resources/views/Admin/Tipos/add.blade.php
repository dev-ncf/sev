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


                <fieldset>
                    <div class="body-title">Anexar documentos <span class="tf-color-1"></span>
                    </div>

                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="upload-1.html" class="effect8" alt="">
                        </div>
                        <div id="upload-area" class="item up-load">
                            <label class="uploadfile" for="myFile" id="upload-label">
                                <div class="upload-container">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <p class="upload-text">Selecione todo documentos necessários para
                                        candidatura<strong class="tf-color">clique
                                            para
                                            navegar</strong></p>
                                </div>
                                <input type="file" id="myFile" name="file">
                                <span class="error"></span>
                            </label>

                        </div>

                        <!-- Área para exibir as imagens carregadas -->
                        <div id="preview" class="preview-container" style="display: none;"></div>

                        <!-- Botão para adicionar mais imagens -->
                        <button id="add-more-btn" type="button" style="display: none;">+</button>

                        <!-- Modal para visualizar imagem em tamanho maior -->
                        <div id="image-modal" class="modal" style="display: none;">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="modal-img">
                        </div>
                    </div>

                </fieldset>
                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
