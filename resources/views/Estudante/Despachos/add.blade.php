@extends('Layouts.estudante')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Novo Despacho</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="index-2.html">
                        <div class="text-tiny">Dashboard</div>
                    </a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="all-product.html">
                        <div class="text-tiny">Despachos</div>
                    </a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>
                    <div class="text-tiny">Novo Despacho</div>
                </li>
            </ul>
        </div>

        <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
            action="{{ route('despacho.store') }}">
            @csrf
            <div class="wg-box">
                <input type="hidden" name="funcionario_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="solicitacao_id" value="{{ $solicitacao->id }}">
                <fieldset class="name">
                    <div class="body-title">Estudante <span class="tf-color-1"></span></div>
                    <input class="flex-grow" type="text" placeholder="" name="estudante" tabindex="0"
                        value="{{ $solicitacao->user->nome }}" aria-required="true" required readonly>
                    <span class="error"></span>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Solicitação <span class="tf-color-1"></span></div>
                    <input class="flex-grow" type="text" placeholder="" name="solicitacao" tabindex="0"
                        value="{{ $solicitacao->tipo->nome }}" aria-required="true" required readonly>
                    <span class="error"></span>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title mb-10">Status <span class="tf-color-1">*</span></div>
                    <select name="status" placeholder="Description" class="mb-10" required>
                        <option value="" selected disabled>Selecione uma opção</option>
                        <option value="Devolvida">Devolvida</option>
                        <option value="Aprovada">Aprovada</option>
                        <option value="Rejeitada">Rejeitada</option>
                    </select>
                </fieldset>
                <fieldset class="description">
                    <div class="body-title mb-10">Descrição</div>
                    <textarea name="descricao" placeholder="Description" class="mb-10" autofocus></textarea>
                </fieldset>

            </div>

            <div class="wg-box">
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
                                <input type="file" id="myFile" name="files[]">
                                <span class="error"></span>
                            </label>

                        </div>

                        <!-- Área para exibir as imagens carregadas -->
                        <div id="preview" class="preview-container" style="display: none;"></div>

                        <!-- Botão para adicionar mais imagens -->
                        <button id="add-more-btn" type="button" style="display: none ;"></button>
                        <style>
                            #add-more-btn {
                                display: none !important;
                            }
                        </style>

                        <!-- Modal para visualizar imagem em tamanho maior -->
                        <div id="image-modal" class="modal" style="display: none;">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="modal-img">
                        </div>
                    </div>

                </fieldset>

                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Despachar</button>
                </div>
            </div>
        </form>
    </div>



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
