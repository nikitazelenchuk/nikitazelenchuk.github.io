<?php
  session_start();
	echo "<nav id='menu1'>
 <ul>
  <li><a href='index.php'>Главная</a></li>
  <li><a href='#m2'>Описание</a>
    <ul>
      <li><a href='color.php'>CSS-цвета</a></li>
      <li><a href='information.php'>Теория</a></li>
    </ul>
  </li>
  <li><a href='#m3'>Таблицы</a>
   <ul>
    <li><a href='color_table.php'>CSS-цвета</a></li>
    <li><a href='information_table.php'>Теория</a></li>
   </ul>
  </li>
  <li><a href='comments.php'>Комментарии</a></li>
  <li><a href='contacts.php'>Контакты</a></li>";
  if ($_SESSION != null){
    if ($_SESSION['user'] == true) echo "<p class='loginTop'>| <a href='php/exitfromsite.php'>Выход</a></p></ul></nav><!--menu1-->";
    else echo "<p class='loginTop'>| <a href='loginpage.php'>Вход</a>| <a href='registrationpage.php'>Регистрация</a></p></ul></nav><!--menu1-->";
  }else{
    echo "<p class='loginTop'>| <a href='loginpage.php'>Вход</a>| <a href='registrationpage.php'>Регистрация</a></p></ul></nav><!--menu1-->";
  }
?>
