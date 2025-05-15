@extends('Layouts.estudante')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Solicitações</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index.html">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Todas Solicitações</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search" action="{{ route('estudante.solicitacoes') }}">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="search" tabindex="2"
                                value="{{ $search }}" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>

                <a class="tf-button style-1 w208" href="{{ route('estudante.solicitacao.add') }}"><i
                        class="icon-plus"></i>Add
                    nova</a>

            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-transaction">
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
                        @if ($solicitacoes->count() > 0)
                            @foreach ($solicitacoes as $solicitacao)
                                <tr>
                                    <td class="id">{{ $solicitacao->id }}</td>
                                    <td class="pname">

                                        <div class="name">
                                            <a href="#"
                                                class="body-title-2">{{ $solicitacao->user->estudante->nome . ' ' . $solicitacao->user->estudante->apelido }}</a>
                                        </div>
                                    </td>
                                    <td>{{ $solicitacao->tipo->nome }}</td>
                                    <td>{{ $solicitacao->data_criacao }}</td>
                                    <td>
                                        {{ $solicitacao->data_conclusao ? $solicitacao->data_conclusao : '------' }}</td>
                                    <td
                                        style="background-color: {{ $solicitacao->status == 'pendente' ? '#ffa50021' : ($solicitacao->status == 'em andamento' ? '#0000ff21' : ($solicitacao->status == 'concluida' ? '#00ff0021' : '#ff000021')) }}">
                                        {{ $solicitacao->status }}</td>
                                    <td>
                                        <div class="list-icon-function action">
                                            <a href="{{ route('estudante.solicitacao.show', $solicitacao->id) }}">
                                                <div class="item ">
                                                    <i class="icon-eye" style="color: #0000ff87"></i>
                                                </div>
                                            </a>
                                            <a href="{{ route('estudante.solicitacao.edit', $solicitacao->id) }}">
                                                <div class="item edit">
                                                    <i class="icon-edit-3"></i>
                                                </div>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
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

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">


            </div>
        </div>
    </div>
@endsection
