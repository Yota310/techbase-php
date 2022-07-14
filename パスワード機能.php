<html lang="ja">
    <head>
        <meta charset="UTF-8">
        
    </head>
    <body>
        
        
       
        <form action="" method="post">
            <input type="text" name="name" placeholder="名前" value=<?php   if(!empty($_POST["num2"])&&!empty($_POST["edpass"])) {
        
            $edpass=$_POST["edpass"];
            $num2=$_POST["num2"];
            $lines2=file("m3-5.txt",FILE_IGNORE_NEW_LINES);
            foreach($lines2 as $line){
           $line=explode("<>",$line);
        
           if($line[0]==$num2&&$edpass==$line[4]){
             echo $line[1];
         
          }
            
           
          else{
             
        
   
       
          }
          
            
        }
        }  ?>><br>
           
           
           
           
            <input type="text" name="koment" placeholder="コメント" value=<?php   if(!empty($_POST["num2"])&&!empty($_POST["edpass"])) {
        
            $edpass=$_POST["edpass"];
            $num2=$_POST["num2"];
            $lines2=file("m3-5.txt",FILE_IGNORE_NEW_LINES);
            foreach($lines2 as $line){
           $line=explode("<>",$line);
         
           if($num2==$line[0]&&$edpass==$line[4]){
            
              echo $line[2];
          }
            
           
          else{
             
            
   

          }
          
            
        }
        } ?>><br>
             
             
             
             
             
             
             <input type="hidden" name="sirusi" value=<?php if(!empty($_POST["num2"])&&!empty($_POST["edpass"])) {  
             $edpass=$_POST["edpass"];
            $num2=$_POST["num2"];
            $lines2=file("m3-5.txt",FILE_IGNORE_NEW_LINES);
            foreach($lines2 as $line){
             $line=explode("<>",$line);
         
           if($num2==$line[0]&&$edpass==$line[4]){
               echo $line[0];
               
           }
               
            }
           
           }
           ?>>
            
            
            
            <input type="text" name="pass" placeholder="パスワード">
            <input type="submit" name="submit"><br>
           <br>
            
            <input type="number" name="num" placeholder="削除する番号"><br>
            <input type="text" name="delpass" placeholder="パスワード">
           <button type="submit"name="submit">削除</button><br>
           
           
           
           <input type="number" name="num2" placeholder="編集する番号"><br>
           <input type="text" name="edpass" placeholder="パスワード">
           <input type="submit" name="submit" value="編集">
        </form>
        <?php
        
       
        $date=date("Y年m月d日 H時i分s秒");
       
       
        //henshu
        if(!empty($_POST["sirusi"])&&!empty($_POST["name"])&&!empty($_POST["koment"])){
            
            $sirusi=$_POST["sirusi"];
          
             $filename= "m3-5.txt";
            $count=count(file($filename,FILE_IGNORE_NEW_LINES));
            $lines=file($filename);
            $fp=fopen($filename,"w");
            foreach($lines as $line){
                $line=explode("<>",$line);
                if($sirusi==$line[0]){
              $name=$_POST["name"];
            $koment=$_POST["koment"];
            
             fwrite($fp,$line[0]."<>".$name."<>".$koment."<>".$date."<>".$line[4]."<>".PHP_EOL);
             echo $line[0]." ".$name." ".$koment." ".$line[3]."<br>";
                }
                
                
                else
                {
                    fwrite($fp,$line[0]."<>".$line[1]."<>".$line[2]."<>".$line[3]."<>".$line[4]."<>".PHP_EOL);
            
                    echo $line[0]." ".$line[1]." ".$line[2]." ".$line[3]."<br>";
                }
                    
            }
            fclose($fp);
            
        }
        
        
        //sakujo
        else if(!empty($_POST["num"])&&!empty($_POST["delpass"])){
            $delpass=$_POST["delpass"];
            $num=$_POST["num"];
            $filename= "m3-5.txt";
            
            
          
            $lines=file($filename,FILE_IGNORE_NEW_LINES);
            if(file_exists ($filename)){ 
                $lines = file ($filename,FILE_IGNORE_NEW_LINES); 
             } 
              file_put_contents($filename,'');
            $fp=fopen($filename,"a");
            foreach($lines as $line){
                $line=explode("<>",$line);
                if($delpass==$line[4]&&$num==$line[0]){
                    
                }
                
                else {
                fwrite($fp,$line[0]."<>".$line[1]."<>".$line[2]."<>".$line[3]."<>".$line[4]."<>".PHP_EOL);
            
                    echo $line[0]." ".$line[1]." ".$line[2]." ".$line[3]."<br>";
                    
                }
            }
            fclose($fp);
            
        }
        
        
        
        
        
        
        
        //kiroku
       else if(!empty($_POST["name"])&&!empty($_POST["koment"])){
           
            
            $name=$_POST["name"];
            $koment=$_POST["koment"];
            $pass=$_POST["pass"];
            
            $filename2="m3-5(m).txt";
            $fp2=fopen($filename2,"a");
             $count=count(file($filename2));
           $count++;
           
            fwrite($fp2,$count."<>".$name."<>".$koment."<>".$date."<>".$pass."<>".PHP_EOL);
            fclose($fp2);
            
            
            
            $filename="m3-5.txt";
          $fp=fopen($filename,"a");
          
           
            fwrite($fp,$count."<>".$name."<>".$koment."<>".$date."<>".$pass."<>".PHP_EOL);
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
