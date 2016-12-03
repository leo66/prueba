<?php

class database {

    private $host;
    private $user;
    private $pwd;
    private $bd;
    private $link;

    public function __construct($host = null, $user = null, $pwd = null, $bd = null) {
        $this->init();
        if ($host)
            $this->host = $host;
        if ($user)
            $this->user = $user;
        if ($pwd)
            $this->pwd = $pwd;
        if ($bd)
            $this->bd = $bd;
    }

    private function init() {
        $this->host = "localhost";
        $this->user = "root";
        $this->pwd = "";
        $this->bd = "app";
    }

    private function connect() {
        //   mysql_query('SET NAMES \'latin1_spanish_ci\'');  // set the correct charset encoding, Add for me "Jorge"
        //mysql_query('SET CHARACTER_SET \'latin1_spanish_ci\'');
        $this->init();
        $this->link = @mysql_connect($this->host, $this->user, $this->pwd);
        if (!$this->link)
            die("error: DB die, no connect");
        mysql_select_db($this->bd, $this->link);
        mysql_query("SET NAMES 'utf8'");
       // mysql_query("SET CHARACTER_SET 'utf8'");
    }

    private function close() {
        mysql_close($this->link);
    }

    public function insert($strsql) {
        $this->connect();
        if (!mysql_query($strsql)) {
            echo mysql_error();
            return null;
        }
        $id = mysql_insert_id($this->link);
        $this->close();
        return $id;
    }

    public function update($strsql) {
        $this->connect();
        if (!mysql_query($strsql)) {
            echo mysql_error();
            return null;
        }
        $ok = true;
        $this->close();
        return $ok;
    }

function select($CadSql)
    {
        $this->connect();
        $resultado=mysql_query($CadSql,$this->link);
        echo $resultado;
        return($resultado);
    }


/*
    public function select($qry) {

        $this->connect();
        $arr = array();
        $selec = mysql_query($qry, $this->link);
        if (!$selec) {
            echo mysql_error();
            return null;
        }
        while ($row = mysql_fetch_array($selec, MYSQL_ASSOC)) {
            $arr[] = $row;
        }
        mysql_free_result($selec);
        $this->close();
        echo "entro la consulta";
        
        return $arr;
    }
*/
}