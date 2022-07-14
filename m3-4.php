<html lang="ja">
    <head>
        <meta charset="UTF-8">
        
    </head>
    <body>
        
        
        <?php 
        //henshujunbi
        if(!empty($_POST["num2"])) {
        
            
            $num2=$_POST["num2"];
            $lines2=file("m3-4.txt");
            foreach($lines2 as $line){
           $line=explode("<>",$line);
          if($num2==$line[0]){
              $str1=$line[1];
              $str2=$line[2];
            
          }
          else{
              $str1="";
              $str2="";
              $num2="";
          }
         
            
        }
        }
        ?>
        <form action="" method="post">
            <input type="text" name="name" placeholder="名前" value="<?php  echo $str1 ?>"><br>
            <input type="text" name="koment" placeholder="コメント" value="<?php  echo $str2 ?>">
             <input type="hidden" name="sirusi" value="<?php  echo $num2 ?>">
            <input type="submit" name="submit"><br>
           <br>
            
            <input type="number" name="num" placeholder="削除する番号">
           <button type="submit"name="submit">削除</button><br>
           
           
           
           <input type="number" name="num2" placeholder="編集する番号">
           <input type="submit" name="submit" value="編集">
        </form>
        <?php
        
       
        $date=date("Y年m月d日 H時i分s秒");
       
       
        //henshu
        if(!empty($_POST["sirusi"])&&!empty($_POST["name"])&&!empty($_POST["koment"])){
            
            $sirusi=$_POST["sirusi"];
            
             $filename= "m3-4.txt";
            $count=count(file($filename,FILE_IGNORE_NEW_LINES));
            $lines=file($filename);
            $fp=fopen($filename,"w");
            foreach($lines as $line){
                $line=explode("<>",$line);
                if($sirusi==$line[0]){
              $name=$_POST["name"];
            $koment=$_POST["koment"];
            
             fwrite($fp,$count."<>".$name."<>".$koment."<>".$date.PHP_EOL);
             echo $line[0]." ".$name." ".$koment." ".$line[3]."<br>";
                }
                
                
                else
                {
                    fwrite($fp,$line[0]."<>".$line[1]."<>".$line[2]."<>".$line[3]);
            
                    echo $line[0]." ".$line[1]." ".$line[2]." ".$line[3]."<br>";
                }
                    
            }
            fclose($fp);
            
        }
        
        
        //sakujo
        else if(!empty($_POST["num"])){
            $num=$_POST["num"];
            $filename= "m3-4.txt";
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
        
        
        
        
        
        
        
        //kiroku
       else if(!empty($_POST["name"])&&!empty($_POST["koment"])&&empty($_POST["sirusi"])){
           
            
            $name=$_POST["name"];
            $koment=$_POST["koment"];
            
            
            $filename2="m3-4(m).txt";
            $fp2=fopen($filename2,"a");
             $count=count(file($filename2));
           $count++;
           
            fwrite($fp2,$count."<>".$name."<>".$koment."<>".$date.PHP_EOL);
            fclose($fp2);
            
            
            
            $filename="m3-4.txt";
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