<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <title>Correo</title>

    <style>
        body{
            margin: 0;
            padding: 0;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #fff;
        }

        ::-webkit-scrollbar-thumb {
            background: #232b35;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #1d242c;
        }

        .contenedor{
            width: 100%;
            overflow-x: hidden;
        }

        .header{
            background-color: #88c426; 
            color: #000000;
        }

        .header .header_contenido{
            width: 100%;
            padding-left: 5px;
            height: 4.5rem;
            display: flex;
            align-items: center;
        }

        .header .header_contenido img {
            display: block; 
            height: auto; 
            border: 0; 
            width: 208px; 
            max-width: 100%; 
            padding-left: 5px;
        }

        .contenido{
            background-color: #FFFFFF; 
            color: #000000; 
            width: 640px;
            margin: auto;
        }

        .contenido_mensaje {
            text-align: left; mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; vertical-align: top; padding-top: 40px; padding-bottom: 20px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;
        }

        .contenido_mensaje_texto{
            padding-bottom: 30px;
            padding-left: 50px;
            padding-right: 50px;
            font-size: 12px; 
            font-family: Ubuntu, Tahoma, Verdana, Segoe, sans-serif; 
            color: #052332; 
            line-height: 1.5;
        }

        .contenido_mensaje_texto p {
            margin: 0; font-size: 14px;
        }

        .contenido_mensaje_texto p span{
            font-size:18px;
            font-weight: bold;
        }

        .contenido_mensaje_contenedorBoton{
            padding-bottom: 30px;
            padding-right: 10px;
            padding-top: 8px;
            text-align: left;
            
        }

        .contenido_mensaje_contenedorBoton_boton{
            text-decoration: none;
            display: inline-block;
            width: auto; 
            border-radius: 3px;             
            padding: 5px 15px;
            line-height: 2; 
            font-family: Ubuntu, Tahoma, Verdana, Segoe, sans-serif;
            text-align: center;
            font-size: 16px;
            font-weight: 400;
            color: #fff;
            background-color: #25D366; 
            transition: .5s

        }

        .contenido_mensaje_contenedorBoton_boton:hover{            
            background-color: #1ca54e; 
            transition: .5s
        }

        .contenido_mensaje hr{
            height: 1px;
            margin-left: 50px;
            background-color: #052332;
        }

        .contenido_imagen{
            padding-left: 55px; 
            padding-right: 20px;
            width: 100%; 
            padding-top: 5px; 
            padding-bottom: 20px;
            line-height: 10px; 
            display: flex;
        }

        .contenido_imagen img{
            display: block; 
            height: auto; 
            border: 0; 
            width: 96px; 
            max-width: 100%;
        }

        .contenido_imagen_info{
            padding-top: 5px;
            padding-bottom: 20px;
            margin-left: 20px;
            font-size: 12px; 
            font-family: Ubuntu, Tahoma, Verdana, Segoe, sans-serif; 
            color: #052332; 
            line-height: 1.5;
        }

        .contenido_imagen_info p {
            margin: 0; font-size: 14px; text-align: left;
        }

        .contenido_imagen_info p a {
            color: #052332;
        }

        .footer{
            background-color: #252634;
        }

        .footer_imagen {
            text-align: left; 
            vertical-align: top; 
            padding: 25px 0px 15px 30px;
        }

        /* .footer_imagen img {
            display: block; height: auto; border: 0;
        } */

        .footer_redes {
            text-align: left; 
            font-weight: 400; 
            vertical-align: top; 
            padding: 0px 5px 15px 20px
        }

        .footer_redes a{
            text-decoration: none;
            margin-left: 2px;
        }

        .footer_direccion {
            padding: 15px 10px 25px 30px;
            font-size: 12px; 
            font-family: Ubuntu, Tahoma, Verdana, Segoe, sans-serif; 
            color: #999999; 
            line-height: 1.2;
        }
    </style>
</head>
<body>

    <div class="contenedor">
        <div class="header">
            <div class="header_contenido">
                <img src='http://gurrolaaxel.utdgrupoti.com/educaverse/public/images/logo/logo.png' alt='EducaVerse' title='EducaVerse'>
            </div>
        </div>
        <div class="contenido">
            <div class="contenido_mensaje">
                <div class="contenido_mensaje_texto">
                    <p><span>Correo enviado</span></p>
                    <br>
                    {{-- <p style="margin-bottom: 10px">
                        Hola Javier Alejandro Salazar Torres, usted se ha registrado exitosamente en Mexicallazo en Duro 2022.
                        
                    </p>
                    <p>A continuación le mostramos el número de cuenta a la cuál debe depositar:</p>
                    <p><strong>1234 5678 9101</strong></p>
                    <br>
                    <p>Cuando haya realizado el deposito, mandenos su captura por whatsapp</p>
                    <div class="contenido_mensaje_contenedorBoton">
                        <a href="https://wa.me/526181234567/?text=Ya%20deposité,%20adjunto%20captura." class="contenido_mensaje_contenedorBoton_boton">WhatsApp</a>
                    </div>--}}
                    <br>
                    <p>Gracias.</p>
                    <p>Equipo de EducaVerse.</p> 
                </div>
                <div class="divider">
                    <hr>
                </div>
            </div>
            <div class="contenido_imagen">
                <div>
                    <img src='http://gurrolaaxel.utdgrupoti.com/educaverse/public/assets/images/EV.png' alt='EducaVerse' title='EducaVerse'>
                </div> 
                <div class="contenido_imagen_info">
                    <p><strong>Contacto EducaVerse</strong></p>
                    <p>Team</p>
                    <p><a title="contacto@educaverse.com" href="mailto:contacto@educaverse.com">contacto@educaverse.com</a>
                    </p>
                    <p>+52 618 137 3050</p>
                    <br>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer_imagen">
                <a href="http://gurrolaaxel.utdgrupoti.com/educaverse/public/" style="display: flex; align-items: center;">
                    <img src="http://gurrolaaxel.utdgrupoti.com/educaverse/public/assets/images/EV.png" width="70px" alt="Logo">
                    <h2 style="text-left; font-family: Ubuntu, Tahoma, Verdana, Segoe, sans-serif; color: #fff">EducaVerse</h2>
                </a>
            </div>
            <div class="footer_redes">
                <a href="https://www.facebook.com/" target="_blank">
                    <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-only-logo-white/facebook@2x.png" width="32" height="32" alt="Facebook" title="Facebook">
                </a>
                <a href="https://twitter.com/" target="_blank">
                    <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-only-logo-white/twitter@2x.png" width="32" height="32" alt="Twitter" title="Twitter">
                </a>
                <a href="https://plus.google.com/" target="_blank">
                    <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-only-logo-white/googleplus@2x.png" width="32" height="32" alt="Google+" title="Google+">
                </a>
                <a href="" target="_blank">
                    <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-only-logo-white/instagram@2x.png" width="32" height="32" alt="Instagram" title="Instagram">
                </a>
                <a href="" target="_blank">
                    <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-only-logo-white/linkedin@2x.png" width="32" height="32" alt="LinkedIn" title="LinkedIn">
                </a>                
            </div>
            <div class="footer_direccion">                  
                <p style="margin: 0; font-size: 12px; text-align: left;">
                    <strong>EducaVerse</strong>
                    <br>EducaVerse Corporation.<br>
                    Durango - Mezquital, 34308 Gabino Santillán, Dgo.
                </p>                
            </div>
        </div>
    </div>
</body>
</html>