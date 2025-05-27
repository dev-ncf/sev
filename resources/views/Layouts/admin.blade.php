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
                        <a href="{{ route('user.dashboard') }}" id="site-logo-inner">
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
                                    class="menu-item {{ in_array(Route::currentRouteName(), ['user.dashboard']) ? 'active' : '' }}">
                                    <a href="{{ route('user.dashboard') }}"
                                        class="{{ in_array(Route::currentRouteName(), ['user.dashboard']) ? 'active' : '' }}">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Dashboard</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="center-item">
                            <ul class="menu-list">
                                <li
                                    class="menu-item has-children {{ in_array(Route::currentRouteName(), ['solicitacoes', 'solicitacao.add', 'solicitacao.show']) ? 'active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-git-pull-request"></i></div>
                                        <div class="text">Solicitações</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item ">
                                            <a href="{{ route('solicitacao.add') }}"
                                                class="{{ Route::currentRouteName() == 'solicitacao.add' ? 'active' : '' }}">
                                                <div class="text">Adicionar</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('solicitacoes') }}"
                                                class="{{ Route::currentRouteName() == 'solicitacoes' ? 'active' : '' }}">
                                                <div class="text ">Lista</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="menu-item has-children {{ in_array(Route::currentRouteName(), ['despachos.index', 'despacho.add', 'despacho.show', 'despacho.edit']) ? 'active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><span class="material-symbols-outlined">
                                                balance
                                            </span></div>
                                        <div class="text">Despachos </div>
                                    </a>
                                    <ul class="sub-menu">

                                        <li class="sub-menu-item">
                                            <a href="{{ route('despachos.index') }}"
                                                class="{{ in_array(Route::currentRouteName(), ['despachos.index']) ? 'active' : '' }}">
                                                <div class="text">Lista</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li
                                    class="menu-item has-children {{ in_array(Route::currentRouteName(), ['departamentos', 'departamento.create', 'departamento.show', 'departamento.edit']) ? 'active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><span class="material-symbols-outlined">
                                                apartment
                                            </span></div>
                                        <div class="text">Departamentos</div>
                                    </a>
                                    <ul class="sub-menu">

                                        <li class="sub-menu-item">
                                            <a href="{{ route('departamentos') }}"
                                                class="{{ Route::currentRouteName() == 'departamentos' ? 'active' : '' }}">
                                                <div class="text">Lista</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('departamento.create') }}"
                                                class="{{ Route::currentRouteName() == 'departamento.create' ? 'active' : '' }}">
                                                <div class="text">Adicionar</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="menu-item has-children {{ in_array(Route::currentRouteName(), ['tipoSolicitacoes.index', 'tipoSolicitacao.add', 'tipoSolicitacao.show', 'tipoSolicitacao.index.edit']) ? 'active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon">
                                            <span class="material-symbols-outlined">
                                                folded_hands
                                            </span>
                                        </div>
                                        <div class="text">Tipo de Solicitações</div>
                                    </a>
                                    <ul class="sub-menu">

                                        <li class="sub-menu-item">
                                            <a href="{{ route('tipoSolicitacoes.index') }}"
                                                class="{{ Route::currentRouteName() == 'tipoSolicitacoes.index' ? 'active' : '' }}">
                                                <div class="text">Lista</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('tipoSolicitacao.add') }}"
                                                class="{{ Route::currentRouteName() == 'tipoSolicitacao.add' ? 'active' : '' }}">
                                                <div class="text">Adicionar</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li
                                    class="menu-item has-children {{ in_array(Route::currentRouteName(), ['cursos.index', 'curso.add', 'curso.edit']) ? 'active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><span class="material-symbols-outlined">
                                                gavel
                                            </span></div>
                                        <div class="text">Cursos</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{ route('curso.add') }}"
                                                class="{{ in_array(Route::currentRouteName(), ['curso.add']) ? 'active' : '' }}">
                                                <div class="text">Adicionar</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('cursos.index') }}"
                                                class="{{ in_array(Route::currentRouteName(), ['cursos.index']) ? 'active' : '' }}">
                                                <div class="text">Lista</div>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li
                                    class="menu-item has-children {{ in_array(Route::currentRouteName(), ['estudantes.index', 'estudante.add', 'estudante.edit']) ? 'active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><span class="material-symbols-outlined">
                                                school
                                            </span></div>
                                        <div class="text">Estudantes</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{ route('estudante.add') }}"
                                                class="{{ in_array(Route::currentRouteName(), ['estudante.add']) ? 'active' : '' }}">
                                                <div class="text">Adicionar</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('estudantes.index') }}"
                                                class="{{ in_array(Route::currentRouteName(), ['estudante.index']) ? 'active' : '' }}">
                                                <div class="text">Lista</div>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li
                                    class="menu-item has-children {{ in_array(Route::currentRouteName(), ['admin.funcionarios.index', 'admin.funcionario.add', 'admin.funcionarios.edit']) ? 'active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><span class="material-symbols-outlined">
                                                badge
                                            </span></div>
                                        <div class="text">Funcionários</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.funcionario.add') }}"
                                                class="{{ in_array(Route::currentRouteName(), ['admin.funcionario.add']) ? 'active' : '' }}">
                                                <div class="text">Adicionar</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.funcionarios.index') }}"
                                                class="{{ in_array(Route::currentRouteName(), ['admin.funcionarios.index']) ? 'active' : '' }}">
                                                <div class="text">Lista</div>
                                            </a>
                                        </li>

                                    </ul>
                                </li>


                                <li
                                    class="menu-item {{ in_array(Route::currentRouteName(), ['usuarios.index', 'usuario.add', 'usuario.edit', 'usuario.show']) ? 'active' : '' }}">
                                    <a href="{{ route('usuarios.index') }}" class="">
                                        <div class="icon"><i class="icon-users"></i></div>
                                        <div class="text">Usuários</div>
                                    </a>
                                </li>






                                <li class="menu-item" id="logout">
                                    <a href="#" class="">
                                        <div class="icon"><span class="material-symbols-outlined">
                                                logout
                                            </span></div>
                                        <div class="text">Sair</div>
                                    </a>
                                </li>
                                <style>
                                    #logout {
                                        display: none;
                                    }

                                    @media (max-width: 990px) {
                                        #logout {
                                            display: none;

                                        }

                                        .user-l {
                                            display: none;
                                        }
                                    }
                                </style>
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
                                        <h6>{{ Auth::user()->tipo == 'estudante' ? Auth::user()->estudante->departamento->nome : (Auth::user()->tipo == 'funcionario' ? Auth::user()->funcionario->departamento->nome : 'Universidade Rovuma') }}
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
                                                    class="text-tiny">{{ $noti > 0 ? $noti : '' }}</span>
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
                                                @if (Auth::user()->tipo == 'funcionario')
                                                    @if ($notificacao->departamento_id == Auth::user()->funcionario->departamento_id)
                                                        <li>
                                                            <div class="message-item item-1">
                                                                <div class="image">
                                                                    <i class="icon-git-pull-request"></i>
                                                                </div>
                                                                <a
                                                                    href="{{ route('solicitacao.show', $notificacao->id) }}">

                                                                    <div>
                                                                        <div class="body-title-2">Solicitação</div>
                                                                        <div class="text-tiny">
                                                                            {{ $notificacao->user->estudante->nome . ' ' . $notificacao->user->estudante->apelido }}
                                                                            <div class="text-tiny">
                                                                                {{ $notificacao->tipo->nome }}
                                                                            </div>
                                                                        </div>
                                                                </a>
                                                            </div>
                                                        </li>
                                                        @php
                                                            $noti += 1;
                                                        @endphp
                                                    @endif
                                                    @if (Auth::user()->tipo == 'estudante')
                                                        @if ($notificacao->departamento_id == Auth::user()->estudante > departamento_id)
                                                            <li>
                                                                <div class="message-item item-1">
                                                                    <div class="image">
                                                                        <i class="icon-git-pull-request"></i>
                                                                    </div>
                                                                    <a
                                                                        href="{{ route('solicitacao.show', $notificacao->id) }}">

                                                                        <div>
                                                                            <div class="body-title-2">Solicitação</div>
                                                                            <div class="text-tiny">
                                                                                {{ $notificacao->user->estudante->nome . ' ' . $notificacao->user->estudante->apelido }}
                                                                                <div class="text-tiny">
                                                                                    {{ $notificacao->tipo->nome }}
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
                                                @endif
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
                                                                        href="{{ route('solicitacao.show', $notificacao->solicitacao->id) }}">

                                                                        <div>
                                                                            <div class="body-title-2">Despacho</div>
                                                                            <div class="text-tiny">
                                                                                {{ $notificacao->solicitacao->user->estudante->nome . ' ' . $notificacao->solicitacao->user->estudante->apelido }}
                                                                                <div class="text-tiny">
                                                                                    {{ $notificacao->solicitacao->tipo->nome }}
                                                                                </div>
                                                                            </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @else
                                                        @if (Auth::user()->tipo == 'admin')
                                                            <li>
                                                                <div class="message-item item-1">
                                                                    <div class="image">
                                                                        <span class="material-symbols-outlined">
                                                                            balance
                                                                        </span>
                                                                    </div>
                                                                    <a
                                                                        href="{{ route('solicitacao.show', $notificacao->solicitacao->id) }}">

                                                                        <div>
                                                                            <div class="body-title-2">Despacho</div>
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
                                                        @else
                                                            @if ($notificacao->solicitacao->departamento_id == Auth::user()->funcionario->departamento_id)
                                                                <li>
                                                                    <div class="message-item item-1">
                                                                        <div class="image">
                                                                            <span class="material-symbols-outlined">
                                                                                balance
                                                                            </span>
                                                                        </div>
                                                                        <a
                                                                            href="{{ route('solicitacao.show', $notificacao->solicitacao->id) }}">

                                                                            <div>
                                                                                <div class="body-title-2">Despacho
                                                                                </div>
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
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if (Auth::user()->tipo == 'funcionario')
                                                @if ($novoEncaminhamento->count() > 0)

                                                    @foreach ($novoEncaminhamento as $notificacao)
                                                        <li>
                                                            <div class="message-item item-1">
                                                                <div class="image">
                                                                    <i class="icon-git-pull-request"></i>
                                                                </div>
                                                                <a
                                                                    href="{{ route('solicitacao.show', $notificacao->solicitacao->id) }}">

                                                                    <div>
                                                                        <div class="body-title-2">Encaminhado</div>
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
                                                    @endforeach
                                                @endif
                                            @endif

                                            <li><a href="#" class="tf-button w-full">Ver todas</a></li>
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
                                                <a href="{{ route('definicoes', Auth::id()) }}" class="user-item">
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


                        <div class="bottom-page">
                            <div class="body-text"></div>
                        </div>
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

        .table-transaction>tbody>tr>td>.action {
            display: flex;
            justify-content: center;

        }

        .table-transaction>tbody>tr>td {
            text-align: center !important;
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
