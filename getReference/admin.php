<?php  
        session_start();
        switch ($_POST['login']) {
                case 'offer':
                        $password='offer';
                        if(isset($_POST['password'])){
                                if($_POST['password']==$password){
                                        $_SESSION['block']='on';
                                        $_SESSION['tab_name']='Xodim';
                                        header("Location: edit.php");
                                }
                                else{
                                        $route=$_SESSION['category'];
                                        header("Location: /?route=$route");
                                }
                        }
                break;
                case 'student':
                        $password='student';
                        if(isset($_POST['password'])){
                                if($_POST['password']==$password){
                                        $_SESSION['block']='on';
                                        $_SESSION['tab_name']='Talaba';
                                        header("Location: edit.php");
                                }
                                else{
                                       $route=$_SESSION['category'];
                                       header("Location: /?route=$route");
                                }
                        }
                        break;
               
                
              
        }
?>
