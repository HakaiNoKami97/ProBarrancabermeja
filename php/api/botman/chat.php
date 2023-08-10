<?php

require_once '../../vendor/autoload.php';

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\SymfonyCache;
use BotMan\BotMan\Drivers\DriverManager;

require_once('conversacion.php');

$config = [];

DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

$adapter = new FilesystemAdapter();

$botman = BotManFactory::create($config, new SymfonyCache($adapter));

$botman->hears('.*(hola|buenas|buen|día|dia|tarde|noche|buenos día|buenos dia|buenas tarde|buenas noche).*', function ($bot) {
    //Se espera un segundo+
    $bot->typesAndWaits(3);
    //Se inicia la conversación
    $bot->startConversation(new conversacion);
});

// $botman->fallback(function ($bot) {
//     $bot->typesAndWaits(3);
//     $bot->reply('Lo siento no te puedo ayudar, no entiendo este comando');
// });


$botman->listen();
