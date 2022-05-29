<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- css -->
        <style><?php include "css/header_style.css" ?></style>
        <style><?php include "css/login_style.css" ?></style>
        <style><?php include "css/footer_style.css" ?></style>
        <!-- scripts -->
        <script type="text/javascript" src="./libs/jquery-3.6.0.js"></script>
        <script type="text/javascript" src="./scripts/bannerChangeFX.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VideoTrend - Login</title>
    </head>
    <body>
        <?=$header?>    
            <div class="login-container">
                <section id="img_login"></section>
                <aside>
                    <form id="form-login" method="post" action='/login'>
                        <!-- Error msgs-->
                        <?php if (session('validationErrors') !== null): ?>
                            <div class="alert-error">
                                <?= session('validationErrors')->listErrors() ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session('error') !== null): ?>
                            <div class="alert-error">
                                <?= session('error') ?>
                            </div>
                        <?php endif; ?>
                        <!-- Succes msg-->
                        <?php if (session('success') !== null): ?>
                            <div class="alert-succ">
                                <?= session('success') ?>
                            </div>
                        <?php endif; ?>
                        <input type="email" id="email" name="email"/>
                        <label for="email">E-mail</label>
                        <input type="password" id="password" name="password"/>
                        <label for="password">Contraseña</label>
                        <button type='submit'>Iniciar Sesión</button>
                    </form>
                    
                    <hr>
                    <button type='button' onclick="location.href='./register'">Crear una cuenta</button>
                </aside>
            </div>
        <?=$footer?>  
    </body>
</html>
