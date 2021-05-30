@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')
@include('layout.pageheader')
 
<!-- Modal start -->
@foreach ($usuarios as $item)
<div class="modal fade modal-icon" id="modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Dados do Usuário</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div class="icon-list-demo" style="width: 13rem;">
                        <img class="card-img-top" src="{{ $item->foto }}">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                           Nome:
                            <input class="form-control" readonly type="text" id="nome" value="{{$item->nome}}">
                        </div>
                        <div class="form-group">
                            Email:
                            <input class="form-control" readonly type="text" id="email" value="{{$item->email}}">
                        </div>
                        <div class="form-group">
                            Funçâo:
                            <input class="form-control" readonly type="text" id="email" value="{{$item->funcao}}">
                        </div>
                        
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
                                <i class="fa fa-users" style="margin: 10px;"></i>Usuários
                                <div class="card-tools">
                                </div>
                            </h2>
                            <div class="row">
                                <div class="col" style="margin: 10px;">
                                    <a href="/usuarios/novo" class="btn btn-primary">
                                        Novo Usuário
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
                                                <td align="center">Nome</td>
                                                <td align="center">Função</td>
                                                <td align="center">Email</td>
                                                <td align="center">Ações</td>
                                            </tr>
                                        </thead>
                                        @foreach ($usuarios as $item)
                                        <tbody>
                                            <td align="center">{{ $item->id }}</td>
                                            <td align="center">{{ $item->nome }}</td>
                                            <td align="center">{{ $item->funcao}}</td>
                                            <td align="center">{{ $item->email }}</td>
                                            <td align="end">
                                                <a href="/usuarios/editar{{ $item->id }}" class="btn btn-info">
                                                    <i class="ti-write"></i>
                                                </a>
                                                <button data-target="#modal{{ $item->id }}" data-toggle="modal" class="btn btn-inverse">
                                                    <i class="ti-eye"></i>
                                                </button>
                                                <a href="#"  class="btn btn-danger" onclick="deleta('/usuarios/deletar/{{ $item->id }}')">
                                                    <i class="ti-trash"></i>
                                                </a>
                                                
                                            </td>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        {{ $usuarios->links() }}
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