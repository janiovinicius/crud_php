
<?php
@session_start();
session_regenerate_id(true);
$currentPage = basename(path: $_SERVER['SCRIPT_NAME']);
$usuariologado = isset($_SESSION['logado']);

?>


<nav class="navbar header_toobar bg-transparent" data-bs-theme="light"> 
				<div class="offcanvas-body p-4 pt-0 p-lg-0">
					<ul class="navbar-nav nav-tabs flex-row flex-wrap bd-navbar-nav bg-transparent ps-5">
						<li class="nav-item col-6 col-lg-auto">
							<a class="nav-link py-2 px-0 px-lg-2 <?= ($currentPage == 'consultar.php') ? 'active' : '' ?>"  href="consultar.php">Produtos</a>
						</li>
						<li class="nav-item col-6 col-lg-auto">
							<a class="nav-link py-2 px-0 px-lg-2 <?= ($currentPage == 'adicionarprodutos.php') ? 'active' : '' ?>" href="adicionarprodutos.php">Adicionar Produtos</a>
						</li >
						<li class="nav-item col-6 col-lg-auto">
							<a class="nav-link py-2 px-0 px-lg-2 <?= ($currentPage == 'login.php') ? 'active' : '' ?>" href="<?= ($usuariologado === true) ? 'logout.php">Logout' : 'login.php">Login' ?></a>
							
						</li>
						
					</ul>
				</div>
			  </nav>
