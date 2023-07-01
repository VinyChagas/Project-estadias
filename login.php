<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Link CDN Script -->
    <script src="https://kit.fontawesome.com/8533c91442.js" crossorigin="anonymous" crossorigin="anonymous"></script>
    <!-- Link Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <!--Link File CSS  -->
    <link rel="stylesheet" href="css/login.css">

    <title>Proximo - Refugio</title>
</head>

<body>
    <div class="refugioForm">
        <div class="refugioLogin">
            <div class="headerLogin">
                <grid>
                    <img style="position: absolute; top: -160px;" width="250px" src="img/logo/loginbranco.png" alt="">
                    <h1>Proximo Refugio</h1>
                </grid>
                <div class="formDiv">
                    <!-- Bagian Form Login -->
                    <form method="POST" action="acesso.php">
                        <input type="text" name="email" class="userName inputText" placeholder="seuemail@host.com" required /> <i class="fa-solid fa-user"></i> <br>
                        <input name="password" type="password" class="userPass inputText" placeholder="sua senha" required /> <i class="fa-solid fa-lock"></i><br>
                        <input type="submit" id="submitBtn" value="Login">
                    </form>
                </div>
                <!-- navigasi register  -->
                <p>Não tem uma conta? <a href="#daftar">Criar !</a></p>
            </div>
        </div>
    </div>
</body>

</html>