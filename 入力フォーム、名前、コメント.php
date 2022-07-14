<html lang="ja">
    <head>
        <meta charset="UTF-8">
        
    </head>
    <body>
        <form action="" method="post">
            <input type="text" name="name" placeholder="名前">
            <input type="text" name="koment" placeholder="コメント">
            <input type="submit" name="submit">
            
        </form>
        <?php
        
       
        $date=date("Y年m月d日 H時i分s秒");
        if(!empty($_POST["name"])&&empty($_POST[""])){
            $name=$_POST["name"];
            $koment=$_POST["koment"];
            
            $filename="m3-1.txt";
          $fp=fopen($filename,"a");
           $count=count(file($filename));
           $count++;
            fwrite($fp,$count."<>".$name."<>".$koment."<>".$date.PHP_EOL);
            fclose($fp);
            
            if(file_exists("$filename")){
              $lines=file($filename,FILE_IGNORE_NEW_LINES);
              foreach($lines as $line){
                  echo $line."<br>";
              }
            }
            
        }
        
        
        
        
        
      ?>  
    </body>
    
    
</html>
