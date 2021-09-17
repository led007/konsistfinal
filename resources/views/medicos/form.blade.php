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
                        <h5 class="m-b-10">PROSA|Agendamentos</h5>
                        <p class="m-b-0">Gerenciamento de Médicos</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/medico">Médicos</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ isset($medico) ? 'Editar' : 'Novo' }} Médico</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <!-- task, page, download counter  start -->
                        <div class="container">
                            <a href="/medicos" class="btn btn-secondary">
                                Voltar
                                <i class="ti-arrow-left"></i>
                            </a>

                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <h2><i class="fa fa-user" style="margin: 10px;"></i> {{ isset($medico) ? 'Editar' : 'Novo' }} Médico</h2>
                                        <div class="col" align="end">
                                            @isset($medico->id)
                                            <a href="/medicos/novo" class="btn btn-primary">
                                                Novo Médico
                                                <i class="ti-plus"></i>
                                            </a>
                                            @endisset
                                        </div>
                                    </div>

                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form action="/medicos/salvar" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="@isset($medico){{$medico->id}}@endisset">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-label">Nome do Profissional</label>
                                                    <input type="text" name="nome" class="form-control" required value="@if(isset($medico)){{$medico->nome}}@else{{old('nome')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Data de nascimento</label>
                                                    <input type="date" name="data_nasc" class="form-control" required value="@if(isset($medico)){{$medico->data_nasc}}@else{{old('data_nasc')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="form-label">Titulo</label>
                                                    <select name="titulo" class="form-control" value="@if(isset($medico)){{$medico->titulo}}@else{{old('titulo')}}@endif">
                                                        <option value="">Selecione</option>
                                                        @foreach ($titulo as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($medico) && $medico->titulo == $tipo) selected @elseif(old('titulo') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <select required name="status" class="form-control" value="@if(isset($medico)){{$medico->status}}@else{{old('status')}}@endif">
                                                        <option value="">Selecione</option>
                                                        @foreach ($status as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($medico) && $medico->status == $tipo) selected @elseif(old('status') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Tipo</label>
                                                    <select required name="tipo_p" class="form-control" value="@if(isset($medico)){{$medico->tipo_p}}@else{{old('tipo_p')}}@endif">
                                                        <option value="">Selecione</option>
                                                        @foreach ($tipo_p as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($medico) && $medico->tipo_p == $tipo) selected @elseif(old('tipo_p') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="form-label">UF Conselho</label>
                                                    <input type="text" name="uf_conselho" class="form-control" required value="@if(isset($medico)){{$medico->uf_conselho}}@else{{old('uf_conselho')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="form-label">N° do Conselho</label>
                                                    <input type="text" name="n_conselho" class="form-control" required value="@if(isset($medico)){{$medico->n_conselho}}@else{{old('n_conselho')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-label">Conselho</label>
                                                    <select required name="conselho" class="form-control" value="@if(isset($medico)){{$medico->conselho}}@else{{old('conselho')}}@endif">
                                                        <option value="">Selecione</option>
                                                        @foreach ($conselho as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($medico) && $medico->conselho == $tipo) selected @elseif(old('conselho') == $tipo) selected @endif>{{$tipo}}</option>
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
                                                        <a class="nav-link" data-toggle="tab" href="#2" role="tab">Especialidade/Corpo Clínico</a>
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
                                                                    <input type="text" name="rg" class="form-control" value="@if(isset($medico)){{$medico->rg}}@else{{old('rg')}}@endif" onKeyPress="MascaraGenerica(this, 'RG');">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Orgão emissor</label>
                                                                    <input type="text" name="emissor" class="form-control" value="@if(isset($medico)){{$medico->emissor}}@else{{old('emissor')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">CPF</label>
                                                                    <input type="text" name="cpf" class="form-control" value="@if(isset($medico)){{$medico->cpf}}@else{{old('cpf')}}@endif" onKeyPress="MascaraGenerica(this, 'CPF');">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="form-label">Sexo</label>
                                                                    <select name="sexo" class="form-control" value="@if(isset($medico)){{$medico->sexo}}@else{{old('sexo')}}@endif">
                                                                        <option value="">Selecione</option>
                                                                        @foreach ($tipo_sexo as $key => $tipo)
                                                                        <option value="{{$tipo}}" @if(isset($medico) && $medico->sexo == $tipo) selected @elseif(old('sexo') == $tipo) selected @endif>{{$tipo}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Endereço</label>
                                                                    <input id="rua" type="text" name="endereco" class="form-control" required value="@if(isset($medico)){{$medico->endereco}}@else{{old('endereco')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group floating-label">
                                                                    <label class="">Cidade</label>
                                                                    <input id="cidade" type="text" name="cidade" class="form-control floating-input" value="@if(isset($medico)){{$medico->cidade}}@else{{old('cidade')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Bairro</label>
                                                                    <input id="bairro" type="text" name="bairro" class="form-control" value="@if(isset($medico)){{$medico->bairro}}@else{{old('bairro')}}@endif">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <div class="form-group">
                                                                    <label class="form-label">Complemento</label>
                                                                    <input type="text" name="complemento" class="form-control" value="@if(isset($medico)){{$medico->complemento}}@else{{old('complemento')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Número</label>
                                                                    <input type="number" name="numero" class="form-control" value="@if(isset($medico)){{$medico->numero}}@else{{old('numero')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">UF</label>
                                                                    <input id="uf" type="text" name="uf" class="form-control" value="@if(isset($medico)){{$medico->uf}}@else{{old('uf')}}@endif">
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">CEP</label>
                                                                    <input id="cep" type="text" name="cep" class="form-control" required value="@if(isset($medico)){{$medico->cep}}@else{{old('cep')}}@endif" onKeyPress="MascaraGenerica(this, 'CEP');">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="form-label">Telefone</label>
                                                                    <input type="text" name="telefone" class="form-control" required value="@if(isset($medico)){{$medico->telefone}}@else{{old('telefone')}}@endif" onKeyPress="MascaraGenerica(this, 'TELEFONE');">
                                                                </div>
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">E-mail</label>
                                                                    <input type="text" name="email" class="form-control" required value="@if(isset($medico)){{$medico->email}}@else{{old('email')}}@endif">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="2" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-10">
                                                                @if(isset($medico) && count($medico->especialidades) > 0)
                                                                @foreach ($medico->especialidades as $item)
                                                                <div id="inputFormRow">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" name="especialidades[]" class="form-control m-input" placeholder="Adicionar especialidade" autocomplete="off" value="{{ $item->nome }}">
                                                                        <div class="input-group-append">
                                                                            <button id="removeRow" type="button" class="btn btn-danger">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                <div id="inputFormRow">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" name="especialidades[]" class="form-control m-input" placeholder="Adicionar especialidade" autocomplete="off">
                                                                        <div class="input-group-append">
                                                                            <button id="removeRow" type="button" class="btn btn-danger">
                                                                                <i class="fas fa-trash"></i>

                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif

                                                                <div id="newRow"></div>
                                                                <button id="addRow" type="button" class="btn btn-info">
                                                                    <i class="fas fa-plus"></i>
                                                                    Adicionar
                                                                </button>
                                                            </div>
                                                            
                                                        </div>
                                                        <br>

                                                    </div>

                                                    <div class="row">
                                                        <br>
                                                        <div class="col-3" align="home">
                                                            @isset($medico->id)
                                                            <a href="/medicos/gerar_pdf/{{ $medico->id }}" class="btn btn-danger" target="_blank">
                                                                Gerar PDF
                                                                <i class="fas fa-file-pdf"></i>
                                                            </a>
                                                            @endisset
                                                        </div>
                                                        <br>
                                                        <div class="col" align="end">
                                                            <button type="submit" class="btn btn-success w-25 hover-shadow">
                                                                Salvar
                                                                <i class="ti-save" style="margin: 5px;"></i>
                                                            </button>
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

<script type="text/javascript">
    // add row
    $("#addRow").click(function() {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="especialidades[]" class="form-control m-input" placeholder="Adicionar especialidade" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger"> <i class="fas fa-trash"></i></button>';
        html += '</div>';
        html += '</div>';
        $('#newRow').append(html);
    });
    // remove row
    $(document).on('click', '#removeRow', function() {
        $(this).closest('#inputFormRow').remove();
    });
</script>
@include('layout.footer')