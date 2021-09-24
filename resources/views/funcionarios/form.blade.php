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
                        <p class="m-b-0">Gerenciamento de Funcionários</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/funcionarios">Funcionários</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ isset($funcionario) ? 'Editar' : 'Novo' }} Funcionário</a>
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
                            <a href="/funcionarios" class="btn btn-secondary">
                                Voltar
                                <i class="ti-arrow-left"></i>
                            </a>

                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <h2><i class="fas fa-user-tie" style="margin: 10px;"></i> {{ isset($funcionario) ? 'Editar' : 'Novo' }} Funcionário</h2>
                                        <div class="col" align="end">
                                            @isset($funcionario->id)
                                            <a href="/funcionarios/novo" class="btn btn-primary">
                                                Novo Funcionário
                                                <i class="ti-plus"></i>
                                            </a>
                                            @endisset
                                        </div>
                                    </div>

                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form action="/funcionarios/salvar" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="@isset($funcionario){{$funcionario->id}}@endisset">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label">Nome</label>
                                                    <input type="text" name="nome" class="form-control" required value="@if(isset($funcionario)){{$funcionario->nome}}@else{{old('nome')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Data de nascimento</label>
                                                    <input type="date" name="data_nasc" class="form-control" required value="@if(isset($funcionario)){{$funcionario->data_nasc}}@else{{old('data_nasc')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="form-label">Idade</label>
                                                    <input type="number" name="idade" class="form-control" value="@if(isset($funcionario)){{$funcionario->idade}}@else{{old('idade')}}@endif">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Sexo</label>
                                                    <select name="sexo" class="form-control" value="@if(isset($funcionario)){{$funcionario->sexo}}@else{{old('sexo')}}@endif">
                                                        <option value="">Selecione</option>
                                                        @foreach ($tipo_sexo as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($funcionario) && $funcionario->sexo == $tipo) selected @elseif(old('sexo') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Escolaridade</label>
                                                    <select name="escolaridade" class="form-control" value="@if(isset($funcionario)){{$funcionario->escolaridade}}@else{{old('escolaridade')}}@endif">
                                                        <option value="">Selecione</option>
                                                        @foreach ($escolaridade as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($funcionario) && $funcionario->escolaridade == $tipo) selected @elseif(old('escolaridade') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Cargo</label>
                                                    <input type="text" name="cargo" class="form-control" required value="@if(isset($funcionario)){{$funcionario->cargo}}@else{{old('cargo')}}@endif">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Data de admissão</label>
                                                    <input type="date" name="data_admiss" class="form-control" required value="@if(isset($funcionario)){{$funcionario->data_admiss}}@else{{old('data_admiss')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Data de demissão</label>
                                                    <input type="date" name="data_demiss" class="form-control" required value="@if(isset($funcionario)){{$funcionario->data_demiss}}@else{{old('data_demiss')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <select required name="status" class="form-control" value="@if(isset($funcionario)){{$funcionario->status}}@else{{old('status')}}@endif">
                                                        <option value="">Selecione</option>
                                                        @foreach ($status as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($funcionario) && $funcionario->status == $tipo) selected @elseif(old('status') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#informacoes" role="tab">Informações Pessoais</a>
                                                        <div class="slide"></div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#foto" role="tab">Responsabilidades /Foto 3x4</a>
                                                        <div class="slide"></div>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content card-block">
                                                    <div class="tab-pane active" id="informacoes" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">RG</label>
                                                                    <input type="text" name="rg" class="form-control" value="@if(isset($funcionario)){{$funcionario->rg}}@else{{old('rg')}}@endif" onKeyPress="MascaraGenerica(this, 'RG');">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Orgão emissor</label>
                                                                    <input type="text" name="emissor" class="form-control" value="@if(isset($funcionario)){{$funcionario->emissor}}@else{{old('emissor')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">CPF</label>
                                                                    <input type="text" name="cpf" class="form-control" value="@if(isset($funcionario)){{$funcionario->cpf}}@else{{old('cpf')}}@endif" onKeyPress="MascaraGenerica(this, 'CPF');">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="form-label">Telefone</label>
                                                                    <input type="text" name="telefone" class="form-control" required value="@if(isset($funcionario)){{$funcionario->telefone}}@else{{old('telefone')}}@endif" onKeyPress="MascaraGenerica(this, 'TELEFONE');">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Endereço</label>
                                                                    <input id="rua" type="text" name="endereco" class="form-control" required value="@if(isset($funcionario)){{$funcionario->endereco}}@else{{old('endereco')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group floating-label">
                                                                    <label class="">Cidade</label>
                                                                    <input id="cidade" type="text" name="cidade" class="form-control floating-input" value="@if(isset($funcionario)){{$funcionario->cidade}}@else{{old('cidade')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Bairro</label>
                                                                    <input id="bairro" type="text" name="bairro" class="form-control" value="@if(isset($funcionario)){{$funcionario->bairro}}@else{{old('bairro')}}@endif">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <div class="form-group">
                                                                    <label class="form-label">Complemento</label>
                                                                    <input type="text" name="complemento" class="form-control" value="@if(isset($funcionario)){{$funcionario->complemento}}@else{{old('complemento')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Número</label>
                                                                    <input type="number" name="numero" class="form-control" value="@if(isset($funcionario)){{$funcionario->numero}}@else{{old('numero')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">UF</label>
                                                                    <input id="uf" type="text" name="uf" class="form-control" value="@if(isset($funcionario)){{$funcionario->uf}}@else{{old('uf')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">CEP</label>
                                                                    <input id="cep" type="text" name="cep" class="form-control" required value="@if(isset($funcionario)){{$funcionario->cep}}@else{{old('cep')}}@endif" onKeyPress="MascaraGenerica(this, 'CEP');">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">E-mail</label>
                                                                    <input type="text" name="email" class="form-control" required value="@if(isset($funcionario)){{$funcionario->email}}@else{{old('email')}}@endif">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="foto" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-10">
                                                                <div class="">
                                                                    <label for="foto" class="form-label">Foto 3x4</label>
                                                                    <input type="file" name="foto_temp" class="form-control" value="@if(isset($funcionario)){{$funcionario->foto}}@else{{old('foto')}} @endif">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Responsabilidades:</label>
                                                                    <textarea style="height: 140px;" class="form-control" name="responsabilidades" id="responsabilidades" rows="3">@if(isset($funcionario)){{$funcionario->responsabilidades}}@else{{ old('responsabilidades')}}@endif</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="card" style="width: 7rem;">
                                                                    @if(isset($funcionario) && $funcionario->foto != '')
                                                                    <img class="card-img-top" src="{{ $funcionario->foto }}" alt="Imagem de capa do card">
                                                                    <div class="card-body">
                                                                        <p class="card-text">{{$funcionario->nome}}</p>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col" align="end">
                                                            <button type="submit" class="btn btn-success w-25 hover-shadow">
                                                                Salvar
                                                                <i class="ti-save" style="margin: 5px;"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");

        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {
                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);

                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            Swal.fire({
                                icon: 'info',
                                text: 'Formato de CEP inválido',

                            });
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    Swal.fire({
                        icon: 'info',
                        text: 'Formato de CEP inválido',

                    });
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
</script>
@include('layout.footer')