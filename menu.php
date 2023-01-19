<?php   
$con=mysqli_connect('localhost','jymaxjgd_anbar','Yusif1996','jymaxjgd_xeberbaza');
?>
<div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link active"><b>Əsas səhifə</b></a>
                            
                            <?php
                            $sec= mysqli_query($con,"SELECT cat FROM news WHERE cat IN('Maraqlı','Siyasət','İqtisadiyyat','Cəmiyyət','Dünya') GROUP BY cat");
                            while($info =  mysqli_fetch_array($sec))
                            {echo '<a href="cat.php?cat='.$info['cat'].'" class="nav-item nav-link"><b>'.$info['cat'].'</b></a>';}
                            ?>
                            
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><b>Digər</b></a>
                                <div class="dropdown-menu">
                            <?php
                            $sec= mysqli_query($con,"SELECT cat FROM news WHERE cat NOT IN('Siyasət','İqtisadiyyat','Cəmiyyət','Dünya','Maraqlı') GROUP BY cat");
                            while($info =  mysqli_fetch_array($sec))
                            {echo '    
                                    <a href="cat.php?cat='.$info['cat'].'" class="dropdown-item"><b>'.$info['cat'].'</b></a>';}
                            ?>
                                    
                                </div>
                            </div>
                        
                        </div>
                        <div class="social ml-auto">
                            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>