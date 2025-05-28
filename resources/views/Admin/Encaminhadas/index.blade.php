@extends('Layouts.admin')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Solicitações Encaminhadas</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index.html">
                        <div class="text-tiny">Inicio</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Todas Encaminhadas</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search" action="{{ route('solicitacoes') }}">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="search" tabindex="2"
                                value="{{ $search }}" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                @if (Auth::user()->tipo == 'estudante' || Auth::user()->tipo == 'admin')
                    <a class="tf-button style-1 w208" href="{{ route('solicitacao.add') }}"><i class="icon-plus"></i>Add
                        nova</a>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="id">Ordem</th>
                            <th>Nome</th>
                            <th>Solicitação</th>
                            <th>Inicio</th>
                            <th>Fim</th>
                            <th>Status</th>
                            <th>Acção</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (Auth::user()->tipo != 'estudante')
                            @foreach ($encaminhamentos as $encaminhamento)
                                <tr>
                                    <td>{{ $encaminhamento->solicitacao_id }}</td>
                                    <td class="pname">

                                        <div class="name">
                                            <a href="#"
                                                class="body-title-2">{{ $encaminhamento->solicitacao->user->estudante->nome . ' ' . $encaminhamento->solicitacao->user->estudante->apelido }}</a>
                                        </div>
                                    </td>
                                    <td>{{ $encaminhamento->solicitacao->tipo->nome }}</td>
                                    <td>{{ $encaminhamento->solicitacao->data_criacao }}</td>
                                    <td>
                                        {{ $encaminhamento->solicitacao->data_conclusao ? $encaminhamento->solicitacao->data_conclusao : '------' }}
                                    </td>
                                    <td
                                        style="background-color: {{ $encaminhamento->solicitacao->status == 'pendente' ? '#ffa50021' : ($encaminhamento->solicitacao->status == 'em andamento' ? '#0000ff21' : ($encaminhamento->solicitacao->status == 'concluida' ? '#00ff0021' : '#ff000021')) }}">
                                        {{ $encaminhamento->solicitacao->status }}</td>
                                    <td>
                                        <div class="list-icon-function">
                                            <a href="{{ route('solicitacao.show', $encaminhamento->solicitacao_id) }}">
                                                <div class="item ">
                                                    <i class="icon-eye" style="color: #0000ff87"></i>
                                                </div>
                                            </a>
                                            <a href="{{ route('solicitacao.edit', $encaminhamento->solicitacao_id) }}">
                                                <div class="item edit">
                                                    <i class="icon-edit-3"></i>
                                                </div>
                                            </a>
                                            <form action="#" method="POST">
                                                <div class="item text-danger delete">
                                                    <i class="icon-trash-2"></i>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    {{ $encaminhamentos->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
                </div>
        </div>
    </div>
@endsection
