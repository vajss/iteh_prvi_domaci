<html>
<?php require('./head.php') ?>

<body>
    <?php require('./navbar.php') ?>

    <div class="container">


        <div class="d-flex bordered">
            <div class="col">
                Host:
                <select class="form-control" id="selectHost">
                    <option value="default">Izaberite studenta:</option>
                </select>
            </div>
            <div class="col">
                Gost:
                <select class="form-control" id="selectGost">
                    <option value="default">Izaberite studenta:</option>
                </select>
            </div>
        </div>
        <br>
        <form id="noviStudenti" class="bordered">
            <div class="d-flex">
                <div class="col">
                    <label for="ime_host"> Naziv hosta:</label>
                    <input class="form-control" id="ime_host" type="text">
                    
                    <label for="prezime_host"> Prezime:</label>
                    <input class="form-control" id="prezime_host" type="text">

                    <label for="lokalna_grupa_host"> Lokalna grupa:</label>
                    <input class="form-control" id="lokalna_grupa_host" type="text">

                    <label for="godina_studija_host"> Godina studija:</label>
                    <input class="form-control" id="godina_studija_host" type="number" min="0">
                </div>
                <div class="col">
                    <label for="ime_gost"> Naziv gosta:</label>
                    <input class="form-control" id="ime_gost" type="text">

                    <label for="prezime_gost"> Prezime:</label>
                    <input class="form-control" id="prezime_gost" type="text">

                    <label for="lokalna_grupa_gost"> Lokalna grupa:</label>
                    <input class="form-control" id="lokalna_grupa_gost" type="text">

                    <label for="godina_studija_gost"> Godina studija:</label>
                    <input class="form-control" id="godina_studija_gost" type="number" min="0">

                    <label for="naziv_dogadjaja"> Događaj na koji dolazi:</label>
                    <input class="form-control" id="naziv_dogadjaja" type="text">

                    <label for="broj_dana_boravka"> Trajanje dogadjaja:</label>
                    <input class="form-control" id="broj_dana_boravka" type="text">
                </div>
            </div>
            <br>
            <div class="d-flex">
                <input class="form-control btn btn-success" type="submit">
            </div>
        </form>
    </div>


    <?php require('./scripts.php') ?>
    <script src="./js/create-putovanje.js"></script>
</body>

</html>