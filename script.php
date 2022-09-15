<?php
session_start();
$time_start = microtime(true);
$x = $_GET["ChX"];
$y = $_GET["ChY"];
$r = $_GET["r"];
$res = false;

                #echo($x);
                #print "    ";
                #echo($y);
                #print "    ";
                #echo($r);
                #print "    ";

                #echo($time);



if($x==-5 || $x==-4 || $x==-3 || $x==-2 || $x==-1 || $x==0 || $x==1 || $x==2 || $x==3){
    if(is_numeric($y)){
        if($y>=-5 || $y<=5){
            if($r==1 || $r==1.5 || $r==2 || $r==2.5 || $r==3){
                //triangle
                if($x<=$r/2 && $y>=(-1*$r/2) && $x>=0 && $y<=0 && ($y + $x >= $r/2)){
                    $res = true;
                }
                //square
                if($x<=0 && $x>=-$r && $y<=0 && $y>=-$r/2){
                    $res=true;
                }
                //circle
                if(($x^2+$y^2<=$r^2)&&$x<=$r/2 && $x>=0 && $y>=-$r/2 && $y<=0){
                    $flag=true;
                }

                if($y >= 0 && $y <= $r/2 && $x <= 0 && $x >= -$r/2 && ($x^2+$y^2<=($r/2)^2)){
                    $res = true;
                }
                $time_end = microtime(true);
                $time = number_format($time_end - $time_start, 5);


                $current_time = date('Y-m-d, H:i:s');

                $array = [$x, $y, $r, $res ? "true":"false", $time, ];
                $_SESSION['history'][] = $array;
                $table_result = "<table id=\"main_table\" class=\"super_table\" border=\"3\"><tr><th>X:</th><th>Y:</th><th>R:</th><th>Попадание:</th><th>Время работы:</th></tr>";
                foreach ($_SESSION['history'] as $line) {
                    $table_result.="<tr><td>$line[0]</td><td>$line[1]</td><td>$line[2]</td><td>$line[3]</td><td>$line[4]</td></tr>";
                }
                $table_result = "<label for=\"main_table\" class=\"against_the_current\">Текущая дата и время: $current_time</label>".$table_result;
                $table_result.="</table>";
                echo $table_result;

               
            }else{
                 die("Wrong values detected "."<label class=\"error\">Вы пытались сломать сайт</label>");
            }
        }else{
            die("Wrong values detected "."<label class=\"error\">Вы пытались сломать сайт</label>");
        }
    }else{
        die("Wrong values detected "."<label class=\"error\">Вы пытались сломать сайт</label>");
    }
}else{
    die("Wrong values detected "."<label class=\"error\">Вы пытались сломать сайт</label>");
}

?>
