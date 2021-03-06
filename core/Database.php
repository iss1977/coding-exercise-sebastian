<?php


namespace app\core;


class Database
{

    public \PDO $pdo;

    /**
     * Database constructor. Setting up the connection to the database
     * @param array $config
     */
    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // if there is a connection problem, it will throw an error and will not pass unobserved.
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();//create if don't exists
        $alreadyAppliedMigrations = $this->getAppliedMigrations();

        $newMigrations =[];
        $files = scandir(Application::$ROOT_DIR.'/migrations');

        $toBeAppliedMigrations = array_diff($files,$alreadyAppliedMigrations); // only the not applied migrations will run.

        foreach ($toBeAppliedMigrations as $migration){
            if ($migration === '.' || $migration ==='..'){
                continue;
            }
            require_once Application::$ROOT_DIR.'/migrations/'.$migration;
            $classname = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $classname();
            $this->log("Applying migration $migration ...");
            $instance->up();
            $this->log("... done.".PHP_EOL);
            $newMigrations[]=$migration;
        }
        if (!empty($newMigrations)){
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("All migrations already applied");
        }


    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS migrations (
            id INT NOT NULL AUTO_INCREMENT,
            migration VARCHAR(255) NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            migrationscol VARCHAR(45) NULL,
            PRIMARY KEY (`id`));
        ");
    }

    public function getAppliedMigrations(): array
    {
        $statement =  $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    private function saveMigrations(array $newMigrations)
    {
        $str=array_map(fn($m)=>"('$m')", $newMigrations); // this transforms the filename from m0001_initial.php to ('m0001_initial.php') to be usable in the query statement
        $str = implode(',',$str); // to concatenate the array elements delimited with commas

        $statement = $this->pdo->prepare("INSERT INTO migrations(migration) VALUES $str");
        $statement->execute();
    }
    protected function log($message)
    {
        echo '['.date('Y-m-d H:i:s').'] - '.$message.PHP_EOL;
    }

    /** Helper method
     * @param $stm
     * @return false|\PDOStatement
     */
    public static function prepare($stm) // shortcut to Application::$app->db->pdo->prepare(). For easy access.
    {
        return Application::$app->db->pdo->prepare($stm); // returns a statement.
    }


    public function createMockData()
    {
        $this->log("Creating some companies...");

        $statement =  $this->pdo->prepare("
        INSERT INTO companies (id, name) VALUES (1, 'E-punkt');
        INSERT INTO companies (id, name) VALUES (2, 'Karriere.at');
        INSERT INTO companies (id, name) VALUES (3, 'Jobs.at');
        INSERT INTO companies (id, name) VALUES (4, 'M??ller GmbH'); 
        INSERT INTO companies (id, name) VALUES (5, 'Hazzard GmbH'); ");
        $statement->execute();

        $this->log("Creating some jobs...");
        $statement =  $this->pdo->prepare("
        INSERT INTO jobs (id,title, description, location, date, company_id)  VALUES (1,'Web Developer', 'Unsere 200 MitarbeiterInnen in Wien, Graz und Linz f??hren Kunden unterschiedlichster Branchen mit Know-How und einer gesunden Portion Verst??ndnis f??r das Menschliche in ihre sinnvolle, digitale Welt. Leidenschaft f??r Digitalisierung, florierende Expertise und autonomes, sinnstiftendes Handeln sind in unserer DNA ??? denn wir haben Digital im Blut!', 'Linz', '2021-03-20', '1');
        INSERT INTO jobs (id,title, description,location, date, company_id)  VALUES (2,'Java Coder', 'Die HAPEKO HR Executive Consultants sind die ersten Ansprechpartner f??r Fach- und F??hrungskr??fte in ??sterreich. Schwerpunkt der T??tigkeit ist das Schaffen von Verbindungen zwischen Spezialisten und F??hrungskr??ften mit einem beruflichen Ver??nderungswunsch und passenden Unternehmen. HAPEKO hat mehr als 15 Niederlassungen in ??sterreich und Deutschland.','Wien', '2021-03-21', '2');
        INSERT INTO jobs (id,title, description,location, date, company_id)  VALUES (3,'Javascript Genie','Du kannst dann mit uns gemeinsam in einem pers??nlichen Gespr??ch besprechen, in welchem Unternehmen der E-CONOMIX Group du eingebunden werden m??chtest (E-CONOMIX, Cyberhouse, Lemontec, KlickImpuls, DataReporter).', 'Leonding', '2021-03-22', '3');
        INSERT INTO jobs (id,title, description,location, date, company_id)  VALUES (4,'PHP Enwickler','Wir bei Anexia ??bernehmen jeden Tag Verantwortung f??r alle Herausforderungen der digitalen Welt. Denn wir verstehen uns als die ???Digital Transformation Engine???. Wie uns das gelingt? Ganz einfach. Wir sind eine Familie von M??glichmacher/innen und Neu-Denker/innen. Wir k??nnen, wir wollen und wir d??rfen auch. Und das macht uns einzigartig! Willst du ein Teil unserer digitalen Revolution werden und mit uns gemeinsam Geschichte schreiben? #joinourrevolution', 'Wien', '2021-03-25', '4');");
        $statement->execute();

        $statement =  $this->pdo->prepare("
        INSERT INTO jobs (id,title, description,location, date, company_id)  VALUES (5,'Game Changer','Wir ??bernehmen gerne Verantwortung, respektieren einander und wir wissen, dass wir alles schaffen k??nnen. Wir schauen gut auf Anexia und Anexia schaut auch gut auf uns. Begeisterung, Erfahrung und Kompetenz z??hlen, daher kannst du ein faires Gehalt und zahlreiche Benefits erwarten.', 'Linz', '2021-03-26', '5');
        INSERT INTO jobs (id,title, description,location, date, company_id)  VALUES (6,'Tester','Du magst es bunt und agil, findest Software-Entwicklung als eine der sch??nsten Aufgaben der Welt und liebst es an herausfordernden Entwicklerfragen zu t??fteln? Dann bist du bei uns im Team genau richtig, denn wir wollen unsere Kunden/innen gl??cklich machen und uns permanent weiterentwickeln.', 'Linz', '2021-03-28', '4');
        INSERT INTO jobs (id,title, description,location, date, company_id)  VALUES (7,'Java Developer','Mit unserer Cloud Management Plattform ???Anexia Engine??? bieten wir unseren Kunden_innen diverse Cloud-Services in Selbstverwaltung an. Beginnend bei Basis-Services wie Domains und DNS, ??ber Virtuelle Server bis hin zu L??sungen im Big Data-Umfeld', 'Wien', '2021-03-29', '5');    ");
        $statement->execute();
        $this->log("done.");
    }

}