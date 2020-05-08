<?php
    $rows = array();
    //$rows[0] = $_GET["q1"]
    $rows = $_GET;
    //print_r($rows);

    $width = 1700;
    $height = 850;
    $rowWidth = 100;
    $rowInterval = 50;
    $img = imagecreatetruecolor($width, $height);
    $color = imagecolorallocate($img, 76, 70, 153);
    $blue = imagecolorallocate($img, 204, 144, 75);
    imagefill($img, 0, 0, $color);

    for($i = 1, $y1 = $height, $x1 = 100; $i < count($rows)+1; $i++) {
         $colorRow = imagecolorallocate($img, 204, 144, 75);
         // Нормирование высоты столбца
        $y2 = $y1 - $rows['q'.$i]*$height/100;
        // Определение второй координаты столбца
        $x2 = $x1 + $rowWidth;
        // Отрисовываем столбец
        imagefilledrectangle($img, $x1, $y1, $x2, $y2, $colorRow);
        //imagettftext($img, 10, 90, 900, 800, $blue, 'arial.ttf', 'dadsad');
        // Между столбцами создаем интервал в $rowInterval пикселей
        $x1 = $x2 + $rowInterval;
    }
    // // Выводим изображение в браузер, в формате GIF
    header ("Content-type: image/gif");
    imagegif($img);
?>
