<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Carlos Blanco</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"
            integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg=="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

</head>
<style>
    .vertical-center {
        min-height: 100%; /* Fallback for browsers do NOT support vh unit */
        min-height: 100vh; /* These two lines are counted as one :-)       */

        display: flex;
        align-items: center;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.html">CB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="perceptibilidad.html">Perceptibilitat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="operabilitat.html">Operabilitat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="comprensibilitat.html">Comprensibilitat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="robusteza.html">Robustesa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login LDAP</a>
            </li>
        </ul>
    </div>
</nav>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.html">Inici</a></li>
        <li class="breadcrumb-item"><a href="login.php">Login</a></li>
    </ol>
</nav>
<div class="vertical-center">
    <div class="container h-100">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <div class="p-3" style="background-color: aquamarine">
                    <div>
                        <h1>Login</h1>
                    </div>
                    <form id="form1" method="post" action="../controllers/loginController.php">
                        <div class="form-group">
                            <label for="contrasenya">Contrasenya:</label>
                            <input type="password" class="form-control" id="contrasenya" name="contrasenya"
                                   placeholder="contrasenya">
                        </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </form>
                    <?php echo $_SESSION['loginError'];
                    $_SESSION['loginError'] = "";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
