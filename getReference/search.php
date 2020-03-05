
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style_add.css">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
    <?php 
        require './functions.php';
        $events = new Events;
        unset($_SESSION['block']);
        $_SESSION['category']=$_GET['route'];
        $category=explode('_',$_GET['route'])[0];
    ?>
    <section class="main_search" style="background-image: url('./img/2.jpg');">
        <!-- Admin -->
        <div class="btn-customize">
            <div class="prev">
                <a href="/index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
            <div class="btn-group dropleft">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Admin <i class="fa fa-lock" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu ">
                    <form action="/admin.php" method="POST" class="px-4 py-3">
                        <div class="form-group">
                            <label for="exampleDropdownFormEmail1">Login</label>
                            <input type="text" name="login" readonly value="<?= $category ?>" class="form-control" id="exampleDropdownFormEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleDropdownFormPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Kirish</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Admin -->

        <div class="container ">
                        <!--                 qidiruv bo'limi                            * -->
            <div class="find pt-5"> 
                    <form  action="./dom/index.php?route=<?= $_GET['route'] ?>" method="POST">
                        <p>Passport seriya raqami</p>
                        <div class="insert">
                        <input type="text" name="search" autofocus class="search mr-1" value="<?=strip_tags($_POST['search'])?>"
                            placeholder=" AA7775588" required>
                            <button type="submit" class="btn btn-success">Ma'lumotnoma olish</button></div>
                    </form>
                    <?php 
                        if($_GET['alert']){
                            echo "<div class='alert alert-danger' role='alert'>
                                    Ma'lumot xato kiritildi yoki ushbu passport raqami bazada mavjud emas
                                  </div>";
                        }
                    ?>
            </div> 
        </div>            
    </section>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap-4.4.1-dist/js/popper.js"></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>