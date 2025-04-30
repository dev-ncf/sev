@extends('Layouts.admin')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Departamentos</h3>
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
                    <div class="text-tiny">Departamentos</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search" action="{{ route('departamentos') }}" method="GET">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="search" tabindex="2"
                                value="{{ $search }}" aria-required="true">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('departamento.create') }}"><i class="icon-plus"></i>Add
                    Novo</a>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Descricao</th>
                                <th>Fotos</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departamentos as $departamento)
                                <tr>
                                    <td>{{ $departamento->id }}</td>
                                    <td class="pname">
                                        <div class="image">
                                            <img src="1718066367.html" alt="" class="image">
                                        </div>
                                        <div class="name">
                                            <a href="#" class="body-title-2">{{ $departamento->nome }}</a>
                                        </div>
                                    </td>
                                    <td>{{ $departamento->descricao }}</td>
                                    <td><a href="#" target="_blank">1</a></td>
                                    <td>
                                        <div class="list-icon-function">
                                            <a href="{{ route('departamento.edit', $departamento->id) }}">
                                                <div class="item edit">
                                                    <i class="icon-edit-3"></i>
                                                </div>
                                            </a>
                                            <form action="{{ route('departamento.destroy', $departamento->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('TELETE')
                                                <div class="item text-danger delete" id="delete-{{ $departamento->id }}"
                                                    rota="departamentos" onclick="return confirmDeletion(event)"
                                                    dado='{{ $departamento->id }}'>
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
    </div>
    @include('Admin.delete')
@endsection
