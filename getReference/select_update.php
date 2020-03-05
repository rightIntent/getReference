<?php 
    session_start();
    require './functions.php';
    $events = new Events;
    $row = $events->SELECT($category,$_GET['pass'])[0]; 
    $keys=array_keys($row);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>O'ZGARTIRISH</title>
</head>
<body>
    <div class="main-arrow-prev">
    <a href="/edit.php" ><img src="/img/arrow_left_red.jpg" ></a>
        <?php if($category=='offer'): ?>
            <form action="/confirm_update.php" method="POST">
            <div class="container d-flex flex-column w-50">
                <?php $i=0; foreach($row as $item): ?>
                    <label for="<?= $i ?>"><b><?= $offer[$i] ?></b></label>
                    <?php if($i==8): ?>
                        <select class="form-control" name="<?= $keys[$i] ?>" id="<?= $i ?>">
                        <?php if($item=='active'): ?>
                        <option value="active" selected>Faoliyat yuritayotgan</option>
                        <option value="passive" >Faoliyati yakunlangan</option>
                        <?php else: ?>
                        <option value="active" >Faoliyat turitayotgan</option>
                        <option value="passive" selected>Faoliyati yakunlangan</option>
                        <?php endif; ?>
                    </select>
                    <?php else:  ?>  
                        <?php if($i==7): ?>
                        <input class="form-control" type="text" name="<?=$keys[$i] ?>" id="<?= $offer[$i] ?>" value="<?= $item ?>" >
                    <?php else: ?> 
                <input  <?php if($i==0): ?> readonly <?php endif; ?> class="form-control" id='<?= $i ?>' name="<?= $keys[$i] ?>" required  value="<?= $item ?>">
                    <?php endif; ?>
                        <?php endif; ?>
                    <?php $i++; endforeach; ?>
                <button type="submit" class="btn btn-success mt-2 mb-5">Tasdiqlash</button>
            </div>
            </form>
        <?php  endif; ?>
        <?php if($category=='student'): ?> 
            <form action="/confirm_update.php" method="POST">
            <div class="container d-flex flex-column w-50">
                <?php $i=0; foreach($row as $item): ?>
                    <label for="<?= $i ?>"><b><?= $student[$i] ?></b></label>
                    <?php if($i==12): ?>
                        <select class="form-control" name="<?= $keys[$i] ?>" id="<?= $i ?>">
                        <?php if($item=='active'): ?>
                        <option value="active" selected>Ta'lim olayotgan</option>
                        <option value="passive" >Ta'limi yakunlangan</option>
                        <?php else: ?>
                        <option value="passive" selected>Ta'lim yakunlangan</option>
                        <option value="active" >Ta'lim olayotgan</option>
                        <?php endif; ?>
                    </select>
                    <?php else:  ?>  
                        <?php if($i==11): ?>
                        <input class="form-control" type="date" name="<?=$item[$i] ?>" id="<?= $offer[$i] ?>" >
                    <?php else: ?> 
                <input  <?php if($i==0): ?> readonly <?php endif; ?> class="form-control" id='<?= $i ?>' name="<?= $keys[$i] ?>" required value="<?= $item ?>">
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php $i++; endforeach; ?>
                <button type="submit" class="btn btn-success mt-2 mb-5">Tasdiqlash</button>
            </div>
            </form>
        <?php  endif; ?>  
    </div>
    


    <script src="bootstrap-4.4.1-dist/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap-4.4.1-dist/js/popper.js"></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    <script src="/bootstrap-4.4.1-dist/js/script.js"></script>
</body>
</html>