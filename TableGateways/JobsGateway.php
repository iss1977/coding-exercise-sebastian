<?php

namespace app\TableGateways;
use \app\core\Database;
use app\core\Application;

class JobsGateway
{
    private Database  $db;

    public function __construct()
    {
        $this->db = Application::$app->db;
    }

    public function findAll(): array
    {
        $statement = "
            SELECT jobs.id, title,location,date, companies.name as company_name,
            CONCAT(title,location, companies.name) AS SearchString
            FROM jobs
            INNER JOIN companies ON jobs.company_id = companies.id
            order BY jobs.date DESC;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }


}