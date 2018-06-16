<header>
	<h1>Fundación</h1>
	<nav>
		<ul>
			<li><a href="home">Inicio</a></li>
			<?php echo ($tipo_usuario == 1 || $tipo_usuario == 3) ? '<li><a href="actividades">Actividades</a></li>' : ''; ?>
			<?php echo ($tipo_usuario == 1) ? '<li><a href="donaciones">Donaciones</a></li>' : ''; ?>
		</ul>
		<div class="menu-user">
			<ul>
				<li><a href=""><i class="fas fa-user"></i>  <?= $func->getNombre($func->session); ?></a>
					<ul>
						<li><a href="mi-cuenta">Mi cuenta</a></li>
						<?php echo ($tipo_usuario == 2) ? '<li><a href="mis-actividades">Mis Actividades</a></li>' : ''; ?>
						<?php echo ($tipo_usuario == 3) ? '<li><a href="mis-donaciones">Mis Donaciones</a></li>' : ''; ?>
						<li><a href="action/sessionDestroy.php">Cerrar Sesión</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>