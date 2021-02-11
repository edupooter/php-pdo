<?php

namespace Foo\Models;

use \PDO;

class FooModel
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllFoos()
    {
        $sql = 'SELECT * FROM posts';

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $this->db->prepare($sql);

        $statement->setFetchMode(PDO::FETCH_OBJ);

        $statement->execute();

        return $statement->fetchAll();
    }
}
