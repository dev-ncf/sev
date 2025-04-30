@extends('Layouts.admin')
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
                                    <h4>3</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <span style="color: #0000ff99" class="material-symbols-outlined">
                                        gavel
                                    </span>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Cursos</div>
                                    <h4>481</h4>
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
                                    <h4>3</h4>
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
                                    <h4>481</h4>
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
                                    <h4>0</h4>
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
                                    <h4>0.00</h4>
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
                                    <h4>0</h4>
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
                    <h5>Estatistica </h5>
                    <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);">Esta semana </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Semena passada</a>
                            </li>
                        </ul>
                    </div>
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
                            <h4>$37,802</h4>
                            <div class="box-icon-trending up">
                                <i class="icon-trending-up"></i>
                                <div class="body-title number">0.56%</div>
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
                            <h4>$28,305</h4>
                            <div class="box-icon-trending up">
                                <i class="icon-trending-up"></i>
                                <div class="body-title number">0.56%</div>
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
                        <a class="btn btn-secondary dropdown-toggle" href="#">
                            <span class="view-all">Ver tudo</span>
                        </a>
                    </div>
                </div>
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 80px">#</th>
                                    <th>Nome</th>
                                    <th class="text-center">Contacto</th>
                                    <th class="text-center">Solicitação</th>
                                    <th class="text-center">Data</th>

                                    <th class="text-center">Status</th>
                                    <th>Acção</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Divyansh Kumar</td>
                                    <td class="text-center">1234567891</td>
                                    <td class="text-center">Declaração de Notas</td>
                                    <td class="text-center">2024-07-11 00:54:14</td>
                                    <td class="text-center">Em Andamento</td>

                                    <td class="text-center">
                                        <a href="#">
                                            <div class="list-icon-function view-icon">
                                                <div class="item ">
                                                    <i class="icon-eye"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
