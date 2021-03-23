<!DOCTYPE HTML >
<html>
 <head>
  <meta content="charset=utf-8">
 </head>
 <body>

<a href="/">Вход</a>
<a href="/registration">Регистрация</a>

<form action="" method="get">
     
<p>Введите имя: <input type="text" name="name"/></p>
<p>Введите email: <input type="text" name="email"/></p>
<p>Введите пароль: <input type="text" name="password"/></p>
<p><input type="submit" name="registration"/></p>

</form>


<br>
@if($checkingregistration == 2)
 
<p>Данные введены верно! </p> 
<br>
@endif

@if($checkingregistration == 0)
<p>Данные введены не верно!</p>
@endif


<?php /*echo "<pre>"; print_r( $checkingregistration); echo "</pre>";*/ ?>
<?php /*$email = str_split($email);
 echo "<pre>"; print_r( $email); echo "</pre>"; */?>

 </body>
</html>