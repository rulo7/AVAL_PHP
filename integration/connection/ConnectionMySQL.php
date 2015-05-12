<?php

require_once __DIR__.'/IConnection.php';

class ConnectionMySQL implements IConnection{

    
    private $hostName;
    private $user;
    private $password;
    private $dataBaseName;
    private $mysqli;
    
    public function __construct($hostName, $user, $password, $dataBaseName) {
        $this->hostName = $hostName;
        $this->user = $user;
        $this->password = $password;
        $this->dataBaseName = $dataBaseName;
    }

        

    private function connect() {
        $this->mysqli = new mysqli(DataConstants::$hostName, DataConstants::$user, DataConstants::$password, DataConstants::$dataBaseName);
        if ($this->mysqli->connect_errno) {
            return false;
        } else {
            return true;
        }
    }

    private function disconnect() {
        $this->mysqli->close();
    }

    /**
     * Realiza algun tipo de escritura sobre la base de datos.
     * @param sentencia-query sql
     * @throws Exception
     */
    public function write($query) {
        if (!$this->connect()) {
            throw new Exception("no se pudo conectar con la base de datos");
        } else {
            $data = $this->mysqli->query($query);
            $this->disconnect();

            if (!$data) {
                throw new Exception("error en la sentencia sql");
            }
        }
    }

    /**
     * Devuelve una tabla cuyas filas contienen los registros extraido en la consulta
     * y las columnas contienen el valor del atributo en concreto del registro.
     * registro[numfila][atributo]
     * e.g: array[0]["password"] - muestra el campo password de la primera fila obtenida de la consulta
     * 
     * @param sentencia-query sql
     * @return false si no hay resultados o array con el valor de la consulta
     * @throws Exception
     */
    public function read($query) {

        if (!$this->connect()) {
            throw new Exception("no se pudo conectar con la base de datos");
        } else {
            $data = $this->mysqli->query($query);
            $this->disconnect();

            if ($data) {
                $i = 0;
                while ($row = $data->fetch_assoc()) {
                    $result[$i] = $row;
                    $i++;
                }

                return ($i > 0) ? $result : false;
            } else {
                throw new Exception("error en la sentencia sql");
            }
        }
    }

}
