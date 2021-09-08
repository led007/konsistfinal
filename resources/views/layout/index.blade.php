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
                                                        <h4 class="text-c-green">{{ $data['pacientes'] }}</h4>
                                                        <h6 class="text-muted m-b-0">Pacientes</h6>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <i class="fas fa-user fa-2x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-c-green">
                                                <a href="/pacientes">
                                                    <div class="row align-items-center">
                                                        <p class="text-white m-b-0">| esta semana</p>
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
                                                        <h4 class="text-c-purple">{{ $data['medicos'] }}</h4>
                                                        <h6 class="text-muted m-b-0">Médicos</h6>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <i class="fas fa-user-md fa-2x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-c-purple">
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
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <h4 class="text-c-red">{{ $data['pacientes'] }}</h4>
                                                        <h6 class="text-muted m-b-0">Pacientes</h6>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <i class="fas fa-user-times fa-2x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-c-red">
                                                <a href="/pacientes">
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
                                                        <h4 class="text-c-blue">{{ $data['usuarios'] }}</h4>
                                                        <h6 class="text-muted m-b-0">Usuários</h6>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <i class="fa fa-users fa-2x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-c-blue">
                                                <a href="/usuarios">
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
                                                            <th>Consultório</th>
                                                            <th class="text-right">Priority</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($agenda as $item)
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
                                                                    <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                                    <div class="d-inline-block">
                                                                        <h6>{{ $item->pacientes->nome}}</h6>
                                                                        <p class="text-muted m-b-0">Médico: {{ $item->medico->nome }}</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{ date( 'd/m' , strtotime($item->data))}}</td>
                                                            <td>{{ $item->consult}}</td>
                                                            <td class="text-right"><label class="label label-danger">Low</label></td>
                                                        </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>
                                                <div class="text-right m-r-20">
                                                    <a href="#!" class=" b-b-primary text-primary">View all Projects</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-12">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col">
                                                    <h4>$256.23</h4>
                                                    <p class="text-muted">Este mês</p>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="label label-success">+20%</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h4>$256.23</h4>
                                                    <p class="text-muted">Mês passado</p>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="label label-success">+20%</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h4>$256.23</h4>
                                                    <p class="text-muted">Mês retrasado</p>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="label label-success">+20%</label>
                                                </div>
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