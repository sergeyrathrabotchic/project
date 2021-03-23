<!DOCTYPE HTML >
<html>
 <head>
  <meta content="charset=utf-8">
 </head>
 <body>

<?php   if ($id == 0): ?>
<a href="/">Вход</a>
<a href="/registration">Регистрация</a>
<form action="" method="get">    
<p>Введите email: <input type="text" name="email"/></p>
<p>Введите пароль: <input type="text" name="password"/></p>
<p><input type="submit" name="Вход" /></p>
</form>
<?php endif; ?>

<br>

@if($id != 0 )
<form action="" method="get">
<p><input type="submit"  value="exit" name="exit" /></a>
</form>

<form action="" method="get">
<p>Введите ссылку каторую хотите добавить: <input type="text" name="url"/></p>
<p><input type="submit" name="add" /></a>
</form>
@endif



@if(empty($arr) == 0 )
<ul>
@for($i=0,$c=1;$i<count($arr);$i=$i+2,$c=$c+2)

<a href=<?php echo '"' . $arr[$c] . '"' ; ?>><li><?php echo  $arr[$c] ; ?></li></a>

@endFor	
</ul> 
@endif

<?php /*echo "<pre>"; dump( $id); echo "</pre>";*/ ?>
<?php /*echo "<pre>"; dump( $arr); echo "</pre>";*/ ?>
<?php /*echo "<pre>"; dump( $session); echo "</pre>";*/?>
<?php /*echo "<pre>"; print_r( $url); echo "</pre>"*/?>
<?php /*echo "<pre>"; print_r( $_GET); echo "</pre>";*/?>



<?php /*echo "<pre>"; print_r( $urls); echo "</pre>";*/ ?>
<?php /*echo "<pre>"; print_r( $users); echo "</pre>";*/ ?>


 </body>
</html>
