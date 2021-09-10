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
                        <p class="m-b-0">Agenda</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/agenda">Agendamento</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ isset($agenda) ? 'Editar' : 'Novo' }} Agendamento</a>
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
                            <a href="/agenda" class="btn btn-secondary">
                                Voltar
                                <i class="ti-arrow-left"></i>
                            </a>

                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <h2><i class="far fa-calendar-alt" style="margin: 10px;"></i> {{ isset($agenda) ? 'Editar' : 'Novo' }} Agendamento</h2>
                                        <div class="col" align="end">
                                            @isset($agenda->id)
                                            <a href="/agenda/novo" class="btn btn-primary">
                                                Novo agendamento
                                                <i class="ti-plus"></i>
                                            </a>
                                            @endisset
                                        </div>
                                    </div>

                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form action="/agenda/salvar" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="@isset($agenda){{$agenda->id}}@endisset">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="paciente_id" class="form-label">Paciente</label>
                                                    <select name="paciente_id" id="paciente_id" class="form-control">
                                                        <option value="">Selecione um Paciente</option>
                                                        @foreach($paciente_id as $item)
                                                        <option value="{{$item->id}}" @if(isset($agenda) &&$agenda->paciente_id == $item->id) selected @elseif(old('paciente_id') == $item->id) selected @endif>{{$item->nome}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="medico_id" class="form-label">Médico</label>
                                                    <select name="medico_id" id="medico_id" class="form-control">
                                                        <option value="">Selecione um Médico</option>
                                                        @foreach($medico_id as $item)
                                                        <option value="{{$item->id}}" @if(isset($agenda) &&$agenda->medico_id == $item->id) selected @elseif(old('medico_id') == $item->id) selected @endif>{{$item->nome}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="form-label">Tipo</label>
                                                    <select name="tipo_a" class="form-control" value="@if(isset($agenda)){{$agenda->tipo_a}}@else{{old('tipo_a')}}@endif">
                                                        <option value="">Selecione</option>
                                                        @foreach ($tipo_a as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($agenda) && $agenda->tipo_a == $tipo) selected @elseif(old('tipo_a') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Data</label>
                                                    <input required  type="date" min="{{ date('Y-m-d') }}" name="data" class="form-control" value="@if(isset($agenda)){{$agenda->data}}@else{{old('data')}}@endif" >
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Horário</label>
                                                    <input type="time" name="hora" class="form-control" required value="@if(isset($agenda)){{$agenda->hora}}@else{{old('hora')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Consultório</label>
                                                    <select name="consult" class="form-control" value="@if(isset($agenda)){{$agenda->consult}}@else{{old('consult')}}@endif">
                                                        <option value="">Selecione</option>
                                                        @foreach ($consult as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($agenda) && $agenda->consult == $tipo) selected @elseif(old('consult') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Preço:</label>
                                                    <input type="text" name="preco" class="form-control" required value="@if(isset($agenda)){{$agenda->preco}}@else{{old('preco')}}@endif" onKeyPress="MascaraGenerica(this, 'MOEDA');">
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="row">
                                                <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-label">Status do atendimento</label>
                                                    <select name="status" class="form-control" value="@if(isset($agenda)){{$agenda->status}}@else{{old('status')}}@endif">
                                                        <option value="">Selecione</option>
                                                        @foreach ($status as $key => $tipo)
                                                        <option value="{{$tipo}}" @if(isset($agenda) && $agenda->status == $tipo) selected @elseif(old('status') == $tipo) selected @endif>{{$tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Observações:</label>
                                                    <textarea style="height: 140px;" class="form-control" name="observacao" id="observacao" rows="3">@if(isset($agenda)){{$agenda->observacao}}@else{{ old('observacao')}}@endif</textarea>
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

@include('layout.footer')