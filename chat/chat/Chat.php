<?php

class Chat{

    public function __construct()
    {
        $this->pdo = new \PDO("mysql:host=localhost:3306;dbname=poll", "root", "root");
    }
    public function getMessages()
    {
        $query = $this->pdo->query("SELECT * FROM comment ORDER BY comment_id DESC LIMIT 0, 20");
        echo json_encode($query->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function postMessage($data)
    {
        $prepare = $this->pdo->prepare("INSERT INTO comment (message) VALUES (:message)");
        $prepare->execute($data);
        echo json_encode("");
    }
}