<html>
<?php require('./head.php') ?>

<body>
    <?php require('./navbar.php') ?>

    <div class="container">
        <h3>Studenti:</h3>
        <table class="table table-info">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Lokalna grupa</th>
                    <th>Godina studija</th>
                </tr>
            </thead>
            <tbody id="prikazTabele">

            </tbody>
        </table>
    </div>

    <?php require('./scripts.php') ?>
    <script src="./js/tabela.js"></script>
</body>

</html>