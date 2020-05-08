<?php
    $rightAnswers=array("q2", "q6", "q10", "q11", "q15");
    $rightCount=count($rightAnswers);
    $finalResult=0;

    $answerCount=count($_REQUEST);
    $secondQuestionRightAnswers=0;
    $rows=array();

    // Вычисляет timestamp в Гринвиче, который соответствует локальному timestamp-формату y значению.
    function local2gmt($localStamp=false)
    {
        if($localStamp==false)
        $localStamp=time();
        $tzOffset=date("Z",$localStamp); // Получаем смещение часовой зоны в секундах.
        return $localStamp-$tzOffset; // Вычитаем разницу - получаем время по GMT.
    }

    //Вывод ответов на вопросы
    //echo "<pre>";
    //print_r($_REQUEST);
    //echo "</pre>";

    //Проверка теста
    if($answerCount == $rightCount)
    {
        $i=0;
        foreach($_REQUEST as $k=>$v)
        //for ($i=0;$i<$answerCount;$i++)
        {
            //$v=$_REQUEST[$i];
                if($v != $rightAnswers[$i])
                {
                    $rows[]=1;
                    $finalResult=1;
                } else {
                    $rows[]=95;
                }
            $i++;
        }
            //print_r($rows);

        for ($i=0; $i<5; $i++){
            echo "Вы ответили на вопрос № ".($i+1)." ";
            if ($rows[$i] == 95){
                echo " ПРАВИЛЬНО.<br>";
            }else{
                echo " НЕПРАВИЛЬНО.<br>";
            }
        }
        $str="\r\n";
        $f=fopen("result.txt","a+") or die ("Can't open file for writting!");
        if ($finalResult == 0)
        {
            fwrite($f,$str);
            fwrite($f,date("Y-m-d H:i", time()+14440));
            fwrite($f,$str);
            fwrite($f,'Тест успешно пройден! Поздравляем!');
            fclose($f);
            echo "<html><head><title>Результаты тестирования</title></head><body><h1>Результат теста:</h1><h3>Тест успешно пройден! Поздравляем!</h3></body></html>";
            date_default_timezone_set('Asia/Novosibirsk');
            echo "Время сдачи: ", date("Y-m-d H:i", time());
            $gmt=local2gmt(time());
        }
        else
        {
            $str="\r\n";
            $f=fopen("result.txt","a+");
            fwrite($f,$str);
            fwrite($f,date("Y-m-d H:i", time()+14440));
            fwrite($f,$str);
            fwrite($f,'Тест сдать, к сожалению, не удалось. Подучите таблицу умножения и возвращайтесь снова!');
            fclose($f);
            echo"<html><head><title>".'Результаты тестирования'."</title></head><body><h1>".'Результат теста:'."</h1><h3>".'Тест сдать, к сожалению, не удалось. Подучите таблицу умножения и возвращайтесь снова!'."</h3></body></html>";
            date_default_timezone_set('Asia/Novosibirsk');
            echo "Время сдачи: ", date("Y-m-d H:i", time());
            $gmt=local2gmt(time());
        }
    }
    else
    {
        $str="\r\n";
        $f=fopen("result.txt","a+");
        fwrite($f,$str);
        fwrite($f,date("Y-m-d H:i", time()+14440));
        fwrite($f,$str);
        fwrite($f,'Не все вопросы имеют ответ! Ответьте, пожалуйста, на все вопросы.');
        fclose($f);
        echo"<html><head><title>".'Результаты тестирования'."</title></head><body><h1>".'Результат теста:'."</h1><h3>".'Не все вопросы имеют ответ! Ответьте, пожалуйста, на все вопросы.'."</h3></body></html>";
        date_default_timezone_set('Asia/Novosibirsk');
        echo "Время сдачи: ", date("Y-m-d H:i", time());
        $gmt=local2gmt(time());
    }
    echo "<br><br><a href='./rs.php?q1=".$rows[0]."&q2=".$rows[1]."&q3=".$rows[2]."&q4=".$rows[3]."&q5=".$rows[4]."'>ResGraphics</a>";
    echo "<br><a href='./result.txt'>ResText</a>"
?>

