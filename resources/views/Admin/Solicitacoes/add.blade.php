@extends('Layouts.admin')
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

        <form class="tf-section- form-add-product" method="POST" enctype="multipart/form-data"
            action="{{ route('solicitacao.store') }}">
            @csrf
            <input type="hidden" name="estudante_id" id="estudante_id">
            <div class="wg-box">
                @if ($tipos->count() > 0)
                    <h6 style="color: rgb(174, 151, 4)">Selecione o tipo de solicitação, baixe o documento a caso seja
                        fornecido
                        abaixo, preenche
                        devidamente e submeta como anexo da
                        solicitação!</h6>
                    @foreach ($tipos as $tipo)
                        @if ($tipo->arquivo)
                            <fieldset class="description file-field" data-tipo-id="{{ $tipo->id }}"
                                style="display: none;">
                                <div class="body-title mb-10" style="display: flex;align-items: center; gap: 2rem">
                                    <a href="{{ route('gerar.pdf', [0, 0]) }}" class="tf-button" target="_blank"
                                        id="botao-download">Baixar
                                        o protocolo</a>
                                    {{-- <a href="{{ asset('storage/' . $tipo->arquivo) }}" class="tf-button"
                                        target="_blank">Baixar
                                        o documento</a> --}}
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

    <div style="position: fixed; top:0;left:0; display:flex;justify-content: center;align-items: center;background-color: #0000005c;height:100%;padding:25%"
        id="s-modal">
        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" id="input-pesquisa" placeholder="Search here..." class=""
                                name="search" tabindex="2" value="" aria-required="true" autofocus>
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>

            </div>
            @php
                $count = 0;
            @endphp
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Apelido</th>
                                <th>Curso</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($estudantes->count() > 0)
                                @foreach ($estudantes as $estudante)
                                    <tr>
                                        <td class="pname">

                                            <div class="name">
                                                <a style="cursor: pointer" estudante-id='{{ $estudante->id }}'
                                                    class="body-title-2 estudante-link">{{ $estudante->nome }}</a>
                                            </div>
                                        </td>
                                        <td>{{ $estudante->apelido }}</td>
                                        <td>{{ $estudante->curso->nome }}</td>

                                    </tr>
                                    @php
                                        $count = $count + 1;
                                    @endphp
                                    @if ($count > 7)
                                        @break
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <div>
                                            <img src="{{ asset('images/assets/communication.png') }}" alt="">
                                            <p>Nenhum dado foi encontrado!</p>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('s-modal');
            const tipoSelect = document.getElementById('tipoSelect');
            const estudantes = @json($estudantes);
            const input = document.getElementById('input-pesquisa');
            const tbody = document.querySelector('.table tbody');
            const fileFields = document.querySelectorAll('.file-field');

            let estudanteSelecionadoId = null;

            function renderTabela(dados) {
                tbody.innerHTML = '';

                if (dados.length === 0) {
                    tbody.innerHTML = `
                    <tr>
                        <td colspan="3" class="text-center">
                            Nenhum resultado encontrado.
                        </td>
                    </tr>`;
                    return;
                }

                dados.forEach(est => {


                    // Adiciona o input no formulário (ou onde você
                    const linha = document.createElement('tr');

                    linha.innerHTML = `

                    <td class="pname">
                        <div class="name">
                            <a style="cursor: pointer" estudante-id="${est.id}" class="body-title-2 estudante-link">
                                ${est.nome}
                            </a>
                        </div>
                    </td>
                    <td>${est.apelido}</td>
                    <td>${est.curso.nome}</td>
                `;

                    tbody.appendChild(linha);
                });

                document.querySelectorAll('.estudante-link').forEach(link => {
                    link.addEventListener('click', function(e) {
                        const input = document.getElementById('estudante_id');

                        input.classList.add('pname');
                        e.preventDefault();
                        estudanteSelecionadoId = this.getAttribute('estudante-id');
                        modal.style.display = 'none';
                        input.value = estudanteSelecionadoId;
                        const tipoId = tipoSelect.value;
                        if (tipoId) {
                            const field = document.querySelector(
                                `.file-field[data-tipo-id="${tipoId}"]`);
                            const botaoDownload = field?.querySelector('a');

                            if (botaoDownload) {
                                const novaUrl =
                                    "{{ route('gerar.pdf', ['estudante' => ':id', 'tipo' => ':tipo']) }}"
                                    .replace(':id', estudanteSelecionadoId)
                                    .replace(':tipo', tipoId);
                                botaoDownload.setAttribute('href', novaUrl);
                            }
                        }
                    });
                });
            }

            input.addEventListener('input', function() {
                const termo = input.value.toLowerCase().trim();

                const filtrados = estudantes.filter(est => {
                    return (
                        est.nome.toLowerCase().includes(termo) ||
                        est.apelido.toLowerCase().includes(termo) ||
                        est.curso.nome.toLowerCase().includes(termo)
                    );
                });

                renderTabela(filtrados);
            });

            tipoSelect.addEventListener('change', function() {
                const tipoId = this.value;

                fileFields.forEach(field => field.style.display = 'none');

                const selectedField = document.querySelector(`.file-field[data-tipo-id="${tipoId}"]`);
                if (selectedField) {
                    selectedField.style.display = 'flex';
                }

                if (!estudanteSelecionadoId) {
                    alert('Por favor, selecione primeiro um estudante.');
                    return;
                }

                const botaoDownload = selectedField?.querySelector('a');
                if (botaoDownload) {
                    const novaUrl = "{{ route('gerar.pdf', ['estudante' => ':id', 'tipo' => ':tipo']) }}"
                        .replace(':id', estudanteSelecionadoId)
                        .replace(':tipo', tipoId);
                    botaoDownload.setAttribute('href', novaUrl);
                }
            });

            renderTabela(estudantes);
        });
    </script>



@endsection
