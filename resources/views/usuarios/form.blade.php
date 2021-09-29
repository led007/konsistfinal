@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">PROSA | Agendamentos</h5>
                        <p class="m-b-0">Gerenciamento de Usuários</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/usuarios">Usuários</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ isset($usuario) ? 'Editar' : 'Novo' }} Usuário</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <!-- task, page, download counter  start -->
                        <div class="container">
                            <!-- @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            @foreach($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                        @endif -->
                            <a href="/usuarios" class="btn btn-secondary">
                                Voltar
                                <i class="ti-arrow-left"></i>
                            </a>

                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <h2><i class="fa fa-users" style="margin: 10px;"></i> {{ isset($usuario) ? 'Editar' : 'Novo' }} Usuário</h2>
                                        <div class="col" align="end">
                                            @isset($usuario->id)
                                            <a href="/usuarios/novo" class="btn btn-primary">
                                                Novo Usuário
                                                <i class="ti-plus"></i>
                                            </a>
                                            @endisset
                                        </div>
                                    </div>

                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form action="/usuarios/salvar" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="@isset($usuario){{$usuario->id}}@endisset">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="float-label">Nome</label>
                                                    <input type="text" name="nome" class="form-control" required value="@if(isset($usuario)){{$usuario->nome}}@else{{old('nome')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form-default">
                                                    <label class="float-label">Email</label>
                                                    <input type="email" name="email" class="form-control" required value="@if(isset($usuario)){{$usuario->email}}@else{{old('email')}}@endif">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                           
                                            <div class="col-6">
                                                <div class="form-group form-default">
                                                    <label class="float-label">Função</label>
                                                    <select name="funcao" id="funcao" class="form-control" value="@if(isset($usuario)){{$usuario->funcao}}@else{{old('funcao')}}@endif">
                                                        <option value="">Selecione uma Função</option>
                                                        @foreach ($tipo_funcao as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($usuario) && $usuario->funcao == $tipo) selected @elseif(old('funcao') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                @if(empty($usuario))
                                                <div class="form-group form-default">
                                                    <label class="float-label">Senha</label>
                                                    <input type="password" name="password" class="form-control" value="">
                                                </div>
                                                @endif
                                            </div>
                                            <div class="row">

                                                <div class="col">
                                                    <label class="col-sm-5 col-form-label" for="foto">Carregar Foto:</label>
                                                    <div style="margin: 15px;">
                                                        <input type="file" name="foto_temp" class="form-control" value="@if(isset($usuario)){{$usuario->foto}}@else{{old('foto')}}@endif">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="card" style="width: 7rem;">
                                                            @if(isset($usuario) && $usuario->foto != '')
                                                            <img class="card-img-top" src="{{ $usuario->foto }}" alt="Imagem de capa do card">
                                                            <div class="card-body">
                                                                <p class="card-text">{{$usuario->nome}}</p>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col" align="end">
                                                <br>
                                                <button type="submit" class="btn btn-success w-25 hover-shadow">
                                                    Salvar
                                                    <i class="ti-save" style="margin: 5px;"></i>
                                                </button>
                                            </div>

                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Page-body end -->
                    </div>
                    <div id="styleSelector"> </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


@include('layout.footer')