<?php
  class Conection
  {
    private $servername = "50.116.87.248";
    private $username = "safepi22_test";
    private $password = "test@1234";
    private $database  = "safepi22_test";
    private $connection = false;

    public function __construct()
    {
      try {
        $servername = $this->servername;
        $username = $this->username;
        $password = $this->password;
        $database  = $this->database;
        $this->connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    }

    public function getConn() {
      return $this->connection;
    }


  }

  class User extends Conection
  {
    public function getUsers() {
      $conn = $this->getConn();
      $sql = 'select * from users order by name asc';
      foreach ($conn->query($sql) as $row) {
          echo $row['name'] . "<br / >";
      }
    }
  }

  $user = new User();
  $user->getUsers();

?>