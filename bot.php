<?php
require __DIR__.'/config/config.php';
require __DIR__.'/core/apiVK.php';
$v = new vk();
$confirmation_token = 'токен';
//Ключ доступа сообщества
$token = 'токен';

if (!isset($_REQUEST)) {
  return;
}

//Получаем и декодируем уведомление
$data = $v->get();

//Проверяем, что находится в поле "type"
switch ($data->type) {
  //Если это уведомление для подтверждения адреса сервера...
  case 'confirmation':
    //...отправляем строку для подтверждения адреса
    echo $confirmation_token;
    break;

//Если это уведомление о новом сообщении...
  case 'message_new':
    //...получаем id его автора
    $uid = $data->object->user_id;
	$user_msg = $data->object->body;
	
    //затем с помощью users.get получаем данные об авторе
    $user_info = $v->usersGet($uid);

//и извлекаем из ответа его имя
	$info = array_shift(json_decode($user_info)->response);
	$uname = $info->first_name;

	//С помощью messages.send и токена сообщества отправляем ответное сообщение
	if($user_msg == 'Время'){
		$v->msgSend("Время: ".date('h:i:s'), $uid, $token);
	}
	if($user_msg == 'Привет'){
		$v->msgSend("Привет, $uname! ", $uid, $token);
	}
	if($user_msg == 'На какие устройства есть Jailbreak?'){
		$v->msgSend("$uname, почитай пост! 😀 https://vk.com/corejailbreak?w=wall-23442344_1828161%2Fall", $uid, $token);
	}
		if($user_msg == 'Как дела?'){
		$v->msgSend("У нас все хорошо! Ты подписался на нашу группу?", $uid, $token);
	}
		if($user_msg == 'Скачать Impactor'){
		$v->msgSend("http://www.cydiaimpactor.com", $uid, $token);
	}
	if($user_msg == 'Jailbreak'){
		$v->msgSend("$uname, почитай пост! 😀 https://vk.com/corejailbreak?w=wall-23442344_1828161%2Fall", $uid, $token);
	}
	if($user_msg == 'Jailbreak'){
		$v->msgSend("$uname, почитай пост! 😀 https://vk.com/corejailbreak?w=wall-23442344_1828161%2Fall", $uid, $token);
	}
	if($user_msg == 'jailbreak'){
		$v->msgSend("$uname, почитай пост! 😀 https://vk.com/corejailbreak?w=wall-23442344_1828161%2Fall", $uid, $token);
	}
		if($user_msg == 'Джейлбрейк'){
		$v->msgSend("$uname, почитай пост! 😀 https://vk.com/corejailbreak?w=wall-23442344_1828161%2Fall", $uid, $token);
	}
		if($user_msg == 'Как установить Yalu?'){
		$v->msgSend("$uname, скачай ipa с сайта https://yalu.qwertyoruiop.com и подпиши это утилитой Cydia Impactor!", $uid, $token);
	}
			if($user_msg == 'Yalu'){
		$v->msgSend("$uname, скачай ipa с сайта https://yalu.qwertyoruiop.com и подпиши это утилитой Cydia Impactor! Ну или купить доступ на сайте ishmv.ru", $uid, $token);
	}
			if($user_msg == 'Ошибки Cydia'){
		$v->msgSend("Исправление ошибок Cydia - http://vk.cc/5vQgrr", $uid, $token);
	}
			if($user_msg == 'Правила группы'){
		$v->msgSend("Правила группы - http://vk.cc/5vQhcR", $uid, $token);
	}
				if($user_msg == 'У меня не работает cydia impactor'){
		$v->msgSend("https://vk.com/corejailbreak?w=wall-23442344_1921159", $uid, $token);
	}
		if($user_msg == 'Помощь'){
		$v->msgSend("Что у меня можно узнать? v1.0
		
- Время
- Как дела?
- Как установить Yalu?
- Ошибки Cydia
- У меня не работает cydia impactor
- Скачать модифицированные приложения (скоро)
- На какие устройства есть Jailbreak?
- Правила группы
- Скачать Impactor

Хотите научить бота? Напишите новую команду с пометкой #corebot", $uid, $token);
	}

	
//Возвращаем "ok" серверу Callback API
    echo('ok');
die;
break;
}
?> 