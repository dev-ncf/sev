@extends('Layouts.estudante')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Nova Solicitação</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="index-2.html">
                        <div class="text-tiny">Dashboard</div>
                    </a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="all-product.html">
                        <div class="text-tiny">Solicitações</div>
                    </a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>
                    <div class="text-tiny">Nova Solicitação</div>
                </li>
            </ul>
        </div>

        <form class="tf-section form-add-product" method="POST" enctype="multipart/form-data"
            action="{{ route('estudante.solicitacao.store') }}">
            @csrf
            <div class="wg-box">
                @if ($tipos->count() > 0)
                    @foreach ($tipos as $tipo)
                        @if ($tipo->arquivo)
                            <h6 style="color: red">Sele de solicitação, baixe o documento a caso seja fornecido
                                abaixo, preenche
                                devidamente e submeta como anexo da
                                solicitação!</h6>
                            <fieldset class="description file-field" data-tipo-id="{{ $tipo->id }}"
                                style="display: none;">
                                <div class="body-title mb-10" style="display: flex;align-items: center; gap: 2rem">
                                    <span style="width: 200px; overflow: hidden;">{{ basename($tipo->arquivo) }}</span>
                                    <a href="{{ asset('storage/' . $tipo->arquivo) }}" class="tf-button"
                                        target="_blank">Baixar
                                        o documento</a>
                                </div>
                            </fieldset>
                        @endif
                    @endforeach
                @endif
                <fieldset class="name">
                    <div class="body-title mb-10">Tipo de Solicitação <span class="tf-color-1">*</span></div>
                    <select name="tipo_id" id="tipoSelect" required class="mb-10">
                        <option value="" selected disabled>Selecione uma opção</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                        @endforeach
                    </select>
                    <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                </fieldset>

                <fieldset class="description">
                    <div class="body-title mb-10">Descrição</div>
                    <textarea name="descricao" placeholder="Description" class="mb-10"></textarea>
                </fieldset>



                <div class="wg-box">
                    <fieldset>
                        <div class="body-title">Anexar documentos <span class="tf-color-1">*</span>
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
                                    <input type="file" id="myFile" name="files[]" multiple required>
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

                    <div class="cols gap10">
                        <button class="tf-button w-full" type="submit">Solicitar</button>
                    </div>
                </div>
        </form>
    </div>


    <script>
        document.getElementById('tipoSelect').addEventListener('change', function() {
            const selectedId = this.value;
            const fileFields = document.querySelectorAll('.file-field');

            // Oculta todos os fieldsets
            fileFields.forEach(field => field.style.display = 'none');

            // Mostra apenas o fieldset do tipo selecionado
            const selectedField = document.querySelector(`.file-field[data-tipo-id="${selectedId}"]`);
            if (selectedField) {
                selectedField.style.display = 'flex';
            }
        });
    </script>


@endsection
