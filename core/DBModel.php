<?php


namespace app\core;


class DBModel extends Database
{
    public function findAllLike($searchTerm)
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
            $statement->execute(array($searchTerm));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}