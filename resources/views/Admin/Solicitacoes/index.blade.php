@extends('Layouts.admin')
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
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="name" tabindex="2"
                                value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('solicitacao.add') }}"><i class="icon-plus"></i>Nova
                    Solicitação</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Solicitação</th>
                            <th>Data</th>
                            <th>Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitacoes as $solicitacao)
                            <tr>
                                <td>6</td>
                                <td class="pname">
                                    <div class="image">
                                        <img src="1718623519.html" alt="" class="image">
                                    </div>
                                    <div class="name">
                                        <a href="#" class="body-title-2">{{ $solicitacao->user->nome }}</a>
                                        <div class="text-tiny mt-3">Ntwali Chance Filme</div>
                                    </div>
                                </td>
                                <td>Pedido de reingresso</td>
                                <td>02/04/2025</td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="" target="_blank">
                                            <div class="item ">
                                                <i class="icon-eye"></i>
                                            </div>
                                        </a>
                                        <a href="#">
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
                    </tbody>
                </table>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">


            </div>
        </div>
    </div>
@endsection
