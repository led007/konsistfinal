<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar" id="nav">
            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
            <div class="pcoded-inner-navbar main-menu">
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-80 img-radius" src='{{ \Auth::user()->foto }}' alt="User-Profile-Image">
                        <div class="user-details">
                            <span id="more-details"> {{ \Auth::user()->nome }}<i class="fa fa-caret-down"></i></span>
                        </div>
                    </div>

                    <div class="main-menu-content">
                        <ul>
                            <li class="more-details">
                                <a href="/usuarios"><i class="fas fa-user"></i>Meu Perfil</a>
                                <a href="#!"><i class="fas fa-cog"></i>Configurações</a>
                                <a href="/logout"><i class="fas fa-sign-out-alt"></i>Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Home</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="{{ request()->is('/') ? 'active' : '' }}">
                        <a href="/" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fas fa-home"></i><b>D</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                </ul>
                <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Agenda &amp; Laudos</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="{{ request()->is('agenda*') ? 'active' : '' }}">
                        <a href="/agenda" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="far fa-calendar-alt"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Agendamento</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="/auth" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fas fa-file-medical"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Laudos</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                </ul>

                <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Registros</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="{{ request()->is('pacientes*') ? 'active' : '' }}">
                        <a href="/pacientes" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fas fa-user"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Pacientes</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ request()->is('medicos*') ? 'active' : '' }}">
                        <a href="/medicos" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fas fa-user-md"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Médicos</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ request()->is('funcionarios*') ? 'active' : '' }}">
                        <a href="/funcionarios" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fas fa-user-tie"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Funcionários</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                   
                    <li class="{{ request()->is('usuarios*') ? 'active' : '' }}">
                        <a href="/usuarios" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-users"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Usuários</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                   
                </ul>


        </nav>