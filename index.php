<?php
require 'Exel.php';
$object = new Exel();
$object->add();
$generation = $object->getGeneration();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Генерация текста</title>
</head>
<body>
<div class="container">
    <h1>Генерация текста</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">{Buy_tags}</th>
            <th scope="col">{tags_2}</th>
            <th scope="col">{tags_3}</th>
            <th scope="col">{Other_tags}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $generation['Buy_tags'];?></td>
            <td><a href="<?php echo $generation['link_tags_2'];?>"> <?php echo $generation['tags_2']?></a></td>
            <td><a href="<?php echo $generation['link_tags_3'];?>"> <?php echo $generation['tags_3']?></a></td>
            <td><?php echo $generation['Other_tags']?></td>
        </tr>
        </tbody>
    </table>
    <button class="btn btn-primary" onClick="window.location.reload();">Обновить</button>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>