@include('layout.header')

<section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->

                <form class="md-float-material form-material" action="/logar" method="post">
                    @csrf
                    <div class="text-center">
                        <img src="assets/images/login.png" alt="logo.png">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">Área restrita</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="email" name="email" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">E-mail</label>
                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="password" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Senha</label>
                            </div>

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Entrar</button>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-md-10">
                                    
                                </div>
                                <div class="col-md-2">
                                    <a href="http://prosa.eco.br/ " target="_blank"><img src="assets/images/auth/logologin.png"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end of form -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
<!-- Warning Section Starts -->

@include('layout.footer')