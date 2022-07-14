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
        $filename="mission_2-2.txt";
        $fp=fopen($filename,"w");
        fwrite($fp,$str.PHP_EOL);
        fclose($fp);
       if (file_exists($filename)){
        $lines=file($filename,FILE_IGNORE_NEW_LINES);
        foreach($lines as $line){
        if($line=="完成！"){
            echo "おめでとう！<br>";
        }
       else{  
           echo $line."<br>";
       }
       }
        }
        }
       }
       
       
        ?>
    </body>
    </html>