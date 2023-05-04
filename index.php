<?php
// DATA

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

// GET REQUEST
if (isset($_GET['want-park'])) {
    $want_park = $_GET['want-park'];
    echo $want_park;
};



var_dump($hotels);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <form action="index.php" method="GET">
        <label for="want-park">Parcheggio</label>
        <select class="p-1" name="want-park" id="want-park">
            <option value="">Scegli..</option>
            <option value="true">Si</option>
        </select>
        <button class="btn btn-success" type="submit">Filtra</button>
        <button class="btn btn-danger" type="reset">Elimina</button>

    </form>

    <!-- DATA TABLE -->
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Nome</th>
                <th scope="col">Voto</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Distanza dal centro</th>
            </tr>
        </thead>

        <!-- body -->
        <tbody>
            <!-- DEFAULT TABLE -->
            <?php
            if (!isset($_GET['want-park']) || $want_park === "") {
                foreach ($hotels as $index => $hotel) { ?>
                    <tr>
                        <th scope="row"><?php echo $index + 1; ?></th>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>

                        <!-- parking -->
                        <td><?php if ($hotel['parking']) {
                                echo "Si";
                            } else {
                                echo "No";
                            }; ?></td>
                        <!-- /parking -->

                        <td><?php echo $hotel['distance_to_center']; ?> Km</td>
                    </tr>
                <?php }
            } else { ?>
                <!-- /DEFAULT TABLE -->

                <!-- PARKING FILTRED TABLE -->
                <?php
                foreach ($hotels as $index => $hotel) {
                    if ($hotel['parking']) { ?>
                        <tr>
                            <th scope="row"><?php echo $index + 1; ?></th>
                            <td><?php echo $hotel['name']; ?></td>
                            <td><?php echo $hotel['vote']; ?></td>
                            <td><?php echo $hotel['description']; ?></td>

                            <!-- parking -->
                            <td><?php if ($hotel['parking']) {
                                    echo "Si";
                                } else {
                                    echo "No";
                                }; ?></td>
                            <!-- /parking -->

                            <td><?php echo $hotel['distance_to_center']; ?> Km</td>
                        </tr>
            <?php }
                }
            } ?>
            <!-- /PARKING FILTRED TABLE -->

        </tbody>
        <!-- /body -->
    </table>
    <!-- /DATA TABLE -->

</body>

</html>