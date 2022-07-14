<html lang="ja">
    <head>
        <meta charset="UTF-8">
        
    </head>
    <body>
        <form action="" method="post">
            <input type="text" name="str" placeholder="コメント">
            <input type = "submit" name="submit">
        </form> 
        <?php
       if(!empty($_POST["str"])){
        $str=$_POST["str"];
        if($str!="no"){
        $filename="mission_2-3.txt";
        $fp=fopen($filename,"a");
        fwrite($fp,$str.PHP_EOL);
        fclose($fp);
      
        if($str=="完成！"){
            echo "おめでとう！<br>";
        }
       else{  
           echo $str."<br>";
       }
       }
        }
        
       
       
       
        ?>
    </body>
    </html>