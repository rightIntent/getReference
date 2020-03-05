<?php 
    session_start();
    require "./functions.php";
    $events = new Events;
?>
<?php if($_SESSION['block']=='on'): ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Admin</title>
            <link rel="stylesheet" href="/bootstrap-4.4.1-dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
        
            <ul class="nav nav-tabs justify-content-between">
                <li class="nav-item">
                    <a class="nav-link active btn-primary" data-toggle="tab" href="#"><?= $_SESSION['tab_name']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  btn-dark"  href="/?route=<?=$_SESSION['category']?>">Chiqish</a>
                </li>
            </ul>

            <div class="active container">
                <div>
                    <form  method="post">
                        <?php if(isset($_POST['name'])){
                            $_SESSION['name'] = $_POST['name']; }
                        ?>
                        <div class="d-flex mt-5">
                            <input type="text" name="name" class="control" placeholder="F.I.Sh" value="<?=$_SESSION['name']?>">
                            <button type="submit" class="btn btn-danger">Qidirish</button>
                            <a href='/add.php?table=<?=$category?>' class="text-right add_people btn btn-success">Qo'shish</a>
                        </div>
                    </form>
                </div>
                <?php if(isset($_POST['name'])){
                $rows = $events->SELECT($category, add_slesh($_POST['name']));}
                // else $rows = $events -> SELECT($category, $_SESSION['name']);
                
                ?>
                <?php if($rows): ?>    
                    <?php if($category=='offer'): ?>
                        <?php $i = 0; ?> 
                        <table class="mt-5">
                            <th>№</th>
                            <th>F.I.SH</th>
                            <th>Ishlayotgan fakultet, kafedra <br> yoki bo’lim nomi</th>
                            <th>Lavozimi</th>
                            <th>Passport seriyasi</th>
                            <th>Kirgan sanasi</th>
                            <th colspan="2">Amallar</th>
                            <?php foreach($rows as $row): $i++; ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <?= $row['fullname'];?>
                                </td> 
                                <td>
                                    <?= $row['faculty'] ?>
                                </td> 
                                <td>
                                    <?= $row['duty'] ?>
                                </td> 
                                <td>
                                    <?= $row['passport']?>
                                </td> 
                                <td>
                                    <?= $row['kirgan_yili'] ?>
                                </td> 
                                <td>
                                    <a href="/select_update.php?pass=<?= $row['id']?>" class="btn btn-warning">Tahrirlash</a>
                                </td>
                                <td>
                                    <a href="/delete.php?pass=<?= $row['id']?>" class="btn btn-danger">O'chirish</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif;?>
                    <?php if($category=='student'): ?>
                        <?php $i = 0; ?> 
                        <table class="mt-5">
                            <th>№</th>
                            <th>F.I.SH</th>
                            <th>Mutaxassisligi</th>
                            <th>Guruh</th>
                            <th>Kursi</th>
                            <th>Passport seriyasi</th>
                            <th>Kirgan sanasi</th>
                            <th colspan="2">Amallar</th>
                            <?php foreach($rows as $row): $i++; ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <?= $row['fullname'];?>
                                </td> 
                                <td>
                                    <?= $row['direction'] ?>
                                </td> 
                                <td>
                                    <?= $row['group'] ?>
                                </td> 
                                <td>
                                    <?= $row['course']?>
                                </td> 
                                <td>
                                    <?= $row['passport']?>
                                </td> 
                                <td>
                                    <?= $row['kirgan_yili'] ?>
                                </td> 
                                <td>
                                    <a href="/select_update.php?pass=<?= $row['id']?>" class="btn btn-warning">Tahrirlash</a>
                                </td>
                                <td>
                                    <a href="/delete.php?pass=<?= $row['id']?>" class="btn btn-danger">O'chirish</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                        <?php endif;?>
                    </div>
                    
            <script src="bootstrap-4.4.1-dist/js/jquery-3.2.1.min.js"></script>
            <script src="bootstrap-4.4.1-dist/js/popper.js"></script>
            <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
        </body>
    </html>   
  
<?php endif;?>   
<?php if(!$_SESSION['block']) : ?>
    <h1><b>Доступ запрещен !</b></h1>
<?php endif; ?>  









  