<?php
/**
 * ArchFW Framework config file, read comments and carefully edit.
 * 
 * Visit https://github.com/okbrcz/ArchFW/ for more info.
 *
 * PHP version 7.2
 *
 * @category  Framework
 * @package   ArchFW
 * @author    Oskar Barcz <kontakt@archi-tektur.pl>
 * @copyright 2018 Oskar 'archi_tektur' Barcz
 * @license   MIT
 * @version   3.0
 * @link      https://github.com/okbrcz/ArchFW/
 */

return [

    // Enter here location of main index.php file differential path from server root, null if index is at main root
    'prefix' => '',

    // Page meta informations if NOT NULL appears - field can't be null
    'metaConfig' =>
    [
        'pageTitle' => "ArchiGame 2018",
        'pageEncoding' => "UTF-8" /* NOT NULL*/,
        'pageLanguage' => "pl" /* NOT NULL*/,
        'pageDescription' => "",
        'pageKeywords' => "",
        'pageAuthor' => "Oskar 'archi_tektur' Barcz",
        'metaComment' => "
        <!-- Oskar Barcz and company 2018 -->
        <!-- Game made during The GameJam in ZSŻŚ, made with love and (unoffically) alcohol. -->
        <!-- The story is awesome, strange, reliable and inaprotiate, play to see more, come on, why the hell are you reading this code? There's nothing interesting, trust me :p -->"
    ],

    // Add new stylesheets easily, just add another stylesheet (copy "Desktop") to see how. You need to provide valid name, type, rel and path. Don't forget to check if browser sees your new stylesheet in Page Inspector or similiar tool.

    'stylesheets' => [
        "Desktop" => [
            'name' => 'Style - Desktop',
            'type' => 'text/css',
            'rel' => 'stylesheet',
            'link' => '../css/style-desktop.css',
        ],
    ],

    // Here enter database credintials
    'DBConfig' =>
    [
        'dsn' => 'mysql:host=localhost;dbname=archigame',
        'usr' => 'root',
        'pswd' => '',
        // additional PDO options - UTF8 by default
        'addInfo' => 
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ],
    ], 

    // Contains direct paths to wrapper files and twig templates
    'twigConfig' =>
    [
        'twigWrappersPath' => '../assets/wrappers/',
        'twigTemplatesPath' => '..\assets\templates'
    ],

    // Add routing here, in the way like this:
    // "x" => "y"
    // where x is your link and y is your wrapper and template files
    'router' =>
    [
        '/' => 'index',
        '/login/' => 'login',
    ],

    // Advanced router is used for articles and many more regular elements. 
    'advancedRouter' => 
    [
        // there's no routes by default
    ]
];
