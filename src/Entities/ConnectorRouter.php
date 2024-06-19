<?php
/**
 * Connector router class.
 * @author Alan José <alanjsyt@gmail.com>
 * @since v0.1.0
 */
namespace Alanjoose\Dbsocket\Entities;

class ConnectorRouter
{
    /**
     * @var BaseConnector|MysqlConnector
     */
    private static BaseConnector $connector;

    public function __construct()
    {
        $driverFromEnv = getenv('DB_DRIVER');
        self::$connector = match($driverFromEnv) {
            'mysql' => new MysqlConnector(),
        };
    }

    /**
     * Get the connector based on env DB_DRIVER key.
     * @return \PDO
     */
    public static function getConnector(): \PDO
    {
        return self::$connector->connect();
    }
}