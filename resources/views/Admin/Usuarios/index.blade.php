@extends('Layouts.admin')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Lista de Usuários</h3>
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
                    <div class="text-tiny">Usuários</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search" action="{{ route('usuarios.index') }}" method="GET">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="search" tabindex="2"
                                value="{{ $search }}" aria-required="true">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Ordem</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Tipo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($usuarios->count() > 0)
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td class="pname">

                                            <div class="name">
                                                <a href="#" class="body-title-2">{{ $usuario->nome }}</a>
                                            </div>
                                        </td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->tipo }}</td>
                                        <td>
                                            <div class="list-icon-function">
                                                <a href="{{ route('usuario.edit', $usuario->id) }}">
                                                    <div class="item edit">
                                                        <i class="icon-edit-3"></i>
                                                    </div>
                                                </a>
                                                <form action="{{ route('usuario.destroy', $usuario->id) }}" method="POST">
                                                    @csrf
                                                    @method('TELETE')
                                                    <div class="item text-danger delete" id="delete-{{ $usuario->id }}"
                                                        rota="usuarios" onclick="return confirmDeletion(event)"
                                                        dado='{{ $usuario->id }}'>
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
                    {{ $usuarios->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>

@endsection
