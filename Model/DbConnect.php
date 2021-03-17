<?php


class DbConnect
{
    private const HOST = "sql11.freemysqlhosting.net";
    private string $user = "sql11399129";
    private string $pwd = "8SIWhAfUtb";
    private string $dbName = "sql11399129";

    public function connect() : PDO
    {
        $dsn = 'mysql:host=' . self::HOST . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}