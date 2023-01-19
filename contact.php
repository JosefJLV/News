<?php
session_start();
$con=mysqli_connect('localhost','jymaxjgd_anbar','Yusif1996','jymaxjgd_xeberbaza');

$yaranma=date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">

    <body>
        <!-- Top Bar Start -->
        <?php include "header.php";?>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <? include "menu.php";?>
        <!-- Nav Bar End -->
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Baş səhifə</a></li>
                    <li class="breadcrumb-item active">Əlaqə</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <?php
            if(isset($_POST['gonder']))
                {
                    
                    if($_SESSION['token']==$_POST['token'])
                    
                    { 
                           $ad = mysqli_real_escape_string($con,trim(htmlspecialchars(strip_tags($_POST['ad']))));
                        $email = mysqli_real_escape_string($con,trim(htmlspecialchars(strip_tags($_POST['email']))));
                        $basliq = mysqli_real_escape_string($con,trim(htmlspecialchars(strip_tags($_POST['basliq']))));
                        $mesaj = mysqli_real_escape_string($con,trim(htmlspecialchars(strip_tags($_POST['mesaj']))));
                        
                        $gonder = mysqli_query($con, "INSERT INTO mesajlar(ad,email,basliq,mesaj,tarix) 
                        VALUES('".$ad."','".$email."','".$basliq."','".$mesaj."','".$yaranma."')");
                        if($gonder == true)
                        {
                            echo'<div class="container">
                                    <div class="text-center">
                                        <div class="alert alert-info" role="alert">
                                            Mesajınız göndərildi
                                        </div>
                                    </div>
                                </div>';
                        }
                        else
                        {echo'Gonderilmedi';}
                       
                    }
                }
                
                
        $_SESSION['token'] = md5(time());
        
        ?>
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="contact-form">
                            <form method="post">
                                
                                <input type="hidden" name="token" value="<?=$_SESSION['token'] ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input required type="text" class="form-control" name="ad" placeholder="Ad/Soyad" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input required type="email" class="form-control" name="email" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input required type="text" class="form-control" name="basliq" placeholder="Başlıq" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="mesaj" placeholder="Mesaj" required></textarea>
                                </div>
                                <div><button class="btn" type="submit" name="gonder">Göndər</button></div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h3>Bizimlə əlaqə</h3>
                            <p class="mb-4">Bizimlə əlaqə saxlamaq üçün aşağıdakı məlumatlardan istifadə edə bilərsiniz: 
                            <h4><i class="fa fa-map-marker"></i>Bakı,Azərbaycan</h4>
                            <h4><i class="fa fa-envelope"></i>yyadullayev@gmail.com</h4>
                            <h4><i class="fa fa-phone"></i>+994 55 462 75 96</h4>
                            <div class="social">
                                <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        
        <!-- Footer Start -->
        <?php include "footer.php";?>
    </body>
</html>
