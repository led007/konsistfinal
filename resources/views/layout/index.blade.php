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
                        <p class="m-b-0">Dashboard</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
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
                            <div class="card">
                                <h2 class="title-3 m-b-30" align="home">
                                    <br>
                                    <i class="fa fa-home" style="margin: 10px;"></i>Dashboard
                                    <div class="card-tools">
                                    </div>
                                </h2>
                                <div class="row align-items-center">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <h4 class="text-c-green">{{ $finalizado }}</h4>
                                                        <h6 class="text-muted m-b-0">Pacientes finalizados</h6>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <i class="fas fa-user-check fa-2x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-c-green">
                                                <a href="/agenda">
                                                    <div class="row align-items-center">
                                                        <p class="text-white m-b-0">| total</p>
                                                        <div class="col" align="right">
                                                            <i class="fas fa-arrow-circle-right fa-2x"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <h4 style="color: #ffe100;">{{ $aser }}</h4>
                                                        <h6 class="text-muted m-b-0">Pacientes a ser atendido</h6>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <i class="fas fa-user-clock fa-2x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-warning">
                                                <a href="/agenda">
                                                    <div class="row align-items-center">
                                                        <p class="text-white m-b-0">| total</p>
                                                        <div class="col" align="right">
                                                            <i class="fas fa-arrow-circle-right fa-2x"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <h4 class="text-c-red">{{ $cancelados }}</h4>
                                                        <h6 class="text-muted m-b-0">Atendimento cancelado</h6>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <i class="fas fa-user-times fa-2x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-c-red">
                                                <a href="/agenda">
                                                    <div class="row align-items-center">
                                                        <p class="text-white m-b-0">| consultas canceladas</p>
                                                        <div class="col" align="right">
                                                            <i class="fas fa-arrow-circle-right fa-2x"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <h4 class="text-c-blue">{{ $data['medicos'] }}</h4>
                                                        <h6 class="text-muted m-b-0">Total de Médicos em atividade</h6>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <i class="fas fa-user-md fa-2x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-c-blue">
                                                <a href="/medicos">
                                                    <div class="row align-items-center">
                                                        <p class="text-white m-b-0">| total</p>
                                                        <div class="col" align="right">
                                                            <i class="fas fa-arrow-circle-right fa-2x"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-8 col-md-12">
                                    <div class="card table-card">
                                        <div class="card-header">
                                            <h5>Próximos pacientes</h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div class="chk-option">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label class="check-task">
                                                                            <input type="checkbox" value="">
                                                                            <span class="cr">
                                                                                <i class="cr-icon fa fa-check txt-default"></i>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                Selecionar todos
                                                            </th>
                                                            <th>Data</th>
                                                            <th>Horário</th>
                                                            <th>Status</th>
                                                            <th class="text-right">Ação</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($proximos as $item)
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="chk-option">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label class="check-task">
                                                                            <input type="checkbox" value="">
                                                                            <span class="cr">
                                                                                <i class="cr-icon fa fa-check txt-default"></i>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-inline-block align-middle">
                                                                    <img src="assets/images/avatarpaciente.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                                    <div class="d-inline-block">
                                                                        <h6>{{ $item->pacientes->nome}}</h6>
                                                                        <p class="text-muted m-b-0">Médico: {{ $item->medico->nome }}</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{ date( 'd/m' , strtotime($item->data))}}</td>
                                                            <td>{{ date( 'h:i' , strtotime($item->hora))}}</td>
                                                            <td align="center">
                                                                <div class="@if($item->status == 'A ser atendido') bg-warning @elseif($item->status == 'Atendimento finalizado') bg-success @elseif($item->status == 'Atendimento cancelado') bg-danger @endif">
                                                                    {{$item->status}}
                                                                </div>
                                                            </td>
                                                            <td class="text-right">
                                                                <a href="/agenda">
                                                                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                    @endforeach
                                                </table>
                                                <div align="right" class="col">
                                                    {{ $proximos->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-12">
                                    <div class="card">
                                        <div class="card-block">
                                            <h4>Fundos mensais</h4>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <h4>${{$total}}</h4>
                                                    <p class="text-muted">Este mês</p>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="label label-success">+20%</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h4>$158.00</h4>
                                                    <p class="text-muted">Mês passado</p>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="label label-success">+20%</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h4>$526.97</h4>
                                                    <p class="text-muted">Mês retrasado</p>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="label label-success">+20%</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card ">
                                            <div class="card-header">
                                                <h5>Team Members</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block">
                                                @foreach ($user as $item)
                                                <div class="align-middle m-b-30">
                                                    <img src="{{$item->foto}}" class="img-radius img-40 align-top m-r-15">
                                                    <div class="d-inline-block">
                                                        <h6>{{$item->nome}}</h6>
                                                        <p class="text-muted m-b-0">{{$item->funcao}}</p>
                                                    </div>
                                                </div>
                                                @endforeach
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