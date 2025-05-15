@extends('Layouts.funcionario')

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
                    <a class="tf-button style-1 w208" href="{{ route('funcionario.solicitacoes') }}">Voltar</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-transaction table-bordered">
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
                                            <a href="{{ route('funcionario.despacho.show', $despacho->id) }}">
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

                <div class="cols gap10">
                    <a class="tf-button w-full"
                        href="{{ route('funcionario.despacho.add', $solicitacao->id) }}">Despachar</a>
                </div>

                <div class="cols gap10">
                    <a class="tf-button w-full" onclick="encaminhar()">Encaminhar</a>
                </div>


            </div>
        </div>
    </div>
    <form id="modal-encaminhar" style="" action="{{ route('funcionario.solicitacao.encaminar') }}" method="POST">
        @csrf

        <div class="wg-box" style="min-width: 500px;" id="modal-encaminhar-in">
            <h5>Encaminhar a Solicitação</h5>
            <fieldset class="name">
                <div class="body-title mb-10"> Solicitação <span class="tf-color-1"></span></div>
                <select name="solicitacao_id" required class="mb-10">
                    <option value="{{ $solicitacao->id }}" selected>{{ $solicitacao->tipo->nome }}</option>
                </select>
            </fieldset>

            <fieldset class="name" id="nivel">
                <div class="body-title mb-10"> Nível <span class="tf-color-1">*</span></div>
                <select name="departamento_id" required class="mb-10">
                    <option value="" selected disabled>Selecione uma opção</option>

                    <option value="organica">Orgânica</option>
                    <option value="institucional">Institucional</option>

                </select>
            </fieldset>
            <fieldset class="name" id="funcionario" style="display: none">
                <div class="body-title mb-10"> Funcionario <span class="tf-color-1">*</span></div>
                <select name="responsavel_id" class="mb-10" id="responsavel_id">
                    <option value="" disabled>Selecione uma opção</option>
                    @foreach ($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}">

                            {{ $funcionario->nome }} ({{ $funcionario->cargo }})
                        </option>
                    @endforeach
                </select>
            </fieldset>
            <fieldset class="name" id="departamento">
                <div class="body-title mb-10"> Departamento <span class="tf-color-1">*</span></div>
                <select name="departamento_id" required class="mb-10" id="departamentoSelect">
                    <option value="" selected disabled>Selecione uma opção</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}"
                            @if (auth()->user()->funcionario->departamento_id == $departamento->id) data-do-usuario="true" @endif>
                            {{ $departamento->nome }}
                        </option>
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

        // Função para abrir o modal com a imagem em tamanho maior

        function encaminhar() {
            document.getElementById('modal-encaminhar').style.display = 'flex';
            document.getElementById('nivel').addEventListener('change', (event) => {

                const nivel = event.target.value;
                const departamentoSelect = document.getElementById('departamentoSelect');


                if (nivel === 'organica') {
                    const options = departamentoSelect.options;
                    let funcionario = document.getElementById('funcionario')
                    let responsavel_id = document.getElementById('responsavel_id')

                    for (let i = 0; i < options.length; i++) {
                        const opt = options[i];
                        if (opt.getAttribute('data-do-usuario') === 'true') {
                            opt.selected = true;
                            opt.disabled = false;

                        } else {
                            opt.disabled = true;

                        }
                    }
                    funcionario.style.display = 'block'
                    responsavel_id.required = true
                } else {
                    // Reabilitar todos os options se mudar para outro nível
                    const options = departamentoSelect.options;
                    for (let i = 0; i < options.length; i++) {
                        options[i].disabled = false;
                    }
                    departamentoSelect.selectedIndex = 0;
                    funcionario.style.display = 'none' // resetar seleção
                    responsavel_id.required = false
                }
            });
        }
        document.getElementById('modal-encaminhar').addEventListener('click', function(e) {
            // alert('jnj')
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
