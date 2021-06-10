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
                        <h5 class="m-b-10">Konsist</h5>
                        <p class="m-b-0">Gerenciamento de Pacientes</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/pacientes">Pacientes</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ isset($paciente) ? 'Editar' : 'Novo' }} Paciente</a>
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
                            <a href="/pacientes" class="btn btn-secondary">
                                Voltar
                                <i class="ti-arrow-left"></i>
                            </a>

                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <h2><i class="fa fa-user" style="margin: 10px;"></i> {{ isset($paciente) ? 'Editar' : 'Novo' }} Paciente</h2>
                                        <div class="col" align="end">
                                            @isset($paciente->id)
                                            <a href="/pacientes/novo" class="btn btn-primary">
                                                Novo Usuário
                                                <i class="ti-plus"></i>
                                            </a>
                                            @endisset
                                        </div>
                                    </div>

                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form action="/pacientes/salvar" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="@isset($paciente){{$paciente->id}}@endisset">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label">Nome</label>
                                                    <input type="text" name="nome" class="form-control" required value="@if(isset($paciente)){{$paciente->nome}}@else{{old('nome')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Data de nascimento</label>
                                                    <input type="date" name="data_nasc" class="form-control" required value="@if(isset($paciente)){{$paciente->data_nasc}}@else{{old('data_nasc')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="form-label">Idade</label>
                                                    <input type="number" name="idade" class="form-control" value="@if(isset($paciente)){{$paciente->idade}}@else{{old('idade')}}@endif">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <select name="sexo" class="form-select" value="@if(isset($paciente)){{$paciente->sexo}}@else{{old('sexo')}}@endif">
                                                        <option value="">Sexo</option>
                                                        @foreach ($tipo_sexo as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($paciente) && $paciente->sexo == $tipo) selected @elseif(old('sexo') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <select name="medico" class="form-select" value="">
                                                        <option value="">Médico</option>
                                                        <!--  @foreach ($tipo_sexo as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($paciente) && $paciente->sexo == $tipo) selected @elseif(old('sexo') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach    -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <select name="situacao" class="form-select" value="@if(isset($paciente)){{$paciente->situacao}}@else{{old('situacao')}}@endif">
                                                        <option value="">Situação</option>
                                                        @foreach ($situacao as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($paciente) && $paciente->situacao == $tipo) selected @elseif(old('situacao') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#contato" role="tab">Contato/Convênio</a>
                                                        <div class="slide"></div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#outras" role="tab">Outras informações</a>
                                                        <div class="slide"></div>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content card-block">
                                                    <div class="tab-pane active" id="contato" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Endereço</label>
                                                                    <input type="text" name="endereco" class="form-control" required value="@if(isset($paciente)){{$paciente->endereco}}@else{{old('endereco')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group floating-label">
                                                                    <label class="">Cidade</label>
                                                                    <input type="text" name="cidade" class="form-control floating-input" value="@if(isset($paciente)){{$paciente->cidade}}@else{{old('cidade')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Bairro</label>
                                                                    <input type="text" name="bairro" class="form-control" value="@if(isset($paciente)){{$paciente->bairro}}@else{{old('bairro')}}@endif">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <div class="form-group">
                                                                    <label class="form-label">Complemento</label>
                                                                    <input type="text" name="complemento" class="form-control" value="@if(isset($paciente)){{$paciente->complemento}}@else{{old('complemento')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Número</label>
                                                                    <input type="number" name="numero" class="form-control" value="@if(isset($paciente)){{$paciente->numero}}@else{{old('numero')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">UF</label>
                                                                    <input type="text" name="uf" class="form-control" value="@if(isset($paciente)){{$paciente->uf}}@else{{old('uf')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">CEP</label>
                                                                    <input type="text" name="cep" class="form-control" required value="@if(isset($paciente)){{$paciente->cep}}@else{{old('cep')}}@endif">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="form-label">Telefone</label>
                                                                    <input type="text" name="telefone" class="form-control" required value="@if(isset($paciente)){{$paciente->telefone}}@else{{old('telefone')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">E-mail</label>
                                                                    <input type="text" name="email" class="form-control" required value="@if(isset($paciente)){{$paciente->email}}@else{{old('email')}}@endif">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="outras" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="form-label">Nome social</label>
                                                                    <input type="text" name="nome_social" class="form-control" value="@if(isset($paciente)){{$paciente->nome_social}}@else{{old('nome_social')}}@endif">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">RG</label>
                                                                    <input type="text" name="rg" class="form-control" value="@if(isset($paciente)){{$paciente->rg}}@else{{old('rg')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Orgão emissor</label>
                                                                    <input type="text" name="emissor" class="form-control" value="@if(isset($paciente)){{$paciente->emissor}}@else{{old('emissor')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">CPF</label>
                                                                    <input type="text" name="cpf" class="form-control" value="@if(isset($paciente)){{$paciente->cpf}}@else{{old('cpf')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-4" style="margin-top: 26px;">
                                                                <select name="civil" class="form-select" value="@if(isset($paciente)){{$paciente->civil}}@else{{old('civil')}}@endif">
                                                                    <option value="">Estado civil</option>
                                                                    @foreach ($civil as $key => $tipo)
                                                                    <option value="{{$tipo}}" @if(isset($paciente) && $paciente->civil == $tipo) selected @elseif(old('civil') == $tipo) selected @endif>{{$tipo}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Mãe</label>
                                                                    <input type="text" name="nome_mae" class="form-control" value="@if(isset($paciente)){{$paciente->nome_mae}}@else{{old('nome_mae')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Pai</label>
                                                                    <input type="text" name="nome_pai" class="form-control" value="@if(isset($paciente)){{$paciente->nome_pai}}@else{{old('nome_pai')}}@endif">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Nome do Responsável</label>
                                                                    <input type="text" name="nome_rep" class="form-control" value="@if(isset($paciente)){{$paciente->nome_rep}}@else{{old('nome_rep')}}@endif">
                                                                </div>
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