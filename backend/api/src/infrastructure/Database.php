<?php

require_once 'src/includes/db.php';

class Database
{
    protected $connection = null;

    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DP_PORT);

            if (mysqli_connect_errno()) {
                throw new Exception('The MySQLi extension is not enabled. Please check the PHP configuration.');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select($query = "")
    {
        try {
            $stmt = $this->executeStatement($query);
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }

    public function insert($query = "")
    {
        try {
            $stmt = $this->executeStatement($query);
            $stmt->close();
            return $this->connection->insert_id;;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }

    public function executeQuery($query = "")
    {
        try {
            $stmt = $this->executeStatement($query);
            $numRowsAffected = $stmt->affected_rows; // Obtiene el número de filas afectadas
            $stmt->close();
            return $numRowsAffected > 0;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }

    private function executeStatement($query = "")
    {
        try {
            $stmt = $this->connection->prepare($query);
            if ($stmt === false) {
                throw new Exception("Unable to do prepared statement: " . $query);
            }

            $stmt->execute();
            return $stmt;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
