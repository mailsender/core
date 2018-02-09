<?php
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 22.12.2017
 * Time: 13:34
 */

require_once __DIR__ . '/vendor/autoload.php';

$logger = new \Sportisimo\Core\Database\Logger();

// TODO: Je nutne drzet si pripojeni k databazi v konkrenit aplikaci? Mohli bychom tahat mail type v podobe encodovanyho jsonu z mail serveru
$connection = new \Sportisimo\Core\Database\Connection(
	false,
	'mysql:host=192.168.202.101;dbname=sportisimo_utf8_produkce4;charset=utf8',
	'sportisimo',
	'sportisimo',
	[],
	$logger
);

$database = new \Sportisimo\Core\Database\PDODatabase($connection, true);

$mailServerAdapter = new \Mailsender\MailSet\MailServerMailSender('192.168.33.10');

$pdoMailTypeRepository = new \Mailsender\MailSet\Adapter\Sportisimo\MailTypeRepository($database);

$mailService = new \Mailsender\MailSet\Adapter\Sportisimo\MailService($mailServerAdapter, $pdoMailTypeRepository);



// Vytvoreni e-mailu a odeslani do fronty
/** @var \Mailsender\MailSet\Adapter\Sportisimo\Entity\Mail $mail */
$mail = $mailService->create('newsletter123');

$recipient = new \Mailsender\MailSet\Entity\Contact('Petr Olišar', 'olisar@sportisimo.cz');
$mail->setRecipient($recipient);

$mailService->send($mail);

// Nacteni e-mailu z fronty a odeslani zakzanikovi
$mail = $mailService->create('newsletter123', json_encode($mail));

$klerkSenderAdapter = new \Mailsender\MailSet\Adapter\Sportisimo\MailSender('localhost', 456, 'username', 'password', 'tls');
$mailService = new \Mailsender\MailSet\Adapter\Sportisimo\MailService($klerkSenderAdapter, $pdoMailTypeRepository);
$mailService->send($mail);
