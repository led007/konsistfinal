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
                        <p class="m-b-0">Agendamento</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/agenda">Agendamento</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal start -->
    @foreach ($agenda as $item)
    <div class="modal fade modal-icon" id="modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Dados do Agendamento</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md">
                    <div class="form-group">
                                Nome do Paciente:
                                <input class="form-control" readonly type="text" value="{{ $item->pacientes->nome}}">
                            </div>
                            <div class="form-group">
                            Médico:
                                <input class="form-control" readonly type="text" value="{{ $item->medico->nome}}">
                            </div>
                            <div class="form-group">
                                Horário:
                                <input class="form-control" readonly type="text" value="{{ date( 'h:i' , strtotime($item->hora))}}">
                            </div>
                            <div class="form-group">
                               Data:
                                <input class="form-control" readonly type="text" value="{{ date( 'd/m' , strtotime($item->data))}}">
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal end -->

    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <!-- task, page, download counter  start -->
                        <div class="container">
                            <div class="card">
                                <h2 class="title-3 m-b-30" align="home">
                                    <br>
                                    <i class="fas fa-calendar" style="margin: 10px;"></i>Agendamento
                                    <div class="card-tools">
                                    </div>
                                </h2>
                                <div class="row">
                                    <div class="col" style="margin: 10px;">
                                        <a href="/agenda/novo" class="btn btn-primary">
                                            Novo Agendamento
                                            <i class="ti-plus"></i>
                                        </a>
                                    </div>
                                    <div class="col" style="margin: 10px;">
                                        <form action="">
                                            <div class="input-group input-group float-right " style="width: 250px;">
                                                <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar" value="{{ $pesquisa }}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-secondary">
                                                        <i class="ti-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="col-lg-12">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr>
                                                    <td align="center">#</td>
                                                    <td align="center">Data</td>
                                                    <td align="center">Paciente</td>
                                                    <td align="center">Médico</td>
                                                    <td align="center">Status</td>
                                                    <td align="center">Ações</td>
                                                </tr>
                                            </thead>
                                            @foreach ($agenda as $item)
                                            <tbody>
                                                <td align="center">{{ $item->id }}</td>
                                                <td align="center">{{ date( 'd/m' , strtotime($item->data))}}</td>
                                                <td align="center">{{ $item->pacientes->nome}}</td>
                                                <td align="center">{{ $item->medico->nome }}</td>
                                                <td align="center"><div class="@if($item->status == 'A ser atendido') bg-warning @elseif($item->status == 'Atendimento finalizado') bg-success @elseif($item->status == 'Atendimento cancelado') bg-danger @endif">
                                                {{$item->status}}
                                                </div></td>

                                                <td align="end">
                                                    <a href="/agenda/editar/{{ $item->id }}" class="btn btn-info">
                                                        <i class="ti-write"></i>
                                                    </a>
                                                    <button data-target="#modal{{ $item->id }}" data-toggle="modal" class="btn btn-inverse">
                                                        <i class="ti-eye"></i>
                                                    </button>
                                                    <a href="#" class="btn btn-danger" onclick="deleta('/agenda/deletar/{{ $item->id }}')">
                                                        <i class="ti-trash"></i>
                                                    </a>

                                                </td>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            {{ $agenda->links() }}
                                            <br>
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

