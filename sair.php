<?php
// Iniciar a sessão
session_start();

// Apagar todas as variáveis de sessão
$_SESSION = array();

// Se for desejado, destruir a sessão completamente
// Note que isso irá destruir a sessão, e não apenas os dados da sessão!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Por fim, destruir a sessão
session_destroy();

header('location: index.php');
