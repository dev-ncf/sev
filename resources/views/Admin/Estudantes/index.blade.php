@extends('Layouts.admin')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Estudantes</h3>
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
                    <div class="text-tiny">Estudantes</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search" action="{{ route('estudantes.index') }}" method="GET">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="search" tabindex="2"
                                value="{{ $search }}" aria-required="true">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('estudante.add') }}"><i class="icon-plus"></i>Add
                    Novo</a>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Apelido</th>
                                <th>Genero</th>
                                <th>Curso</th>
                                <th>Nivel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($estudantes->count() > 0)
                                @foreach ($estudantes as $estudante)
                                    <tr>
                                        <td>{{ $estudante->id }}</td>
                                        <td class="pname">

                                            <div class="name">
                                                <a href="#" class="body-title-2">{{ $estudante->nome }}</a>
                                            </div>
                                        </td>
                                        <td>{{ $estudante->apelido }}</td>
                                        <td>{{ $estudante->genero }}</td>
                                        <td>{{ $estudante->curso->nome }}</td>
                                        <td>{{ $estudante->nivel }}º Ano</td>
                                        <td>
                                            <div class="list-icon-function">
                                                <a href="{{ route('estudante.edit', $estudante->id) }}">
                                                    <div class="item edit">
                                                        <i class="icon-edit-3"></i>
                                                    </div>
                                                </a>
                                                <form action="{{ route('estudante.destroy', $estudante->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('TELETE')
                                                    <div class="item text-danger delete" id="delete-{{ $estudante->id }}"
                                                        rota="estudantes" onclick="return confirmDeletion(event)"
                                                        dado='{{ $estudante->id }}'>
                                                        <i class="icon-trash-2"></i>
                                                    </div>
                                                </form>
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
                    {{ $estudantes->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
    @include('Admin.delete')
@endsection
