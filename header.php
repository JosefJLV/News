<?php
$con=mysqli_connect('localhost','jymaxjgd_anbar','Yusif1996','jymaxjgd_xeberbaza');

if(!isset($taminfo['title']))
{
    $keys = 'Azərbaycan,xəbərsiz,ən son,dünya';
}
else
{
    $x = explode(' ',$taminfo['title']);
    
    for($i=0;$i<count($x); $i++)
    {
        if($i==0)
        {$keys = $x[$i];}
    
    else
    {$keys =$keys.', '.$x[$i];}
        
    }
}

if(!isset($taminfo['text']))
{
    $description = 'Xebersiz.tk - Ölkə gündəmi - Dünyadan xəbərlər';
}
else
{
   $text =  mb_substr($taminfo['text'],0,150);
   $description = $text.'...';
}

if(!isset($taminfo['image']))
{
    $photo = 'https://xebersiz.tk/img/logo.png';
}
else
    {$photo = $taminfo['image'];}
    
if(!isset($taminfo['title']))
{
    $title = 'Ölkə gündəmi və Dünyadan ən son xəbərlər - Xebersiz.tk';
}
else
    {$title = $taminfo['title'];}
    
if(!isset($taminfo['cat']))
{
    $cat = '';
}
else
{
    $cat = $taminfo['cat'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?=$title?></title>
    
        <meta name="keywords" content='<?=$keys?>'/>
        <meta name="description" content="<?=$description?>" />
        
        <meta name="robots" content="index,follow"/>
        <meta name="generator" content="Xebersiz.tk" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <meta property="og:image" content="<?=$photo?>"/>
        <!--<meta property="og:image:secure_url" content="" /> -->
        <meta property="og:image:width" content="640" /> 
        <meta property="og:image:height" content="442" />
    
        <meta property="og:url" content="https://xebersiz.tk/"/>
        <meta property="og:title" content='<?=$title ?>'/>
        <meta property="og:description" content='<?= $description?>'/>
        <meta property="og:site_name" content="Xəbərsiz"/>
        <meta property="og:type" content="article"/>
    
        <meta property="fb:admins" content="Yadullayev"/>
    
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content='<?= $keys ?>'/>
        <meta itemprop="description" content="<?= $description ?>"/>
        <meta itemprop="image" content="<?= $photo?>"/>
        
        <meta property="article:section" content="<?=$title?>" />
        <meta property="article:tag" content="<?=$cat ?>" />
        <meta property="article:published_time" content="<?=$taminfo['tarix']?>" />

    
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>
<div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tb-contact">
                            <p><i class="fas fa-envelope"></i>yyadullayev@gmail.com</p>
                            <p><i class="fas fa-phone-alt"></i>+994 55 462 75 96</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tb-menu">
                            <a href="haqqinda.php">Haqqımızda</a>
                            <a href="">Məxfilik siyasəti</a>
                            <a href="">İstifadəçi qaydaları</a>
                            <a href="contact.php">Əlaqə</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar Start -->
<?php 
     if(isset($_POST['axtar']) && !empty($_POST['query']))
        {
    	$axtar=" AND (title LIKE'%".$_POST['query']."%') ";
    
    	$yoxlama=mysqli_query($con, "SELECT * FROM news WHERE title='".$_POST['query']."'");
    
    		$say=mysqli_num_rows($yoxlama);
    		if($say==0)
    			{echo'<div class="text-center">
    					<div class="alert alert-warning" role="alert" style="font-size:18px">
    							<b>Məlumat tapılmadı!</b>
    					</div>
    				</div>';}
        }
?>
<?php $sec=mysqli_query($con,"SELECT * FROM news ".$axtar." ");?>
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="b-logo">
                            <a href="index.php">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="b-ads">
                            <a href="https://htmlcodex.com">
                                <img src="img/ads-1.jpg" alt="Ads">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="b-search">
                            <form method="post" action="axtar.php">
                            <input type="text" placeholder="Axtar" name="sorgu">
                            <button type="submit" name="axtar"><i class="fa fa-search"></i></button></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>