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
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal start -->
    @foreach ($pacientes as $item)
    <div class="modal fade modal-icon" id="modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Dados do Paciente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md">
                        <div class="form-group">
                            Nome do Paciente:
                            <input class="form-control" readonly type="text" value="{{ $item->nome}}">
                        </div>
                        <div class="form-group">
                            Data de Nascimento:
                            <input class="form-control" readonly type="text" value="{{ date( 'd/m/y' , strtotime($item->data_nasc))}}">
                        </div>
                        <div class="form-group">
                            Endere??o:
                            <input class="form-control" readonly type="text" value="{{ $item->endereco}}">
                        </div>
                        <div class="form-group">
                            Cidade:
                            <input class="form-control" readonly type="text" value="{{ $item->cidade}}">
                        </div>
                        <div class="form-group">
                            Bairro:
                            <input class="form-control" readonly type="text" value="{{ $item->bairro}}">
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
                                    <i class="fas fa-user" style="margin: 10px;"></i>Pacientes
                                    <div class="card-tools">
                                    </div>
                                </h2>
                                <div class="row">
                                    <div class="col" style="margin: 10px;">
                                        <a href="/pacientes/novo" class="btn btn-primary">
                                            Novo Paciente
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
                                                    <td align="center">Paciente</td>
                                                    <td align="center">Conv??nio</td>
                                                    <td align="center">Situa????o</td>
                                                    <td align="center">A????es</td>
                                                </tr>
                                            </thead>
                                            @foreach ($pacientes as $item)
                                            <tbody>
                                                <td align="center">{{ $item->id }}</td>
                                                <td align="center">{{ $item->nome }}</td>
                                                <td align="center">{{$item->convenio}}</td>
                                                <td align="center">{{ $item->situacao }}</td>
                                                <td align="end">
                                                    <a href="/pacientes/editar/{{ $item->id }}" class="btn btn-info">
                                                        <i class="ti-write"></i>
                                                    </a>
                                                    <button data-target="#modal{{ $item->id }}" data-toggle="modal" class="btn btn-inverse">
                                                        <i class="ti-eye"></i>
                                                    </button>
                                                    <a href="#" class="btn btn-danger" onclick="deleta('/pacientes/deletar/{{ $item->id }}')">
                                                        <i class="ti-trash"></i>
                                                    </a>

                                                </td>
                                            </tbody>
                                            <div class="row">
                                                <div class="col">
                                                    {{ $pacientes->links() }}
                                                    <br>
                                                </div>
                                            </div>
                                            @endforeach
                                        </table>
                                        @if(count($pacientes) < 1) 
                                        <div class="alert alert-info" style="margin-left: 61px; margin-right: 61px;">
                                        Nenhum registro encontrado!
                                    </div>
                                    @endif
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