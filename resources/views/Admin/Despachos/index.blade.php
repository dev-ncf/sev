@extends('Layouts.admin')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Todos despachos</h3>
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
                    <div class="text-tiny">Despachos</div>
                </li>
            </ul>
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
                    @if ($despachos->count() > 0)
                        @foreach ($despachos as $despacho)
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
        </div>
    </div>
@endsection
