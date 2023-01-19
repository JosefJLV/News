<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
        <meta content="Bootstrap News Template - Free HTML Templates" name="description">

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

    <body>
        <!-- Top Bar Start -->
        
        <!-- Brand Start -->
        <?php include "header.php";?>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <?php include "menu.php";?>
        <!-- Nav Bar End -->
        <?php
        echo'<div class="text-center"><h3>'.$_POST['sorgu'].'</h3></div>';?>
        <!-- Top News Start-->
        <div class="top-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">
                            
                         <?php
                         
                         $sorgu = mysqli_real_escape_string($con,strip_tags(trim($_POST['sorgu'])));
                            $sec= mysqli_query($con,"SELECT * FROM news WHERE (title LIKE '%".$sorgu."%' OR text LIKE '%".$sorgu."%') ORDER BY id DESC LIMIT 0,2");
                            while($info =  mysqli_fetch_array($sec))
                            {echo'<div class="col-md-6">
                                <div class="tn-img">
                                    <img style= "width: 500 px; height:340px" src="'.$info['image'].'" />
                                    <div class="tn-title">
                                        <a href="xeber.php?id='.$info['id'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                            ?>
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6 tn-right">
                        <div class="row">
                        <?php
                            $sec= mysqli_query($con,"SELECT * FROM news WHERE (title LIKE '%".$sorgu."%' OR text LIKE '%".$sorgu."%') ORDER BY id DESC LIMIT 2,4 ");
                            while($info =  mysqli_fetch_array($sec))
                            {echo '<div class="col-md-6">
                                <div class="tn-img">
                                    <img style= "width: 250 px; height:170px" src="'.$info['image'].'" />
                                    <div class="tn-title">
                                        <a href="xeber.php?id='.$info['id'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                            
                          ?>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top News End-->

        <!-- Category News Start-->
        
        <!-- Category News End-->
        
        <!-- Tab News Start-->
        
        <!-- Tab News Start-->

        <!-- Main News Start-->
        <div class="main-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            
                           <?php                       
                            $sec= mysqli_query($con,"SELECT * FROM news WHERE (title LIKE '%".$sorgu."%' OR text LIKE '%".$sorgu."%') ORDER BY id DESC LIMIT 6,9");
                            while($info =  mysqli_fetch_array($sec))
                            
                             {echo' <div class="col-md-4">
                                <div class="mn-img">
                                    <img style= "width: 300 px; height:170px" src="'.$info['image'].'" />
                                    <div class="mn-title">
                                        <a href="xeber.php?id='.$info['id'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                            ?>
                             
                        </div>
                    </div>


                    <div class="col-lg-3">
                        <div class="mn-list">
                            <h2>Əlavə oxu</h2>
                            <ul>
                            <?php
                            $sec= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 73,7");
                            while($info =  mysqli_fetch_array($sec))
                            {echo'
                                <li><a href="xeber.php?id='.$info['id'].'">'.$info['title'].'</a></li>';}
                            ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main News End-->

        <!-- Footer Start -->
       <?php include "footer.php";?>
    </body>
</html>
