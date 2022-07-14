<html lang="ja">
    <head>
        <meta charset="UTF-8">
        
    </head>
    <body>
        <form action="" method="post">
            <input type="text" name="name" placeholder="名前">
            <input type="text" name="koment" placeholder="コメント">
            <input type="submit" name="submit">
            
            
            <input type="number" name="num" placeholder="削除する番号">
           <button type="submit"name="submit">削除</button>
        </form>
        <?php
        
       
        $date=date("Y年m月d日 H時i分s秒");
        if(!empty($_POST["num"])){
            $num=$_POST["num"];
            $filename= "m3-3.txt";
            $count=count(file($filename,FILE_IGNORE_NEW_LINES));
            $lines=file($filename);
            $fp=fopen($filename,"w");
            foreach($lines as $line){
                $line=explode("<>",$line);
                if($num!=$line[0]&&!empty($line[0])&&$line[0]!="<"){
                fwrite($fp,$line[0]."<>".$line[1]."<>".$line[2]."<>".$line[3]);
            
                    echo $line[0]." ".$line[1]." ".$line[2]." ".$line[3]."<br>";
                    
                }
            }
            fclose($fp);
            
        }
       else if(!empty($_POST["name"])&&!empty($_POST["koment"])){
            
            $name=$_POST["name"];
            $koment=$_POST["koment"];
            
            
            $filename2="m3-3(m).txt";
            $fp2=fopen($filename2,"a");
             $count=count(file($filename2));
           $count++;
           
            fwrite($fp2,$count."<>".$name."<>".$koment."<>".$date.PHP_EOL);
            fclose($fp2);
            
            
            
            $filename="m3-3.txt";
          $fp=fopen($filename,"a");
          
           
            fwrite($fp,$count."<>".$name."<>".$koment."<>".$date.PHP_EOL);
            fclose($fp);
            
            
            
            if(file_exists("$filename")){
              $lines=file($filename,FILE_IGNORE_NEW_LINES);
              foreach($lines as $line){
                 
                  $line= explode("<>",$line);
               
                if(!empty($line[0])&&$line[0]!=" "){
                   
                 echo $line[0]." ".$line[1]." ".$line[2]." ".$line[3]."<br>";
                  $i=$line[0];
              
            }
                }
              }
            
            
        }
        
       
      ?>  
    </body>
    
    
</html>
