<?php 
    class Database 
    {
        private $host="localhost";
        private $username="root";
        private $password="";
        private $database="discord";
        public $connection;

        public function getConnection() 
        {
            $this->connection=null;

            try 
            {
                $this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->username, $this->password);
                $this->connection->exec("set names utf8"); 
            } 
            catch (PDOException $exception)
            {
                echo "Error: ".$exception->getMessage();
                die();
            }

            return $this->connection;
        }

        public function select(...$parameters)
        {
            $request=getConnection()->prepare($parameters[1]);
            $request->execute(array($parameters[2]));

            while($d=fetch_assoc($request))
					{
						$pseudo=$d['pseudo'];
						$id=$d['id'];

						echo "<ul><li>
                        Pseudo : $pseudo <br>
                        ID : $id
						</li></ul>";
                    }
        }

        public function closeConnection()
        {
            $this->connection=null;
        }
    } 
?>
