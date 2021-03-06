<?php require_once 'includes/helpers.php'; ?>

<!--Sidebar-->
<aside id="sidebar">
    <?php if(isset($_SESSION['user'])): ?>
        <div id="usuario-logeado" class="bloque">
            <h3>Bienvenido, <?=$_SESSION['user']['nombre'].' '.$_SESSION['user']['apellidos']?></h3>

            <a class="boton boton-verde" href="new_entry.php">Crear Entrada</a>
            <a class="boton boton-naranja" href="edit_user.php">Editar Datos</a>
            <a class="boton" href="new_cat.php">Crear Categoría</a>
            <a class="boton boton-rojo" href="logout.php">Cerrar Sesión</a>
        </div>
    <?php endif; ?>

    <?php if(!isset($_SESSION['user'])): ?>
        <section id="login" class="bloque">
            <h3>Inicia Sesion</h3>
            <?php if(isset($_SESSION['error_login'])): ?>
                <div class="alerta alerta-error">
                    <?=$_SESSION['error_login']?>
                </div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" />

                <label for="password">Contraseña</label>
                <input type="password" name="password" />

                <input type="submit" value="Entrar" />
            </form>
        </section>

        <section id="register" class="bloque">
            <h3>Registrate</h3>
            <?php if(isset($_SESSION['finished'])): ?>
                <div class="alerta alerta-exito">
                    <?=$_SESSION['finished']?>
                </div>
            <?php elseif(isset($_SESSION['errors']['general'])): ?>
                <div class="alerta alerta-error">
                    <?=$_SESSION['errors']['general'] ?>
                </div>
            <?php endif; ?>
            <form action="register.php" method="post">
                <label for="name">Nombres</label>
                <input type="text" name="name" />
                <?php echo isset($_SESSION['errors'])? show_error($_SESSION['errors'], 'name') : ''?>

                <label for="lastname">Apellidos</label>
                <input type="text" name="lastname" />
                <?php echo isset($_SESSION['errors'])? show_error($_SESSION['errors'], 'lastname') : '' ?>

                <label for="email">Email</label>
                <input type="email" name="email" />
                <?php echo isset($_SESSION['errors'])? show_error($_SESSION['errors'], 'email') : ''?>

                <label for="password">Contraseña</label>
                <input type="password" name="password" />
                <?php echo isset($_SESSION['errors'])? show_error($_SESSION['errors'], 'password') : '' ?>

                <input type="submit" name="submit" value="Registrarse" />
            </form>
            <?php del_error(); ?>
        </section>
    <?php endif; ?>
</aside>