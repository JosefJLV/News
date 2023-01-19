<!DOCTYPE html>
<html lang="en">

    <body>
        <!-- Top Bar Start -->
        
        <!-- Brand Start -->
        <?php include "header.php";?>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <?php include "menu.php";?>
        <!-- Nav Bar End -->

        <!-- Top News Start-->
        <div class="top-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">
                            
                         <?php
                            $sec= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 0,2");
                            while($info =  mysqli_fetch_array($sec))
                            {echo'<div class="col-md-6">
                                <div class="tn-img">
                                    <img style= "width: 500 px; height:340px" src="'.$info['image'].'" alt="'.$info['title'].'" />
                                    <div class="tn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                            ?>
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6 tn-right">
                        <div class="row">
                        <?php
                            $sec= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 2,4 ");
                            while($info =  mysqli_fetch_array($sec))
                            {echo '<div class="col-md-6">
                                <div class="tn-img">
                                    <img style= "width: 250 px; height:170px" src="'.$info['image'].'" alt="'.$info['title'].'" />
                                    <div class="tn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
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
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Siyasət</h2>
                        <div class="row cn-slider">
                            <?php
                            $sec= mysqli_query($con,"SELECT * FROM news WHERE cat='Siyasət' ORDER BY id DESC LIMIT 6,3");
                            while($info =  mysqli_fetch_array($sec))
                            {echo'
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img style= "width: 500 px; height:170px" src="'.$info['image'].'" alt="'.$info['title'].'"/>
                                    <div class="cn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                            ?>
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <h2>İqtisadiyyat</h2>
                        <div class="row cn-slider">
                            <?php
                            $sec= mysqli_query($con,"SELECT * FROM news WHERE cat='İqtisadiyyat' ORDER BY id DESC LIMIT 9,3");
                            while($info =  mysqli_fetch_array($sec))
                            {echo'
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img style= "width: 500 px; height:170px" src="'.$info['image'].'" alt="'.$info['title'].'" />
                                    <div class="cn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category News End-->

        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>İdman</h2>
                        <div class="row cn-slider">
                            <?php
                            $sec= mysqli_query($con,"SELECT * FROM news WHERE cat='İdman' ORDER BY id DESC LIMIT 12,3");
                            while($info =  mysqli_fetch_array($sec))
                            {echo'
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img style= "width: 500 px; height:170px" src="'.$info['image'].'" alt="'.$info['title'].'" />
                                    <div class="cn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                            ?>   
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Cəmiyyət</h2>
                        <div class="row cn-slider">
                           <?php
                            $sec= mysqli_query($con,"SELECT * FROM news WHERE cat='Cəmiyyət' ORDER BY id DESC LIMIT 15,3");
                            while($info =  mysqli_fetch_array($sec))
                            {echo' 
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img style= "width: 500 px; height:170px" src="'.$info['image'].'" alt="'.$info['title'].'" />
                                    <div class="cn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category News End-->
        
        <!-- Tab News Start-->
        <div class="tab-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#featured">Önə çıxanlar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#popular">Məşhur xəbərlər</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#latest">Ən yeni xəbərlər</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="featured" class="container tab-pane active">
                               <?php
                            $sec= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 18,3");
                            while($info =  mysqli_fetch_array($sec))
                            {echo' 
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img style= "width: 300 px; height:100px" src="'.$info['image'].'" alt="'.$info['title'].'"/>
                                    </div>
                                    <div class="tn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
                                    </div>
                                </div>';}
                                ?>
                                
                                
                            </div>
                            <div id="popular" class="container tab-pane fade">
                            <?php
                            $sec= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 49,3");
                            while($info =  mysqli_fetch_array($sec))
                            {echo'
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img style= "width: 300 px; height:100px" src="'.$info['image'].'" alt="'.$info['title'].'" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
                                    </div>
                                </div>';}
                                
                            ?> 
                            </div>
                            <div id="latest" class="container tab-pane fade">
                            <?php
                            $sec= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 52,3");
                            while($info =  mysqli_fetch_array($sec))
                            {echo'    
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img style= "width: 300 px; height:100px" src="'.$info['image'].'" alt="'.$info['title'].'" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
                                    </div>
                                </div>';}
                            ?>                                
                                
                            </div>
                            
                        </div>
                    </div>
                    
                   <div class="col-md-6">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#m-viewed">Ən çox baxılan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#m-read">Ən çox oxunan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#m-recent">Ən yeni</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="m-viewed" class="container tab-pane active">
                            <?php
                            $sec= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 55,3");
                            while($info =  mysqli_fetch_array($sec))
                            {echo'
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img style= "width: 300 px; height:100px" src="'.$info['image'].'" alt="'.$info['title'].'" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
                                    </div>
                                </div>';}
                            ?>
                                
                            </div>
                            <div id="m-read" class="container tab-pane fade">
                            <?php
                            $sec= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 58,3");
                            while($info =  mysqli_fetch_array($sec))
                            {echo' 
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img style= "width: 300 px; height:100px" src="'.$info['image'].'" alt="'.$info['title'].'" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
                                    </div>
                                </div>';}
                                
                            ?> 
                                
                                
                            </div>
                            <div id="m-recent" class="container tab-pane fade">
                                
                                <?php
                            $sec= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 61,3");
                            while($info =  mysqli_fetch_array($sec))
                            {echo'
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img style= "width: 300 px; height:100px" src="'.$info['image'].'" alt="'.$info['title'].'" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
                                    </div>
                                </div>';}
                                ?>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab News Start-->

        <!-- Main News Start-->
        <div class="main-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            
                           <?php
                            $sec= mysqli_query($con,"SELECT * FROM news ORDER BY id DESC LIMIT 64,9");
                            while($info =  mysqli_fetch_array($sec))
                            {echo' <div class="col-md-4">
                                <div class="mn-img">
                                    <img style= "width: 500 px; height:170px" src="'.$info['image'].'" alt="'.$info['title'].'" />
                                    <div class="mn-title">
                                        <a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a>
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
                                <li><a href="xeber.php?id='.$info['id'].'" title="'.$info['title'].'">'.$info['title'].'</a></li>';}
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
