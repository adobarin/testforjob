<?php

/*
Template Name: контакты
*/
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

<h2> Наши сотрудники </h2>
<?
/*
 * Массив $params содержит параметры вывода пользователей
 */
$params = array(
	'role' => 'contributor', // роль Подписчик
	'number' => 10, // количество выводимых пользователей - 10
	'orderby' => 'name',
	'order' => 'ASC'
);
 
/*
 * Создаем новый объект с пользователями
 */
$uq = new WP_User_Query( $params );
 
/*
 * Сначала проверяем, что объект не пустой, т е что пользователи соответствующие заданным в $params параметрам, существуют
 */
if ( ! empty( $uq->results ) ) {
 
	/*
	 * Для каждого пользователя запускаем цикл
	 */
	 $i=0;
	 $ArrNames = array();
	 $ArrLastNames = array();
	 $ArrOtchestvo = array();
	 $ArrAge = array();
	foreach ( $uq->results as $u ) {
		$ArrNames[$i] = $u->first_name;
		$ArrLastNames[$i] = $u->last_name;
		$ArrOtchestvo[$i] = $u->user_otchestvo;
		$ArrAge[$i] = $u->user_age;
		$ArrPhone[$i] = $u->user_phone;
		$ArrMail[$i] = $u->user_email;
		$i++;
	}
	
	setlocale(LC_ALL, "Russian_Russia.1251"); // установили локаль для русских букв
	?>
<div class="byage hide">
<?
	asort($ArrAge);
	foreach ($ArrAge as $key => $val) {
    echo "<p>" . $ArrNames[$key] . " " . $ArrOtchestvo[$key] . " " . $ArrLastNames[$key] . ", " . $ArrPhone[$key] . ", " . $ArrMail[$key] . ", " . $ArrAge[$key] . " год(лет);</p>";
	}
?> 
</div>
<div class="byname show hide">
<?
	asort($ArrNames);
	foreach ($ArrNames as $key => $val) {
    echo "<p>" . $ArrNames[$key] . " " . $ArrOtchestvo[$key] . " " . $ArrLastNames[$key] . ", " . $ArrPhone[$key] . ", " . $ArrMail[$key] . ", " . $ArrAge[$key] . " год(лет);</p>";
	}
?> 
</div>

<div class="bylastname hide">
<?
	asort($ArrLastNames);
	foreach ($ArrLastNames as $key => $val) {
    echo "<p>" . $ArrNames[$key] . " " . $ArrOtchestvo[$key] . " " . $ArrLastNames[$key] . ", " . $ArrPhone[$key] . ", " . $ArrMail[$key] . ", " . $ArrAge[$key] . " год(лет);</p>";
	}
?> 
</div>

<div class="byotchestvo hide">
<?
	asort($ArrOtchestvo);
	foreach ($ArrOtchestvo as $key => $val) {
    echo "<p>" . $ArrNames[$key] . " " . $ArrOtchestvo[$key] . " " . $ArrLastNames[$key] . ", " . $ArrPhone[$key] . ", " . $ArrMail[$key] . ", " . $ArrAge[$key] . " год(лет);</p>";
	}
?> 
</div>
 
 <div>
 <h3>Сортировать:</h3>
 <button class="name-button">По Имени</button> <button class="lastname-button">По Фамилии</button> <button class="otchestvo-button">По отчеству</button> <button class="age-button">По Возрасту</button>
 </div>
 
 <script>
 $('.name-button').click(function(){ 
$('.byname').addClass('show'); 
$('.byage').removeClass('show'); 
$('.bylastname').removeClass('show'); 
$('.byotchestvo').removeClass('show'); 
});

 $('.lastname-button').click(function(){ 
$('.byname').removeClass('show'); 
$('.byage').removeClass('show'); 
$('.bylastname').addClass('show'); 
$('.byotchestvo').removeClass('show'); 
});

 $('.otchestvo-button').click(function(){ 
$('.byname').removeClass('show'); 
$('.byage').removeClass('show'); 
$('.bylastname').removeClass('show'); 
$('.byotchestvo').addClass('show'); 
});

 $('.age-button').click(function(){ 
$('.byname').removeClass('show'); 
$('.byage').addClass('show'); 
$('.bylastname').removeClass('show'); 
$('.byotchestvo').removeClass('show'); 
});
 </script>
<?


	//var_dump($ArrLastNames);
} else {
	echo 'Пользователей по заданным критериям не найдено.';
}
?>

        </main><!-- #main -->
    </div><!-- #primary -->
	
<?	
$page_layout = xmas_lite_get_page_layout();
if( 'no-sidebar' != $page_layout ){
    get_sidebar();
}

get_footer();

?>
