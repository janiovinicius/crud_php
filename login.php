<?php 
    $paginaJS = "login";
	include_once 'header.php';   
    
?>

<div class="m-5 row">
	<div class="container my-3 row">               
	 <!--(2) Exemplo de formulario-->
	    <div class="fs-1 mb-5">
            <h1 class="row justify-content-center">Login</h1>
        </div>

    <!-- TELA DE LOGIN-->
            <div class="container-sm">
                    <div class="my-3">
                        <h3 class="fs-4 mb-1 row justify-content-center">Autenticação Usuário</h3>
                    </div>
                <form action="login.php" method="POST">

                    <div class="mx-3 g-2">
                        <div class="row justify-content-center">
                            <div class="col-3 row justify-content-center">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-3 row justify-content-center">
                            <label for="idade" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                            </div>
                        </div>
                        
                    </div>
                    <?php include_once 'validaLogin.php'; ?>
                    <div class="mx-3 my-3 g-2">
                        <div class="d-flex flex-column align-items-center gap-2">
                            <button type="submit" name="btn-cadastrar" class="btn btn-link w-25">Cadastre-se</button>
                            <button type="submit" name="btn-entrar" class="btn btn-login-css w-25">Entrar</button>
                        </div>
                    </div>
                </form> 
            </div>   
    <!-- FIM TELA DE LOGIN-->
    </div>
 </div>

<?php 
    include_once 'footer.php';
?>
