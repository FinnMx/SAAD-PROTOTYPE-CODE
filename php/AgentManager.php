<?php
class AgentManager{

    private $_isLoggedIn;
    private $dbpath;
    private $PrivilegeGroup;

    function __construct()
    {
        $this->dbpath = "./php/db/database.db";
    }

    public function isValidLogin($username,$password){
        $db = new SQLite3($this->dbpath);

        $stmt = $db->prepare("SELECT * FROM Agents WHERE StaffID= :staffid AND Password= :password");
        $stmt->bindParam(':staffid', $username);
        $stmt->bindParam(':password', $password);
        $result = ($stmt->execute())->fetchArray(SQLITE3_ASSOC);

        if(empty($result)){
            $this->_isLoggedIn = false;
        }
        else{
            $this->PrivilegeGroup = $result["PrivilegeGroup"];
            $this->_isLoggedIn = true;
        }
        $db->close();
    }

    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }

    public function getApplications(){
        $db = new SQLite3($this->dbpath);

        $stmt = $db->prepare("SELECT * FROM Applications");
        $result = ($stmt->execute());

        $arr = array();
        while($row = $result->fetchArray(SQLITE3_ASSOC)){
            array_push($arr,$row);
        }

        return $arr;
    }

    public function getApplicationsFil($filter){
        $filterType = "ApplicationID";
        if(strlen($filter) < 15){
            $filterType = "ApplicantID";
        }
        $db = new SQLite3($this->dbpath);

        $stmt = $db->prepare("SELECT * FROM Applications WHERE ".$filterType." = :fil");
        $stmt->bindParam(':fil', $filter);
        $result = ($stmt->execute());
        
        var_dump($result);

        $arr = array();
        while($row = $result->fetchArray(SQLITE3_ASSOC)){
            array_push($arr,$row);
        }

        return $arr;
    }

    public function updateApplication($applicationData,$appID){
        $db = new SQLite3($this->dbpath);
        $stmt = $db->prepare("UPDATE Applications SET ApplicationData = :appdata WHERE ApplicationID = :appid");
        $stmt->bindParam(':appdata',$applicationData);
        $stmt->bindParam(':appid',$appID);
        $stmt->execute();
        $db->close();
    }
}
?>