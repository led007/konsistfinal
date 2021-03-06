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
                        <p class="m-b-0">Gerenciamento de Médicos</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/medicos">Médicos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal start -->
    @foreach ($medicos as $item)
    <div class="modal fade modal-icon" id="modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Dados do Médico</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="col-md">
                            <div class="form-group">
                                Nome:
                                <input class="form-control" readonly type="text" value="{{$item->nome}}">
                            </div>
                            <div class="form-group">
                                Email:
                                <input class="form-control" readonly type="text" value="{{$item->email}}">
                            </div>
                            <div class="form-group">
                                Conselho:
                                <input class="form-control" readonly type="text" value="{{$item->conselho}}">
                            </div>
                            <div class="form-group">
                              Email:
                                <input class="form-control" readonly type="text" value="{{$item->email}}">
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
                                    <i class="fas fa-user" style="margin: 10px;"></i>Médicos
                                    <div class="card-tools">
                                    </div>
                                </h2>
                                <div class="row">
                                    <div class="col" style="margin: 10px;">
                                        <a href="/medicos/novo" class="btn btn-primary">
                                            Novo Médico
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
                                                    <td align="center">Médico</td>
                                                    <td align="center">Status</td>
                                                    <td align="center">Especialidade</td>
                                                    <td align="center">Ações</td>
                                                </tr>
                                            </thead>
                                            @foreach ($medicos as $item)
                                            <tbody>
                                                <td align="center">{{ $item->id }}</td>
                                                <td align="center">{{ $item->nome }}</td>
                                                <td align="center">{{ $item->status }}</td>
                                                <td align="center">
                                                    @foreach ($item->especialidades as $item_espec)
                                                    {!! $item_espec->nome . '<br>' !!}
                                                    @endforeach
                                                </td>
                                                <td align="end">
                                                    <a href="/medicos/editar/{{ $item->id }}" class="btn btn-info">
                                                        <i class="ti-write"></i>
                                                    </a>
                                                    <button data-target="#modal{{ $item->id }}" data-toggle="modal" class="btn btn-inverse">
                                                        <i class="ti-eye"></i>
                                                    </button>
                                                    <a href="#" class="btn btn-danger" onclick="deleta('/medicos/deletar/{{ $item->id }}')">
                                                        <i class="ti-trash"></i>
                                                    </a>

                                                </td>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            {{ $medicos->links() }}
                                            <br>
                                        </div>
                                    </div>

                                </div>
                                @if(count($medicos) < 1) 
                                        <div class="alert alert-info" style="margin-left: 61px; margin-right: 61px;">
                                        Nenhum registro encontrado!
                                    </div>
                                    @endif
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