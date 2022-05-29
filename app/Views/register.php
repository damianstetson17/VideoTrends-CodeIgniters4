<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <!-- scripts -->
        <script type="text/javascript" src="./libs/jquery-3.6.0.js"></script>
        <script type="text/javascript" src="./scripts/init_components_register.js"></script>
        <script type="text/javascript" src="./scripts/checkEmail.js"></script>
        <!-- boostrap 5.2.0 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <!-- css -->
        <style><?php include "css/header_style.css" ?></style>
        <style><?php include "css/register_style.css" ?></style>
        <style><?php include "css/footer_style.css" ?></style>
        <!-- map -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>VideoTrend - Registro</title>
    </head>
    <body>
        <?=$header?>
        <div class="form-banner-container">
            <form class="grid-form-container" method="post" action='/registration'>
                <p class="titulo-form">Datos de inicio de Sesión</p>
                <div class='check-container'>
                    <div class='error-img-container' id='error-img-container'>
                        <img src="img/okEmailCheck.png" id="okEmailCheck" alt="VideoTrend" width="35" height="35">
                        <p id="okMsgEmailCheck">¡Correo válido!</p>
                        <img src="img/errorEmailCheck.png" id="errorEmailCheck" alt="VideoTrend" width="35" height="35">
                        <p id="errorMsgEmailCheck">¡El correo ya se encuentra asociado a un usuario!</p>
                    </div>
                </div>
                <P>E-mail*</P>
                <input id="email" type="email" name="email" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su correo electrónico."/>
                <P>Contraseña*</P>
                <input type="password" name="password" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese una contraseña para su nueva cuenta."/>
                <P>Repetir Contraseña*</P>
                <input type="password" data-bs-toggle="tooltip" data-bs-placement="top" title="Vuelva a escribir su contraseña."/>
                <p class="titulo-form">Datos Personales</p>
                <p>Nombre</p>
                <input type="text" name="name"maxlength="60" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su nombre completo sin su apellido."/>
                <P>Apellido</P>
                <input type="text" name="secondName" maxlength="60" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su apellido."/>
                <P>Genero</P>
                <div class="gender-select-container" data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione su genero.">
                    <input type="radio" name="gender" id="male" value ="1" name="gender" checked>
                    <label for="male">Masculino</label>
                    <input type="radio" name="gender" id="female" value ="0" name="gender">
                    <label for="female">Femenino</label>
                </div>
                <p>Número de Teléfono</p>
                <input type="tel" placeholder="+54 3764 651503" name="phone" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese un nro de teléfono válido."/>
                <p>Fecha de Nacimiento</p>
                <input id="datePicker" type="date" data-bs-toggle="tooltip" name="datebirth" data-bs-placement="top" title="Seleccione su fecha de nacimiento."/>
                <P>Página Web</P>
                <input type="web" data-bs-toggle="tooltip" name="web" data-bs-placement="top" title="Ingrese su sitio web si lo posee."/>
                <P class="titulo-form">Datos de localización</P>
                <P>País</P>
                <select id="pais" data-bs-toggle="tooltip" name="country" data-bs-placement="top" title="Seleccione su país de origen">
                    <?php 
                        foreach ($countries as $country):
                            echo '<option value="'.$country["id"].'">'.$country["name"].'</option>';
                        endforeach;
                    ?>
                </select>
                <P>Provincia/Estado</P>
                <select id="provincia" data-bs-toggle="tooltip" name="province" data-bs-placement="top" title="Seleccione su provincia de origen.">
                    <?php 
                        foreach ($provinces as $province):
                            echo '<option value="'.$province["id"].'">'.$province["name"].'</option>';
                        endforeach;
                    ?>
                </select>
                <P>Ciudad</P>
                <select id="ciudad" data-bs-toggle="tooltip" name="city" data-bs-placement="top" title="Seleccione su ciudad de origen.">
                    <?php 
                        foreach ($cities as $city):
                            echo '<option value="'.$city["id"].'">'.$city["name"].'</option>';
                        endforeach;
                    ?>
                </select>
                <P>Calle</P>
                <input type="text" data-bs-toggle="tooltip" name="street" data-bs-placement="top" title="Ingrese el nombre de la calle en la que reside."/>
                <P>Altura</P>
                <input type="text" data-bs-toggle="tooltip" name="number"data-bs-placement="top" title="Ingrese el número de su residencia."/>
                <P>Coordenadas</P>
                <div class="coords-container">
                    <div class="lat-container">
                        <input type="number" value="-27.37009" step="0.00001" id="lat" name="lat" title="Ingrese la latitud de su residencia.">
                        <label for="lat">Lat</label>
                    </div>
                    <div class="long-container">
                        <input type="number" id="long" step="0.00001" value="-55.94018" name="long" title="Ingrese la longitud de su residencia.">
                        <label for="long">Long</label>
                    </div>
                </div>
                <div id="map"></div>
                <button id='submit_btn' type="submit" class="btn btn-primary">Crear mi cuenta</button>
            </form>
            <div class="banner-condiciones-container">
                <div class="banner_derecho"> </div>
                <p>
                    Al hacer click en "Crear mi cuenta", aceptas las Condiciones y confirmas que leíste nuestra Política de datos, incluido el uso de cookies.
                </p>
            </div>
        </div>
    </body>
</html>