<?php
    require './functions.php';
    $events = new Events;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./control-front.css">
    <link rel="stylesheet" href="style.css">
    <title>Refence-control</title>
</head>

<body>
    <section class="main_search" style="background-image: url('/img/2.jpg');">
        <div class="prev">
                    <a href="/index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
            <div class="find pt-5"> 
                    <form method="POST">
                        <p>Ma'lumotnomaning ID raqamini kiriting</p>
                        <div class="insert">
                        <input type="text" name="control" class="search mr-1" value="<?=$_SESSION['search']?>"
                            placeholder=" 100115" required>
                            <button type="submit" class="btn btn-success">Tekshirish</button></div>
                    </form>
            </div>
            <?php 
            if(isset($_POST['control'])){
                $token_id = strip_tags(($_POST['control']));
                $row = $events -> SELECTJOIN($token_id);
            }
            ?>
            <?php if($row): ?>
            <form action=''>
                <div class='informationForm'>
                    <div class='head'>
                        <div class='image'>
                            <img src='../img/dom_logo.png' width='100%'>
                        </div>
                    </div>
                    <div class='section'>
                        ID: <b><?= $row['token_id']; ?></b><br>
                        Sana: <b><?= $row['date']; ?></b>
                    </div> 
                    <?php
                        switch ($row['typeref']) {
                            case 'student_active': ?> 
                                <div class='body'>
                                    <div class='title'>Talaba <b><?= $row['fullname'] ?>ning</b> o'qishi haqida ma'lumotnoma</div>
                                    <hr>
                                    <div class='inform-body'>
                                        Sizga shuni ma'lum qilamizki, yuqorida qayd etib o'tilgan talaba Toshkent davlat iqtisodiyot universiteti talabasi ekanligini tasdiqlaymiz. Shuningdek, quyida ushbu talaba haqida qo'shimcha ma'lumotlar keltirib o'tilgan:
                                        <div class='additional'>
                                            <table>
                                                <tr><td>Talabaning FISH:</td>       <td><b><?= $row['fullname'] ?></b></td> </tr>                                
                                                <tr><td>Pasport raqami:</td>        <td><b><?= $row['passport'] ?></b></td> </tr>                   
                                                <tr><td>Darajasi:</td>              <td><b><?= $row['degree'] ?></b></td> </tr>                         
                                                <tr><td>Ta'lim turi:</td>           <td><b><?= $row['price'] ?></b></td> </tr>                              
                                                <tr><td>Kursi:</td>                 <td><b><?= $row['course'] ?></b></td> </tr>                             
                                                <tr><td>O'qishga kirgan yili:</td>  <td><b><?= $row['kirgan_yili'] ?></b></td> </tr>                   
                                                <tr><td>Mutaxassisligi:</td>        <td><b><?= $row['direction'] ?></b></td> </tr>     
                                            </table>
                                        </div>
                                    </div>
                                </div>
                    <?php   break;
                            case 'student_passive': ?>  
                                <div class='body'>
                                    <div class='title'><b><?= $row['fullname'] ?></b>ning o'qiganligi haqida ma'lumotnoma</div>
                                    <hr>
                                    <div class='inform-body'>
                                        Sizga shuni ma'lum qilamizki, yuqorida qayd etib o'tilgan shaxs Toshkent davlat iqtisodiyot universitetining  talabasi bo'lganligini tasdiqlaymiz. Shuningdek, quyida ushbu talaba haqida qo'shimcha ma'lumotlar keltirib o'tilgan:
                                        <div class='additional'>
                                            <table>
                                                <tr><td>Talabaning FISH:</td>       <td><b><?= $row['fullname'] ?></b></td> </tr>                                
                                                <tr><td>Pasport raqami:</td>        <td><b><?= $row['passport'] ?></b></td> </tr>                   
                                                <tr><td>Darajasi:</td>              <td><b><?= $row['degree'] ?></b></td> </tr>                           
                                                <tr><td>O'qishga kirgan yili:</td>  <td><b><?= $row['kirgan_yili'] ?></b></td> </tr>                   
                                                <tr><td>Bitirgan yili:</td>         <td><b><?= $row['ketgan_yili'] ?></b></td> </tr>                   
                                                <tr><td>Mutaxassisligi:</td>        <td><b><?= $row['direction'] ?></b></td> </tr>     
                                            </table>
                                        </div>
                                    </div>
                                </div>";
                    <?php   break;
                            case 'offer_active': ?>
                                <div class='body'>
                                    <div class='title'><b><?= $row['fullname'] ?></b>ning ishlashi haqida ma'lumotnoma</div>
                                    <hr>
                                    <div class='inform-body'>
                                        Sizga shuni ma'lum qilamizki, yuqorida qayd etib o'tilgan shaxs Toshkent davlat iqtisodiyot universiteti xodimi ekanligini tasdiqlaymiz. Shuningdek, quyida ushbu xodim haqida qo'shimcha ma'lumotlar keltirib o'tilgan:
                                        <div class='additional'>
                                            <table>
                                                <tr><td>Xodimning FISH:</td>       <td><b><?= $row['fullname'] ?></b></td> </tr>                                
                                                <tr><td>Pasport raqami:</td>        <td><b><?= $row['passport'] ?></b></td> </tr>                   
                                                <tr><td>Faoliyat yuritayotgan kafedra, fakultet yoki bo'limning nomi:</td>              <td><b><?= $row['faculty'] ?></b></td> </tr>                           
                                                <tr><td>Lavozimi:</td>        <td><b><?= $row['duty'] ?></b></td> </tr>                   
                                                <tr><td>Ish boshlagan sanasi:</td>        <td><b><?= $row['kirgan_yili'] ?></b></td> </tr>  
                                            </table>
                                        </div>
                                    </div>
                                </div>
                    <?php   break;
                            case 'offer_passive': ?>
                                <div class='body'>
                                    <div class='title'><?= $row['fullname'] ?>ning ishlaganligi haqida ma'lumotnoma</div>
                                    <hr>
                                    <div class='inform-body'>
                                        Sizga shuni ma'lum qilamizki, yuqorida qayd etib o'tilgan shaxs Toshkent davlat iqtisodiyot universiteti xodimi bo'lganligini tasdiqlaymiz. Shuningdek, quyida ushbu xodim haqida qo'shimcha ma'lumotlar keltirib o'tilgan:
                                        <table>
                                            <tr><td>Xodimning FISH:</td>       <td><b><?= $row['fullname'] ?></b></td> </tr>                                
                                            <tr><td>Pasport raqami:</td>        <td><b><?= $row['passport'] ?></b></td> </tr>                   
                                            <tr><td>Faoliyat yuritayotgan kafedra, fakultet yoki bo'limning nomi:</td>              <td><b><?= $row['faculty'] ?></b></td> </tr>                           
                                            <tr><td>Lavozimi:</td>        <td><b><?= $row['duty'] ?></b></td> </tr>                   
                                            <tr><td>Ish boshlagan sanasi:</td>        <td><b><?= $row['kirgan_yili'] ?></b></td> </tr>  
                                            <tr><td>Ishni yakunlagan sanasi:</td>        <td><b><?= $row['ketgan_yili'] ?></b></td> </tr>  
                                        </table> 
                                        </div>
                                    </div>
                                </div>
                    <?php   break;
                            case 'student_active_026': ?> 
                                <div class='body'>
                                    <div class='title'><b><?= $row['fullname'] ;?></b>ning o'qishi haqida ma'lumotnoma <b>(forma-26)</b></div>
                                    <hr>
                                    <div class='inform-body'>
                                            Sizga shuni ma'lum qilamizki, yuqorida qayd etib o'tilgan talaba Toshkent davlat iqtisodiyot universiteti talabasi ekanligini tasdiqlaymiz. Shuningdek, quyida ushbu talaba haqida qo'shimcha ma'lumotlar keltirib o'tilgan:
                                        <div class='additional'>
                                            <table>
                                                <tr><td>Talabaning FISH:</td>       <td><b><?= $row['fullname'] ?></b></td> </tr>                                
                                                <tr><td>Pasport raqami:</td>        <td><b><?= $row['passport'] ?></b></td> </tr>                   
                                                <tr><td>Mutaxassisligi:</td>        <td><b><?= $row['direction'] ?></b></td> </tr>                           
                                                <tr><td>Kursi:</td>                 <td><b><?= $row['course'] ?></b></td> </tr>                   
                                                <tr><td>Tug'ilgan sanasi:</td>      <td><b><?= $row['born'] ?></b></td> </tr>                   
                                                <tr><td>Kirgan yili:</td>           <td><b><?= $row['kirgan_yili'] ?></b></td> </tr>     
                                            </table>
                                        </div>
                                </div>
                    <?php   break;
                            case 'student_active_028': ?>
                                <div class='body'>
                                    <div class='title'><b><?= $row['fullname'] ?></b>ning o'qishi haqida ma'lumotnoma <b>(forma-28)</b></div>
                                    <hr>
                                    <div class='inform-body'>
                                        Sizga shuni ma'lum qilamizki, yuqorida qayd etib o'tilgan talaba Toshkent davlat iqtisodiyot universiteti talabasi ekanligini tasdiqlaymiz. Shuningdek, quyida ushbu talaba haqida qo'shimcha ma'lumotlar keltirib o'tilgan:
                                        <div class='additional'>
                                            <table>
                                                <tr><td>Talabaning FISH:</td>       <td><b><?= $row['fullname'] ?></b></td> </tr>                                
                                                <tr><td>Pasport raqami:</td>        <td><b><?= $row['passport'] ?></b></td> </tr>                   
                                                <tr><td>Mutaxassisligi:</td>        <td><b><?= $row['direction'] ?></b></td> </tr>                         
                                                <tr><td>Kursi:</td>                 <td><b><?= $row['course'] ?></b></td> </tr>                             
                                                <tr><td>Ta'lim asosi:</td>          <td><b><?= $row['price'] ?></b></td> </tr>                              
                                                <tr><td>Tug'ilgan sanasi:</td>      <td><b><?= $row['born'] ?></b></td> </tr>                   
                                                <tr><td>Kirgan yili:</td>           <td><b><?= $row['kirgan_yili'] ?></b></td> </tr>     
                                            </table>
                                        </div>
                                    </div>
                                </div>
                    <?php   break;
                        }
            endif; ?>         
    </section>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap-4.4.1-dist/js/popper.js"></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>