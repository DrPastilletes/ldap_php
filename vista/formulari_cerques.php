<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form - Carlos Blanco</title>
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
<body>
<div class="p-5 container mt-5" style="background-color: aquamarine">
    <h1>Cerca</h1>
    <?php echo $_SESSION['filtre'];
    unset($_SESSION['filtre']); ?>
    <form id="form_ldap">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="cognoms">Cognoms</label>
            <input type="text" class="form-control" id="cognoms" name="cognoms" placeholder="Cognoms">
        </div>
        <div class="form-group">
            <label for="telefon_fix">Telefon Fix</label>
            <input type="tel" class="form-control" id="telefon_fix" name="telefon" placeholder="Telefon Fix">
        </div>
        <div class="form-group">
            <label for="mobil">Telefon Mòbil</label>
            <input type="tel" class="form-control" id="mobil" name="mobil" placeholder="Telefon Mòbil">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="institut-organització">Institut / Organització</label>
            <input type="text" class="form-control" id="institut-organització" placeholder="Institut / Organització">
        </div>
        <div class="form-group">
            <label for="username">Nom d'usuari</label>
            <input type="email" class="form-control" id="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="grup">Grup</label>
            <select class="custom-select" name="grups" id="grup">
                <option value="*">Tots</option>
                <option value="2000">Professors</option>
                <option value="3000">Alumnes</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
</div>
<div class="container">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nom_d’usuari</th>
            <th scope="col">Cognoms</th>
            <th scope="col" colspan="2">Telèfons (inclou fix i mobil)</th>
            <th scope="col">email</th>
            <th>Institut</th>
            <th>Grup</th>
        </tr>
        </thead>
        <br><br>
        <tbody>
        <?php foreach ($_SESSION['resultats'] as $key => $item){ ?>
        <tr>
            <td><?= $item['cn'][0] ?></td>
            <td><?= $item['sn'][0] ?></td>
            <td><?= $item['telephonenumber'][0] ?></td>
            <td><?= $item['mobile'][0] ?></td>
            <td><?= $item['mail'][0] ?></td>
            <td><?= $item['o'][0] ?></td>
            <td><?= $item['cn'][0] ?></td>
        <tr>
            <?php } ?>


        </tbody>
    </table>
</div>

<script>
    $('#form_ldap').validate({
        rules: {
            telefon: {
                validacioTel: true
            },
            mobil: {
                validacioMobil: true
            },
            email: {
                email: true
            }
        },
        messages: {
            telefon: {
                validacioTel: 'CB - El telefon fix no te un format correcte'
            },
            mobil: {
                validacioMobil: 'CB - El telefon mobil no te un format correcte'
            },
            email: {
                email: 'CB - El email no te un format correcte'
            }
        }
    });
    $.validator.addMethod("validacioTel", function (value, element, params) {
        return /^(\+34|0034|34)?[89]\d{8}$/.test(value);
    });
    $.validator.addMethod("validacioMobil", function (value, element, params) {
        return /^[679]{1}[0-9]{8}$/.test(value);
    });
</script>

</body>
</html>