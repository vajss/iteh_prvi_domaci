<html>
<?php require('./head.php') ?>

<body>
    <?php require('./navbar.php') ?>

    <div class="container">
        <h3>Sva putovanja:</h3>
        <table class="table table-info">
            <thead class="thead-dark">
                <tr>
                    <th>Datum</th>
                    <th>Host</th>
                    <th>Gost</th>
                    <th>Trajanje dogadjaja</th>
                    <th>Naziv dogadja</th>
                    <th>Brisanje putovanja</th>
                </tr>
            </thead>
            <tbody id="prikazPutovanje">

            </tbody>
        </table>
    </div>


    <?php require('./scripts.php') ?>
    <script src="./js/index.js"></script>
</body>

</html>