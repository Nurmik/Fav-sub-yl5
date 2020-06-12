<?php
$t = filter_input(INPUT_GET, 't', FILTER_SANITIZE_STRING);

switch ($t) {
    case 'topic1':
        $url = 'https://fav.tak17mei.itmajakas.ee';
        $cacheFile = 'cache/topic1.json';
        $cacheTime = 60;
        break;
    case 'topic2':
        $url = 'https://favorite-subject.tak17koost.itmajakas.ee';
        $cacheFile = 'cache/topic2.json';
        $cacheTime = 60;
        break;
    case 'topic3':
        $url = 'https://tak17.janek.itmajakas.ee/code/hajusrakendused/ylesanne5';
        $cacheFile = 'cache/topic3.json';
        $cacheTime = 60;
        break;
    default:
        $url = 'https://tund.tak17nurmberg.itmajakas.ee';
        $cacheFile = 'cache/default.json';
        $cacheTime = 60;
}

if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
    $data = json_decode(file_get_contents($cacheFile));
} else {
    $data = json_decode(file_get_contents($url));

    file_put_contents($cacheFile, json_encode($data));
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SnusMaster</title>
</head>
<body>
<div class="container">
    <div align="right">
        <a href="https://tund.tak17nurmberg.itmajakas.ee/">API</a>
        <a>│</a>
        <a href="https://tund.tak17nurmberg.itmajakas.ee/form.php">Form</a>
    </div>
    <div class="col-4">
        <ul>
            <li><a href="?t=default">Default</a></li>
            <li><a href="?t=topic1">Subject 1</a></li>
            <li><a href="?t=topic2">Subject 2</a></li>
            <li><a href="?t=topic3">Subject 3</a></li>
        </ul>
    </div>
    <div class="col-8">
        <?php if (empty($data)) : ?>
            <div class="alert alert-danger">Data missing!</div>
        <?php else: ?>
            <?php

            echo $data->info->name . " - " . $data->info->description . '<br>';

            foreach ($data->data as $row) { ?>

                <form action="detail.php" method="post">
                    <input type="hidden" id="image" name="image" value="<?php echo $row->image; ?>"/>
                    <input type="hidden" id="title" name="title" value="<?php echo $row->name; ?>"/>
                    <input type="hidden" id="description" name="description" value="<?php echo $row->description; ?>"/>
                    <input type="hidden" id="topic1" name="topic1" value="<?php echo $row->topic1; ?>"/>
                    <input type="hidden" id="topic2" name="topic2" value="<?php echo $row->topic2; ?>"/>
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $row->image; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row->name; ?></h5>
                            <p class="card-text"><?php echo $row->description; ?></p>
                            <button class="btn btn-primary" name="action" value="action">Details</button>
                        </div>
                    </div>
                    <br>
                </form>
            <?php }
            ?>
        <?php endif; ?>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>