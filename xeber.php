<?php 
$con=mysqli_connect('localhost','jymaxjgd_anbar','Yusif1996','jymaxjgd_xeberbaza');

$id = (int)$_GET['id'];
$tamsec = mysqli_query($con,"SELECT * FROM news WHERE id='".$id."' ");
if(mysqli_num_rows($tamsec)>0)
{$taminfo = mysqli_fetch_array($tamsec);}
 
 else
    {echo'<meta http-equiv="refresh" content="0; URL=index.php">';}
?>
<!DOCTYPE html>
<html lang="en">

    <body>
        <!-- Top Bar Start -->
        
        <?php include "header.php"?>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <?php include"menu.php";?>
        <!-- Nav Bar End -->
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Əsas səhifə</a></li>
                    <li class="breadcrumb-item"><a href="#">Xəbər</a></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Single News Start-->
        <div class="single-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="sn-container">
                            <div class="sn-img">
                                <img src="<?=$taminfo['image']?>" />
                            </div>
                            <div class="sn-content">
                                <h1 class="sn-title"><?=$taminfo['title']?></h1>
                                <p><?=$taminfo['text']?></p>
                            </div>
                        </div>
                        <div class="sn-related">
                            <h2>Oxşar xəbərlər</h2>
                            <div class="row sn-slider">
                                
                                <?php
                                    $related= mysqli_query($con,"SELECT * FROM news WHERE cat='".$taminfo['cat']."'");
                                    while($rinfo =  mysqli_fetch_array($related))
                                    {echo'
                                            <div class="col-md-4">
                                                <div class="sn-img">
                                                    <img style= "width: 300 px; height:140px" src="'.$rinfo['image'].'" />
                                                    <div class="sn-title">
                                                        <a href="xeber.php?id='.$rinfo['id'].'">'.$rinfo['title'].'</a>
                                                    </div>
                                                </div>
                                            </div>';}
                                ?>
                               
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2 class="sw-title">Son Xəbərlər</h2>
                                <div class="news-list">
                                    
                                   <?php
                                    $sec= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 0,5");
                                    while($info =  mysqli_fetch_array($sec))
                                    {echo'<div class="nl-item">
                                                <div class="nl-img">
                                                    <img src="'.$info['image'].'" />
                                                </div>
                                                <div class="nl-title">
                                                    <a href="xeber.php?id='.$info['id'].'">'.$info['title'].'</a>
                                                </div>
                                            </div>';}
                                    ?> 
                                </div>
                            </div>
                            
                            <div class="sidebar-widget">
                                <div class="tab-news">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#featured">Önə çıxanlar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                        </li>
                                        
                                    </ul>

                                    <div class="tab-content">
                                        <div id="featured" class="container tab-pane active">
                                            
                                            <?php
                                                $baxilan= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 5,5");
                                                while($binfo =  mysqli_fetch_array($baxilan))
                                                {echo'<div class="tn-news">
                                                            <div class="tn-img">
                                                                <img src="'.$binfo['image'].'" />
                                                            </div>
                                                            <div class="tn-title">
                                                                <a href="xeber.php?id='.$binfo['id'].'">'.$binfo['title'].'</a>
                                                            </div>
                                                        </div>';}
                                            ?>
                                            
                                        </div>
                                        
                                        <div id="popular" class="container tab-pane fade">
                                            
                                        <?php
                                                $popular= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 10,5");
                                                while($pinfo =  mysqli_fetch_array($popular))
                                                {echo'<div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="'.$pinfo['image'].'" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="xeber.php?id='.$pinfo['id'].'">'.$pinfo['title'].'</a>
                                                </div>
                                            </div>';}
                                        ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="sidebar-widget">
                                <h2 class="sw-title">Kateqoriyalar</h2>
                                <div class="category">
                                    <ul>
                            <?php
                            $sec= mysqli_query($con,"SELECT cat FROM news WHERE cat IN('Siyasət','İqtisadiyyat','Cəmiyyət','Dünya') GROUP BY cat");
                            while($info =  mysqli_fetch_array($sec))
                            {echo '<li><a href="cat.php?cat='.$info['cat'].'">'.$info['cat'].'</a><span></span></li>';}
                            ?>
                                        
                                    </ul>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single News End-->        
        
        <!-- Footer Start -->
        <?php include "footer.php"?>
    </body>
</html>
