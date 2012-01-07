<?php
    /**
     * LICENSE: This source file is subject to Creative Commons Attribution
     * 3.0 License that is available through the world-wide-web at the following URI:
     * http://creativecommons.org/licenses/by/3.0/.  Basically you are free to adapt
     * and use this script commercially/non-commercially. My only requirement is that
     * you keep this header as an attribution to my work. Enjoy!
     *
     * @license http://creativecommons.org/licenses/by/3.0/
     * @link    https://bitbucket.org/pogosheep/irc-bot
     *
     * @package IRCBot
     * @author Daniel Siepmann <coding.layne@me.com>
     *
     * @encoding UTF-8
     *
     * @filesource
     */

    // Configure PHP
    set_time_limit( 0 );
    ini_set( 'display_errors', 'on' );

    // Make autoload working
    require 'Classes/Autoloader.php';
    spl_autoload_register('Autoloader::load');

    // Create the bot.
    $bot = new Library\IRCBot();
    // Configure the bot.
    $bot->server = 'irc.quakenet.org';
    $bot->port = 6667;
    $bot->channel = array('#layne-test');
    $bot->name = 'laynes-bot';
    $bot->nick = 'layne-bot';
    $bot->maxReconnects = 1;
    // Add commands to the bot.
    $bot->addCommand( new Command\Say(-1) );
    $bot->addCommand( new Command\Quit );
    $bot->addCommand( new Command\Restart );
    // Connect to the server.
    $bot->connectToServer();
    // Nothing more possible, the bot runs until script ends.
?>