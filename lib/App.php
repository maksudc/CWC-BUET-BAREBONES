<?php

/**
 * App Engine
 *
 * Initialize the environment, load the configuration, create
 * database connection, prepare utility classes and provide
 * factory to entity repositories.
 *
 */
class App {

    /**
     * @var Config
     */
    public static $config;
    /**
     * @var Sparrow
     */
    public static $db;

    public static function init($configFile) {
        self::setTimeZone();
        self::setErrorReporting();
        self::initSession();
        self::initAutoload();
        self::loadConfiguration($configFile);
        self::loadDatabaseConnection();
        self::loadUtility();
    }

    private static function setTimeZone() {
        date_default_timezone_set('Asia/Dacca');
    }

    private static function setErrorReporting() {
        ini_set("display_errors", "on");
        error_reporting(E_ALL ^ E_NOTICE);
    }

    private static function initSession() {
        session_start();
    }

    private static function initAutoload() {
        spl_autoload_register(function($className) {

                    $paths = explode(PATH_SEPARATOR, get_include_path());

                    foreach ($paths as $path) {
                        $file = $path . DIRECTORY_SEPARATOR . $className . '.php';
                        if (file_exists($file)) {
                            include_once $file;
                            return;
                        }
                    }
                });
    }

    private static function loadConfiguration($configFile) {
        self::$config = new Config($configFile);
    }

    private static function loadDatabaseConnection() {
        $dsn = "mysqli://" . self::$config->get('db.user')
                . ":" . self::$config->get('db.pass')
                . "@" . self::$config->get('db.host')
                . ":" . self::$config->get('db.port')
                . "/" . self::$config->get('db.name');

        self::$db = new Sparrow($dsn);
    }

    private function loadUtility() {
        ViewHelper::setConfig(self::$config);
    }

    public static function run() {
        $page = !empty($_GET['page']) ? $_GET['page'] : 'home';

        if (!file_exists(APPPATH . '/pages/' . $page . '.php')) {
            die("404 Not Found.");
        }

        include_once APPPATH . '/pages/' . $page . '.php';
    }

    /**
     * @property
     * It simply converts the requests to MVC pattern
     *
     * at first find out the controller
     * pattern of controller
     *
     * /index.php/<controller>/<method>
     * OR
     * /<controller>/<method>
     *
     * if the method does not exist or  not providen by default index function on that conttroller is called
     */
    public static function runMVC() {

        $url = $_SERVER["REQUEST_URI"];
        $delimeter = '/';
        $url = explode($delimeter, $url);

        if (in_array('index.php', $url)) {
            $index = 3;
        } else {
            $index = 2;
        }
        $controller = ucfirst($url[$index]);

        if (!array_key_exists($index + 1, $url) || empty($url[$index + 1])) {
            $method = 'index';
        }
        else
            $method = $url[$index + 1];

        $class = new $controller();
        $class->$method();
    }

    public static function getRepository($entity) {
        $repository = ucfirst($entity) . 'Repository';
        return new $repository(self::$db);
    }

}