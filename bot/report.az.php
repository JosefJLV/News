<pre><?php

$con=mysqli_connect('localhost','jymaxjgd_anbar','Yusif1996','jymaxjgd_xeberbaza');

$yaranma=date('Y-m-d H:i:s');

$data = file_get_contents('https://report.az/');

//echo $data;


preg_match('/<section class="other-category-news">(.*)<section class="most-read-news bg-white-texture ptb-5">/siU',$data,$list);

unset($list[0]);

//print_r($list[1]);


preg_match_all('/<a href="(.*)" .*>/siU',$list[1],$links);

unset($links[0]);

//print_r($links[1]);

for($i=0;$i<count($links[1]); $i++)
{
    $link= 'https://report.az/'.$links[1][$i];
    
    echo 'LINKS: '.$link.'<br>';
    
    
    $tamdata = file_get_contents($link);
    
        preg_match('/<meta property="og:title" content="(.*)">.*<meta property="og:image" content="(.*)">.*<span class="description">(.*)<a href="#" target="_blank">/siU',$tamdata,$info);
    
        unset($info[0]);
    
        echo 'TITLE: '.$title.'<br>';
        echo 'IMG: '.$image.'<br>';
        echo 'TEXT: '.$text.'<br>';
        echo 'CAT: '.$cat.'<br>';
        echo 'DATE: '.$tarix.'<br>';
        echo 'MENBE: '.$menbe.'<br><br>';
    
    
    
        $title=mysqli_real_escape_string($con,strip_tags(trim($info[1])));
        $image=mysqli_real_escape_string($con,strip_tags(trim($info[2])));
        $text = mysqli_real_escape_string($con,trim(strip_tags($info[3],'<img><iframe><a>')));
        
        $cat='Ölkə gündəmi';
        
        $tarix=date('Y-m-D H:i:s');
        $menbe='report.az';
        
        $sec=mysqli_query($con, "SELECT * FROM news WHERE link='".$link."'"); 

     if(mysqli_num_rows($sec)==0)
        {
            $daxilet=mysqli_query($con,"INSERT INTO news(title,image,text,link,menbe,yaranma,cat,tarix)
                 VALUES('".$title."','".$image."','".$text."','".$link."','".$menbe."','".$yaranma."','".$cat."','".$tarix."')");
                 
                
                 if($daxilet==true)
                 {
                     echo'Xeber elave olundu';
                 }
                 else
                        echo'Xeber elave oluna bilmedi';
        }
        else
        {echo 'Link artiq bazada var';}
  
}
?></pre>