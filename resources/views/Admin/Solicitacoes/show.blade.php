@extends('Layouts.admin')

@section('admin-content')

    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Detalhes da solicitação</h3>
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
                        <div class="text-tiny">solicitação</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <h5>Dados da estudante</h5>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('solicitacoes') }}">Voltar</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Cód. Estudante</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Genero</th>
                                <th class="text-center">Curso</th>
                                <th class="text-center">Data Nascimento</th>
                                <th class="text-center">Nivel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td class="text-center">
                                    {{ $solicitacao->user->estudante->matricula }}

                                </td>
                                <td class="text-center">
                                    {{ $solicitacao->user->estudante->nome . ' ' . $solicitacao->user->estudante->apelido }}
                                </td>
                                <td class="text-center">{{ $solicitacao->user->estudante->genero }}</td>
                                <td class="text-center">{{ $solicitacao->user->estudante->curso->nome }}</td>
                                <td class="text-center">{{ $solicitacao->user->estudante->data_nascimento }}</td>
                                <td class="text-center">{{ $solicitacao->user->estudante->nivel }}º Ano</td>

                                {{-- <td class="text-center">
                                    <div class="list-icon-function view-icon">
                                        <div class="item">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </div>
                                </td> --}}
                            </tr>


                        </tbody>
                    </table>
                </div>

                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                </div>
            </div>
            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <h5>Solicitação
                            {{ $encaminhamento ? ' está actualmente encaminhada para a Direcção do(a) ' . $encaminhamento->departamento->nome : '' }}
                        </h5>

                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Inicio</th>
                                <th class="text-center">Fim</th>
                                <th class="text-center">Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td class="text-center">
                                    {{ $solicitacao->tipo->nome }}

                                </td>
                                <td class="text-center">
                                    {{ $solicitacao->data_criacao }}
                                </td>
                                <td class="text-center">{{ $solicitacao->data_conclusao }}</td>
                                <td class="text-center">{{ $solicitacao->status }}</td>

                                {{-- <td class="text-center">
                                    <div class="list-icon-function view-icon">
                                        <div class="item">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </div>
                                </td> --}}
                            </tr>


                        </tbody>
                    </table>
                </div>

                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                </div>
            </div>

            <div class="wg-box mt-5">
                <h5>Documentos Anexados</h5>

                @if ($solicitacao->anexos->count())
                    @foreach ($solicitacao->anexos as $anexo)
                        <fieldset class="description ">

                            <div class="body-title mb-10" style="display: flex;align-items: center; gap: 2rem">
                                <span style="width: 200px; overflow: hidden;">{{ basename($anexo->arquivo) }}</span>

                                <a href="{{ asset('storage/' . $anexo->arquivo) }}" class="tf-button "
                                    target="_blank">Baixar o
                                    documento</a>
                            </div>
                        </fieldset>
                    @endforeach
                @endif
                @if (Auth::user()->tipo == 'estudante')
                    <form action="{{ route('solicitacao.add.documento') }}" class="wg-box" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <fieldset>
                            <div class="body-title">Anexar documentos <span class="tf-color-1"></span>
                            </div>
                            <input type="hidden" value="{{ $solicitacao->id }}" name="solicitacao_id">
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
                                        <input type="file" id="myFile" name="files[]" multiple>
                                        <span class="error"></span>
                                    </label>

                                </div>

                                <!-- Área para exibir as imagens carregadas -->
                                <div id="preview" class="preview-container" style="display: none;"></div>

                                <!-- Botão para adicionar mais imagens -->
                                <button id="add-more-btn" type="button" class="btn btn-primary"
                                    style="display: none;">+</button>

                                <!-- Modal para visualizar imagem em tamanho maior -->
                                <div id="image-modal" class="modal" style="display: none;">
                                    <span class="close">&times;</span>
                                    <img class="modal-content" id="modal-img">
                                </div>
                            </div>

                        </fieldset>

                        <div class="cols gap10">
                            <button class="tf-button w-full" type="submit">Submeter</button>
                        </div>
                    </form>
                @endif
            </div>

            <div class="wg-box mt-5">
                <h5>Despachos</h5>
                <table class="table table-bordered table-transaction">
                    <thead>
                        <tr>
                            <th>Solicitacao</th>
                            <th>Inicio </th>
                            <th>Fim</th>
                            <th>Despachado em </th>
                            <th>Status</th>
                            <th>Acção</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if ($solicitacao->despachos->count() > 0)
                            @foreach ($solicitacao->despachos as $despacho)
                                <tr>

                                    <td>{{ $despacho->solicitacao->tipo->nome }}</td>
                                    <td>{{ $despacho->solicitacao->data_criacao }}</td>
                                    <td>{{ $despacho->status == 'Aprovada' ? $despacho->solicitacao->data_conclusao : '------' }}
                                    </td>
                                    <td>{{ $despacho->created_at }}</td>
                                    <td>{{ $despacho->status }}</td>
                                    <td class="text-center">
                                        <div class="list-icon-function view-icon">
                                            <a href="{{ route('despacho.show', $despacho->id) }}">
                                                <div class="item">
                                                    <i class="icon-eye" style="color: rgba(0, 0, 255, 0.522)"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">
                                    <div>
                                        <img src="{{ asset('images/assets/communication.png') }}" alt="">
                                        <p>Nenhum despacho disponivel, aguarde por favor!</p>
                                    </div>
                                </td>
                            </tr>
                        @endif


                    </tbody>
                </table>
                @if (Auth::user()->tipo == 'funcionario' || Auth::user()->tipo == 'admin')
                    <div class="cols gap10">
                        <a class="tf-button w-full" href="{{ route('despacho.add', $solicitacao->id) }}">Despachar</a>
                    </div>
                    @if (!$encaminhamento)
                        <div class="cols gap10">
                            <a class="tf-button w-full" onclick="encaminhar()">Encaminhar</a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <form id="modal-encaminhar" style="" action="{{ route('solicitacao.encaminar') }}" method="POST">
        @csrf

        <div class="wg-box" style="min-width: 500px;" id="modal-encaminhar-in">
            <h5>Encaminhar a Solicitação</h5>
            <fieldset class="name">
                <div class="body-title mb-10"> Solicitação <span class="tf-color-1"></span></div>
                <select name="solicitacao_id" required class="mb-10">
                    <option value="{{ $solicitacao->id }}" selected>{{ $solicitacao->tipo->nome }}</option>
                </select>
            </fieldset>

            <fieldset class="name">
                <div class="body-title mb-10"> Nível <span class="tf-color-1">*</span></div>
                <select name="departamento_id" required class="mb-10">
                    <option value="" selected disabled>Selecione uma opção</option>

                    <option value="oganica">Orgânica</option>
                    <option value="institucional">Institucional</option>

                </select>
            </fieldset>
            <fieldset class="name">
                <div class="body-title mb-10"> Departamento <span class="tf-color-1">*</span></div>
                <select name="departamento_id" required class="mb-10">
                    <option value="" selected disabled>Selecione uma opção</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->nome }}</option>
                    @endforeach
                </select>
            </fieldset>


            <div class="cols gap10">
                <button class="tf-button w-full" type="submit">Encaminhar</button>
            </div>

        </div>
    </form>
    <style>
        #modal-encaminhar {
            display: none;
            width: 100%;
            height: 100vh;
            justify-content: center;
            align-items: center;
            top: 0;
            left: 0;
            position: fixed;
            background-color: #00000044
        }
    </style>

    <script>
        // Criamos um objeto DataTransfer para armazenar os arquivos selecionados
        let transferDatas = new DataTransfer();



        document.getElementById('myFile').addEventListener('change', function(event) {
            const uploadArea = document.getElementById('upload-area');
            const preview = document.getElementById('preview');
            const addMoreBtn = document.getElementById('add-more-btn');
            const files = event.target.files;
            const inputFile = event.target;

            if (files.length > 0) {
                uploadArea.style.display = 'none';
                preview.style.display = 'flex';
                addMoreBtn.style.display = 'flex';

                // Adiciona os arquivos ao DataTransfer
                Array.from(files).forEach(file => {
                    transferDatas.items.add(file);
                });

                // Atualiza o campo input com os arquivos acumulados
                inputFile.files = transferDatas.files;

                // Exibe os arquivos no preview
                Array.from(files).forEach(file => {
                    const fileItem = document.createElement('div');
                    fileItem.classList.add('file-preview-item');

                    // Verifica se é uma imagem para exibir preview
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.classList.add('preview-img');
                            img.onclick = function() {
                                openModal(e.target.result);
                            };
                            fileItem.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        // Se não for imagem, apenas exibe o nome do arquivo
                        fileItem.textContent = file.name + ";";
                    }

                    preview.appendChild(fileItem);
                });


            }

            console.log(transferDatas.files);
        });;

        // Função para abrir o modal com a imagem em tamanho maior
        function openModal(src) {
            const modal = document.getElementById('image-modal');
            const modalImg = document.getElementById('modal-img');
            modal.style.display = 'block';
            modalImg.src = src;
        }

        // Fechar modal ao clicar no "X"
        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('image-modal').style.display = 'none';
        });

        // Fechar modal ao clicar fora da imagem
        document.getElementById('image-modal').addEventListener('click', function(event) {
            if (event.target === this) {
                this.style.display = 'none';
            }
        });

        // Clique no botão "Adicionar Mais"
        document.getElementById('add-more-btn').addEventListener('click', function() {
            document.getElementById('myFile').click();
        });

        function aoClicar(btn, hide, show, form) {
            var toHide = document.getElementById(hide)
            var toShow = document.getElementById(show)
            var button = document.getElementById(btn)
            var form = document.getElementById(form)



            var campos = toHide.querySelectorAll('[required]');
            var todosPreenchidos = true;
            campos.forEach(function(campo) {
                console.log(campo.name);

                var erroSpan = campo.parentElement.querySelector('.error');
                erroSpan.style.color = 'red';
                erroSpan.style.fontSize = '12px';
                erroSpan.style.padding = '8px 0';
                campo.addEventListener('input', () => {
                    if (campo.value.trim()) {

                        campo.style.setProperty('border', '1px solid #008800', 'important');
                        erroSpan.textContent = '';

                    } else {
                        campo.style.setProperty('border', '1px solid red', 'important');
                        erroSpan.textContent = 'Campo obrigatório';

                    }
                })
                if (!campo.value.trim()) {
                    todosPreenchidos = false;
                    // console.log(campo.name);

                    campo.style.setProperty('border', '1px solid red', 'important');
                    erroSpan.textContent = 'Campo obrigatório';
                } else {
                    campo.style.setProperty('border', '1px solid #008800', 'important');
                    erroSpan.textContent = '';
                }
            });

            if (!todosPreenchidos) {
                event.preventDefault(); // impede envio do formulário
            } else {
                toHide.style.display = 'none'
                toShow.style.display = 'flex'


            }
            button.addEventListener('click', (event) => {
                event.preventDefault()
            })



        }

        function encaminhar() {
            document.getElementById('modal-encaminhar').style.display = 'flex'
        }
        document.getElementById('modal-encaminhar').addEventListener('click', function(e) {
            if (e.target === this) { // verifica se clicou no fundo, e não no conteúdo
                this.style.display = 'none';
            }
        });

        function voltar(hide, show) {
            var toHide = document.getElementById(hide)
            var toShow = document.getElementById(show)



            toHide.style.display = 'none'
            toShow.style.display = 'flex'


        }

        function submeter(form) {
            var fm = document.getElementById(form)
            fm.submit()

        }
    </script>
@endsection
