
<?php
session_start();
session_regenerate_id(true);
$usuariologado = isset($_SESSION['logado']);

?>


<!DOCTYPE html>
  <html>
    <head>
	<meta charset ="utf-8">
	<title> Sistema de Produtos </title>
      
       <!-- USANDO VIA CDN -- Compiled and minified CSS -->     
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      
     <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/imask"></script>
     <script defer  src="js/<?php echo $paginaJS;?>.js"></script>
     <link rel="stylesheet" href="style/style.css">
     <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <header>
        <nav class="row justify-content-center navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <p class="row justify-content-center ">JANIO&VINICIUS</p>
        </a>
        <?php 
        if($usuariologado === true){
            echo('<a href="login.php" class="row justify-content-center ">Sair</a>');
            }
        else{
            echo('<a href="login.php" class="row justify-content-center ">Cadastre-se</a>');
            }
        ?>
    </nav>
      </header>
    