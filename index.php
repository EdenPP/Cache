<?php
/**
 * Description :
 *
 * @author      Eden
 * @datetime    2015/12/18 16:24
 * @copyright   Beijing CmsTop Technology Co.,Ltd.
 */


class Session
{
    private $conf;

    public function __construct ()
    {
        $conf = include_once "config/sess-config.php";

        if (empty($conf['session'])) {
            throw new Exception('Session config error');
        } else {
            $this->conf = $conf['session'];
            $this->setIni();
        }
    }

    private function setIni ()
    {
        foreach ($this->conf as $key => $conf) {
            ini_set("session.{$key}", $conf);
        }

    }

    public function test ()
    {
        return ini_get('session.save_path');
    }
}


class RedisSession
{
    const DEFAULT_REDIS_PORT = 6379;

    const DEFAULT_REDIS_TIMEOUT = 3;

    private static $host;
    private static $port;
    private static $weight;
    private static $prefix;
    private static $database;
    private static $timeout = 3;

    public static function start ($options)
    {
        self::setOptions($options);
        self::connectRedis();
        session_start();
    }

    private static function connectRedis()
    {
        if (preg_match('/^tcp:\/\//i', self::$host)) {
            $host = rtrim(self::$host, '/');
        } else {
            $host = 'tcp://' . rtrim(self::$host, '/');
        }

        $port = empty(self::$port) ? self::DEFAULT_REDIS_PORT : intval(self::$port);

        $query = array();


    }

    private static function setOptions ($options)
    {
        foreach ($options as $option => $value) {
            self::$$option = $value;
        }
    }


}

RedisSession::start(array(
    'host' => '',
    'port' => '',
    'weight' => 0,
    'prefix' => 'MySession:',
    'database' => 0,
));


