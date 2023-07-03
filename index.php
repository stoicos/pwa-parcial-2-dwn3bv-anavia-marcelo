<?PHP
//valido secciones por seguridad
$seccionesValidas = [
    "inicio" => [
        "titulo" => "Inicio"
    ],
    "muestras" => [
        "titulo" => "Muestras"
    ],
    "equipo" => [
      "titulo" => "Equipo"
    ],
    "contacto" => [
      "titulo" => "Contacto"
    ],
    "valorar" => [
        "titulo" => "Valorar"
    ]
];
//null coalesce como salvaguardas
$seccion = $_GET['sec'] ?? "inicio";
//aplico la seccion a la url
if(!array_key_exists($seccion, $seccionesValidas)){
    $vista = "404";
}else{
    $vista = $seccion;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="manifest" href="manifest.json">
</head>
<body>
    <p id="token"></p>
<div class="container">
    <header>
        <nav>
            <h1><a href="index.php?sec=inicio">Mis <span class="hand-font">Brownies</span></a></h1>
            <div>
                <ul class="menu-container">
                    <li><a href="index.php?sec=inicio">Inicio</a></li>
                    <li><a href="index.php?sec=muestras">Muestras</a></li>
                    <li><a href="index.php?sec=equipo">Equipo</a></li>
                    <li><a href="index.php?sec=contacto">Contacto</a></li>
                    <li class="btn-install"><a class="boton" onclick="instalarAplicacion()">Instalar</a></li>
                </ul>
            </div>
            <div class="menu-icon">
                <a href="#">MENU</a>
            </div>
        </nav>
    </header>  
    <main>
        <?PHP
            require_once file_exists("views/$vista.php") ? "views/$vista.php" : "views/404.php";
        ?>
    <div class="container-separator">
        <div class="line"></div><div class="separator"><span class="hand-font">Mis Brownies</span></div><div class="line"></div>
    </div>
    </main> 

    <footer>
        <p>Marcelo Anavia - PWA</p>
    </footer>
</div>
<script src="index.js"></script>
<script type="module">
  // Le digo al servicio de google que me configure las cosas que necesito para trabajar con messagin
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.23.0/firebase-app.js";
  import { getMessaging, getToken } from "https://www.gstatic.com/firebasejs/9.23.0/firebase-messaging.js";

  // Configuración de servicio
  const firebaseConfig = {
    apiKey: "AIzaSyBvoPNyKvFbeT45FSjnN3yRcljX2qz-7tQ",
    authDomain: "mis-brownies.firebaseapp.com",
    projectId: "mis-brownies",
    storageBucket: "mis-brownies.appspot.com",
    messagingSenderId: "902119157883",
    appId: "1:902119157883:web:052fa649d11575cefff2de"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const messaging = getMessaging(app);

  // Configuración básica
  function initializeFirebaseMessaging() {
    Notification.requestPermission()
        .then(function() {
            console.log("Notification permission granted");
            return getToken(messaging, {vapidKey: 'AAAA0gp98Hs:APA91bED92StENK22UbYnhbchU0-jYBmE_9Xk7NNjKYYDiuZqy0ca0tMrApM1NoXqktpyPwUKQHwa0tvAyXsDOfHofBxd3q1Cnrf9Sy4BltOosOJ6QkrDcRiaAsyKFk22D7hAusWUBdD'});
        })
        .then(function(token) {
            console.log("Token:" + token);
            document.getElementById("token").innerHTML = token;
        })
        .catch(function(err) {
            console.log("Unable to get permission to notify.", err);
        })
  };

  initializeFirebaseMessaging();
</script>
</body>
</html>