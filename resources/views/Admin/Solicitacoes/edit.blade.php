@extends('Layouts.admin')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Edição da Solicitação</h3>
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
                    <div class="text-tiny">Editar Solicitação</div>
                </li>
            </ul>
        </div>

        <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
            action="{{ route('solicitacao.update', $solicitacao->id) }}">
            @csrf
            @method('PUT')
            <div class="wg-box">

                <fieldset class="name">
                    <div class="body-title mb-10">Tipo de Solicitação <span class="tf-color-1">*</span></div>
                    <select name="tipo_id" id="tipoSelect" required class="mb-10">
                        <option value=""  disabled>Selecione uma opção</option>
                        @foreach ($tipos as $tipo)
                            <option {{ $tipo->id == $solicitacao->tipo_id ? 'selected' : '' }} value="{{ $tipo->id }}">
                                {{ $tipo->nome }}</option>
                        @endforeach
                    </select>

                </fieldset>
                <fieldset class="name">
                    <div class="body-title mb-10">Status <span class="tf-color-1">*</span></div>
                    <select name="status" id="tipoSelect" required class="mb-10">
                        <option value="" selected disabled>Selecione uma opção</option>
                        @if (Auth::user()->tipo != 'estudante')
                            <option {{ 'pendente' == $solicitacao->status ? 'selected' : '' }}
                                value="pendente">
                                Pendente</option>
                            <option {{ 'em andamento' == $solicitacao->status ? 'selected' : '' }}
                                value="em andamento">
                                Em andamento</option>
                            <option {{ 'concluida' == $solicitacao->status ? 'selected' : '' }}
                                value="concluida">
                                Concluida</option>
                            <option {{ 'rejeitada' == $solicitacao->status ? 'selected' : '' }}
                                value="rejeitada">
                                Rejeitada</option>
                        @else
                            <option selected value="{{ $solicitacao->status }}">
                                {{ $solicitacao->status }} </option>
                        @endif

                    </select>

                </fieldset>
                {{-- @if (Auth::user()->tipo != 'estudante') --}}
                <fieldset class="name">
                    <div class="body-title mb-10">Prioridade <span class="tf-color-1">*</span></div>
                    <select name="prioridade" id="prioridade" required class="mb-10">
                        <option value="" {{ null == $solicitacao->prioridade ? 'selected' : '' }} disabled>Selecione
                            uma opção
                        </option>
                        <option value="baixa" {{ 'baixa' == $solicitacao->prioridade ? 'selected' : '' }}>
                            Baixa</option>
                        <option value="normal" {{ 'normal' == $solicitacao->prioridade ? 'selected' : '' }}>
                            Normal</option>
                        <option value="alta" {{ 'alta' == $solicitacao->prioridade ? 'selected' : '' }}>Alta
                        </option>


                    </select>

                </fieldset>
                {{-- @endif --}}

                <fieldset class="description">
                    <div class="body-title mb-10">Descrição</div>
                    <textarea name="descricao" placeholder="Description" class="mb-10">{{ $solicitacao->descricao }}</textarea>
                </fieldset>

                @if ($solicitacao->anexos->count() > 0)
                    <h6 style="" id="delete-form">Documentos anexados</h6>
                    @foreach ($solicitacao->anexos as $tipo)
                        <fieldset class="description file-field" data-tipo-id="{{ $tipo->id }}" style="display: flex;">
                            <div class="body-title mb-10" style="display: flex;align-items: center; gap: 2rem">
                                <span style="width: 200px; overflow: hidden;">{{ basename($tipo->arquivo) }}</span>
                                <a href="{{ asset('storage/' . $tipo->arquivo) }}" class="tf-button" target="_blank">Baixar
                                </a>


                                    <div class="tf-button item text-danger delete" id="delete-{{ $tipo->id }}"
                                        rota="anexo" onclick="return confirmDeletion(event)" dado='{{ $tipo->id }}'>
                                        <i class="icon-trash-2"></i>
                                    </div>

                            </div>
                        </fieldset>
                    @endforeach
                @endif

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
                                    <input type="file" id="myFile" name="files[]" multiple >
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
                        <button class="tf-button w-full" type="submit">Actualizar</button>
                    </div>
                </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('tipoSelect').addEventListener('change', function() {
                const selectedId = this.value;
                const fileFields = document.querySelectorAll('.file-field');
                fileFields.forEach(field => field.style.display = 'none');
                const selectedField = document.querySelector(`.file-field[data-tipo-id="${selectedId}"]`);
                if (selectedField) {
                    selectedField.style.display = 'block';
                }
            });


        });

        function deletarForm(form) {

            console.log(document.querySelector(form));
        }
    </script>

@endsection
