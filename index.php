<?php
require 'Exel.php';
$object = new Exel();
$Buy_tags = $object->Buy_tag();
$tags_2 = $object->Tags_2();
$tags_3 = $object->Tags_3();
$Other_tags = $object->Other_tags();
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
            <td><?php echo $Buy_tags['text']?></td>
            <td><a href="<?php echo $tags_2['link'];?>"> <?php echo $tags_2['text']?></a></td>
            <td><a href="<?php echo $tags_3['link'];?>"> <?php echo $tags_3['text']?></a></td>
            <td><?php echo $Other_tags['text']?></td>
        </tr>
        </tbody>
    </table>
    <button class="btn btn-primary" onClick="window.location.reload();">Обновить</button>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>