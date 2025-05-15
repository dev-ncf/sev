@extends('Layouts.funcionario')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3> Infomações da curso</h3>
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
                        <div class="text-tiny">Cursos</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Novo Curso</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('funcionario.curso.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <fieldset class="name">
                    <div class="body-title"> Faculdade <span class="tf-color-1"></span></div>
                    <select class="flex-grow" type="text" placeholder="Descrição" name="departamento_id" tabindex="0"
                        aria-required="true">
                        <option value="" selected disabled>Selecione uma opção</option>
                        @foreach ($faculdades as $faculdade)
                            @if ($faculdade->id == Auth::user()->funcionario->departamento_id)
                                <option value="{{ $faculdade->id }}" selected>{{ $faculdade->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Nome <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Nome da Curso" name="nome" tabindex="0"
                        value="" aria-required="true" required="">
                </fieldset>
                <fieldset class="name">
                    <div class="body-title"> Descrição <span class="tf-color-1"></span></div>
                    <input class="flex-grow" type="text" placeholder="Descrição" name="descricao" tabindex="0"
                        aria-required="true">
                </fieldset>

                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
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
    </script>

    <style>
        /* Estilos para o preview das imagens */
        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .preview-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .preview-img:hover {
            transform: scale(1.1);
        }

        /* Botão de adicionar mais */
        #add-more-btn {
            height: 32px;
            width: 32px;
            margin-top: 80px;

            border: none;
            background-color: #808080;
            color: white;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
        }

        #add-more-btn:hover {
            background-color: #0056b3;
        }

        /* Modal para ampliar imagens */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
        }

        .close {
            position: absolute;
            top: 15px;
            right: 25px;
            color: white;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
@endsection
