@extends('Layouts.estudante')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="tf-section-2 mb-30">
            <div class="flex gap20 flex-wrap-mobile">
                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-git-pull-request"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Solicitações</div>
                                    <h4>{{ $solicitacoes->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-git-pull-request"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Solicitações Pendentes</div>
                                    @php
                                        $countS = 0;
                                        foreach ($solicitacoes as $solicitacao) {
                                            # code...
                                            if ($solicitacao->status == 'pendente') {
                                                $countS += 1;
                                            }
                                        }
                                    @endphp
                                    <h4>{{ $countS }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-git-pull-request"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Solicitações Encaminhadas</div>

                                    <h4>{{ $encaminhadas->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <span style="color: #0000ff99" class="material-symbols-outlined">
                                        balance
                                    </span>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Despachos</div>
                                    <h4>{{ $despachos->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <span style="color: #0000ff99" class="material-symbols-outlined">
                                        school
                                    </span>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Estudantes</div>
                                    <h4>{{ $estudantes->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Solicitações Canceladas</div>
                                    @php
                                        $countS = 0;
                                        foreach ($solicitacoes as $solicitacao) {
                                            # code...
                                            if ($solicitacao->status == 'rejeitada') {
                                                $countS += 1;
                                            }
                                        }
                                    @endphp
                                    <h4>{{ $countS }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Canceled Orders Amount</div>
                                    <h4>0.00</h4>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>

            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Estatística </h5>

                </div>
                <div class="flex flex-wrap gap40">
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t1"></div>
                                <div class="text-tiny">Solicitações</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>{{ $solicitacoes->count() }}</h4>
                            <div class="box-icon-trending up">
                                <div class="body-title number"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t2"></div>
                                <div class="text-tiny">Despachos</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>{{ $despachos->count() }}</h4>
                            <div class="box-icon-trending up">
                                <div class="body-title number"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="line-chart-8"></div>
            </div>

        </div>
        <div class="tf-section mb-30">

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Recentes Solicitações</h5>
                    <div class="dropdown default">
                        <a class="btn btn-secondary dropdown-toggle" href="{{route('estudante.solicitacoes')}}">
                            <span class="view-all">Ver tudas</span>
                        </a>
                    </div>
                </div>
                <div class="wg-table table-all-user">
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
                            @foreach ($solicitacoesRecentes as $solicitacao)
                                <tr>
                                    <td class="id"> {{ $solicitacao->id }}</td>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        (function($) {

            var tfLineChart = (function() {

                var chartBar = function() {

                    var options = {
                        series: [{
                            name: 'Solicitações',
                            data: @json($solicitacoesPorMes)
                        }, {
                            name: 'Despachos',
                            data: @json($despachosPorMes)
                        }],
                        chart: {
                            type: 'bar',
                            height: 325,
                            toolbar: {
                                show: false,
                            },
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '10px',
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            show: false,
                        },
                        colors: ['#2377FC', '#FFA500', '#078407', '#FF0000'],
                        stroke: {
                            show: false,
                        },
                        xaxis: {
                            labels: {
                                style: {
                                    colors: '#212529',
                                },
                            },
                            categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Agu', 'Set',
                                'Out', 'Nov', 'Dez'
                            ],
                        },
                        yaxis: {
                            show: false,
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return " " + val + ""
                                }
                            }
                        }
                    };

                    chart = new ApexCharts(
                        document.querySelector("#line-chart-8"),
                        options
                    );
                    if ($("#line-chart-8").length > 0) {
                        chart.render();
                    }
                };

                /* Function ============ */
                return {
                    init: function() {},

                    load: function() {
                        chartBar();
                    },
                    resize: function() {},
                };
            })();

            jQuery(document).ready(function() {});

            jQuery(window).on("load", function() {
                tfLineChart.load();
            });

            jQuery(window).on("resize", function() {});
        })(jQuery);
    </script>
@endsection
