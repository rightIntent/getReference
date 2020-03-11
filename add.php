<?php 
    require './functions.php';

    $events = new Events;

    $category=$_GET['table'];

    $row= $events-> SELECT($category, '')[0];

    array_shift($row);
    array_shift($offer);
    array_shift($student);
    $item=array_keys($row);
    $i=0;
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form  method="post">
            <div class="form-group">
                <?php if($category=='offer'): ?>
                    <?php foreach($row as $keys):  ?>
                    <label for="<?= $offer[$i] ?>"> <b><?= $offer[$i] ?></b></label>
                    <?php if($i==7): ?>
                        <select class="form-control" name="<?=$item[$i]?>" required >
                        <option selected></option>
                        <option value="active">Faoliyat yuritmoqda</option>
                        <option value="passive">Faoliyati yakunlangan</option>
                        </select>
                    <?php else: ?>
                    <?php if($i==6): ?>
                        <input class="form-control" type="date" name="<?=$item[$i] ?>" id="<?= $offer[$i] ?>" >
                    <?php else: ?>
                    <input class="form-control" required <?php if($i==5 or $i==4): ?> type="date" <?php else: ?>type="text" <?php endif; ?> name="<?=$item[$i] ?>" id="<?= $offer[$i] ?>" >
                        <?php endif; ?>
                        <?php endif; ?>
                    <?php $i++; endforeach; ?>
                <?php endif; ?>
                <?php if($category=='student'): ?>
                    <?php foreach($row as $keys):  ?>
                    <label for="<?= $student[$i] ?>"> <b><?= $student[$i] ?></b></label>
                    <?php if($i==11): ?>
                        <select class="form-control" name="<?=$item[$i]?>" required >
                        <option selected></option>
                        <option value="active">Ta'lim olmoqda</option>
                        <option value="passive">Ta'lim yakunlangan</option>
                        </select>
                    <?php else: ?>
                    <?php if($i==10): ?>
                        <input class="form-control" type="date" name="<?=$item[$i] ?>" id="<?= $student[$i] ?>" >
                    <?php else: ?>
                    <input class="form-control" required <?php if($i==9 or $i==8): ?> type="date" <?php else: ?>type="text" <?php endif; ?> name="<?=$item[$i] ?>" id="<?= $student[$i] ?>" >
                        <?php endif; ?>
                        <?php endif; ?>
                    <?php $i++; endforeach; ?>
                <?php endif; ?>
                <div class="d-flex addphp justify-content-between">
                <a href="/edit.php" ><img src="/img/arrow_left.jpg" ></a>
                <button type="submit" class="btn btn-success mt-3 mb-5 pl-4 pr-4">Qo'shish</button>
                </div>
            </div>
        </form>
    </div>
    <?php 
        $pdo = new PDO('mysql:host=localhost;dbname=reference', 'root', '');
        $add="INSERT INTO $category VALUES (NULL,";
        foreach($_POST as $key){
            $add.="'".add_slesh($key)."',";
        }
        $add=substr($add,0,-1);
        $add.=");";
        $queryAdd=$pdo->prepare($add);
        $queryAdd->execute();
    ?>
    <script src="bootstrap-4.4.1-dist/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap-4.4.1-dist/js/popper.js"></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    <script src="/bootstrap-4.4.1-dist/js/script.js"></script>
</body>
</html>