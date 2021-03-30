<?php

class m001_initial
{
    public function up()
    {
        $SQL = "
            
            CREATE TABLE companies (
              id  INT NOT NULL AUTO_INCREMENT,
              name VARCHAR(255) NULL,
              PRIMARY KEY (id));

            CREATE TABLE jobs (
              id INT NOT NULL AUTO_INCREMENT,
              title VARCHAR(255) NULL,
              location VARCHAR(255) NULL,
              date DATE NULL,
              company_id INT NULL,
              PRIMARY KEY (id),
              INDEX company_id (company_id ASC) VISIBLE,
              CONSTRAINT companies
                FOREIGN KEY (company_id)
                REFERENCES companies (id)
                ON DELETE SET NULL
                );
                    ";
        $db= \app\core\Application::$app->db;
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $SQL = "
            DROP TABLE jobs;
            DROP TABLE companies;
            ";
        $db= \app\core\Application::$app->db;
        $db->pdo->exec($SQL);
    }
}