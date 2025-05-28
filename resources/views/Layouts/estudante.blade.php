<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <title>SAVi</title>
    <meta charset="utf-8">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('font/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />


</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                {{-- <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div> --}}

                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="{{ route('estudante.dashboard') }}" id="site-logo-inner">
                            <img class="" id="logo_header" alt=""
                                src="{{ asset('images/logo/logo.png') }}"
                                data-light="{{ asset('images/logo/logo.png') }}"
                                data-dark="{{ asset('images/logo/logo.png') }}">
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="center">
                        <div class="center-item">
                            <div class="center-heading">Menu Principal</div>

                            <ul class="menu-list">
                                <li
                                    class="menu-item {{ in_array(Route::currentRouteName(), ['estudante.dashboard']) ? 'active' : '' }}">
                                    <a href="{{ route('estudante.dashboard') }}"
                                        class="{{ in_array(Route::currentRouteName(), ['estudante.dashboard']) ? 'active' : '' }}">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Início</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="center-item">
                            <ul class="menu-list">
                                <li
                                    class="menu-item has-children {{ in_array(Route::currentRouteName(), ['estudante.solicitacoes', 'estudante.solicitacao.add', 'estudante.solicitacao.show', 'estudante.solicitacao.edit']) ? 'active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-git-pull-request"></i></div>
                                        <div class="text">Solicitações</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item ">
                                            <a href="{{ route('estudante.solicitacao.add') }}"
                                                class="{{ Route::currentRouteName() == 'estudante.solicitacao.add' ? 'active' : '' }}">
                                                <div class="text">Adicionar</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('estudante.solicitacoes') }}"
                                                class="{{ Route::currentRouteName() == 'estudante.solicitacoes' ? 'active' : '' }}">
                                                <div class="text ">Lista</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="menu-item has-children {{ in_array(Route::currentRouteName(), ['estudante.despachos.index', 'estudante.despacho.add', 'estudante.despacho.show', 'estudante.despacho.edit']) ? 'active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><span class="material-symbols-outlined">
                                                balance
                                            </span></div>
                                        <div class="text">Despachos </div>
                                    </a>
                                    <ul class="sub-menu">

                                        <li class="sub-menu-item">
                                            <a href="{{ route('estudante.despachos.index') }}"
                                                class="{{ in_array(Route::currentRouteName(), ['estudante.despachos.index']) ? 'active' : '' }}">
                                                <div class="text">Lista</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="section-content-right">

                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">

                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>


                                <form class="">
                                    <fieldset class="name">
                                        <h6>{{ Auth::user()->estudante->departamento->nome }}
                                        </h6>
                                    </fieldset>


                                </form>

                            </div>
                            <style>

                            </style>
                            <div class="header-grid">

                                <div class="popup-wrap message type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                @php
                                                    $noti = 0;
                                                @endphp
                                                <span id="noti-label"
                                                    class="text-tiny">{{ $noti > 0 ? $noti : '0 '}}</span>
                                                <i class="icon-bell"></i>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content"
                                            aria-labelledby="dropdownMenuButton2"
                                            style="max-height: 400px;overflow-y: auto">
                                            <li>
                                                <h6>Notificações</h6>
                                            </li>

                                            @foreach ($novaSolicitacoes as $notificacao)
                                            @endforeach
                                            @if ($novoDespachos->count() > 0)
                                                @foreach ($novoDespachos as $notificacao)
                                                    @if (Auth::user()->tipo == 'estudante')
                                                        @if ($notificacao->solicitacao->user_id == Auth::id())
                                                            <li>
                                                                <div class="message-item item-1">
                                                                    <div class="image">
                                                                        <span class="material-symbols-outlined">
                                                                            balance
                                                                        </span>
                                                                    </div>
                                                                    <a
                                                                        href="{{ route('estudante.despacho.show', $notificacao->id) }}">

                                                                        <div>
                                                                            <div class="body-title-2">Despachado</div>
                                                                            <div class="text-tiny">
                                                                                {{ $notificacao->solicitacao->user->estudante->nome . ' ' . $notificacao->solicitacao->user->estudante->apelido }}
                                                                                <div class="text-tiny">
                                                                                    {{ $notificacao->solicitacao->tipo->nome }}
                                                                                </div>
                                                                            </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            @php
                                                                $noti += 1;
                                                            @endphp
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif


                                            <li><a href="{{ route('estudante.despachos.index') }}"
                                                    class="tf-button w-full">Ver todas</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="popup-wrap  type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false"
                                            style="display: flex; justify-items: center">
                                            <span class="header-user wg-user">
                                                <span class="image">
                                                    <img src="{{ asset('images/logo/logour.png') }}" alt="">
                                                </span>
                                                <span class="flex flex-column">
                                                    @php
                                                        $partes = explode(' ', Auth::user()->nome);
                                                        $primeiro_nome = $partes[0];
                                                        $ultimo_nome = end($partes);
                                                    @endphp
                                                    <span
                                                        class="body-title mb-2 user-l">{{ $primeiro_nome . ' ' . $ultimo_nome }}</span>
                                                    <span class="text-tiny user-l">{{ Auth::user()->tipo }}</span>
                                                </span>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content"
                                            aria-labelledby="dropdownMenuButton3">
                                            <li>
                                                <a href="{{ route('estudante.definicoes', Auth::id()) }}"
                                                    class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                    <div class="body-title-2">Conta</div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="user-item"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <div class="icon">
                                                        <i class="icon-log-out"></i>
                                                    </div>
                                                    <div class="body-title-2">Logout</div>
                                                </a>

                                                <form id="logout-form" action="{{ route('log.out') }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="main-content">

                        <div class="main-content-inner">
                            @yield('admin-content')

                        </div>


                        {{-- <div class="bottom-page">
                            <div class="body-text"></div>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        @include('Admin.error')
    @endif
    @if (session('success'))
        @include('Admin.success')
    @endif
    @include('Admin.delete')
    <style>
        .table-transaction>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #fff !important;
        }

        .table-transaction>tbody>tr>td {
            text-align: center !important;

        }

        .table-transaction>tbody>tr>td>.action {
            display: flex;
            justify-content: center;

        }

        .table-transaction>tbody>tr>td>.name {

            justify-content: center;

        }

        .table-transaction>thead>tr>th {
            text-align: center !important;
        }

        .table-transaction>thead>tr>.id {
            width: 60px !important;
        }
    </style>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/error-success.js') }}"></script>
    <script>
        document.getElementById('noti-label').innerHTML = @json($noti > 0 ? $noti : '');
    </script>
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


</body>

</html>
