<?php

require_once '../../admin/dbconnect/dbconnection.php';
require_once '../../admin/models/Assignment.php';

class AssignmentController
{
    private $link;

    function __construct()
    {
        $dbconnect = new DBConnect();
        $this->link = $dbconnect->InitConnect();
    }

    function AddAssignment($description, $filepath, $dueto)
    {
        $sql = "INSERT INTO Assignments (Description, FilePath, DueTo) 
            VALUES ('{$description}', '{$filepath}', '{$dueto}')";

        if ($this->link->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function GetAllAssignments()
    {
        $assignList = [];
        $sql = "SELECT * FROM Assignments";

        $rs = $this->link->query($sql);

        if ($rs->num_rows > 0) {
            while ($row = $rs->fetch_assoc()) {
                $assign = new Assignment();
                $assign->setAssignmentID($row["AssignmentID"]);
                $assign->setDescription($row["Description"]);
                $assign->setDueTo(date("H:i d-m-Y", strtotime($row["DueTo"])));
                $assign->setFilePath($row["FilePath"]);

                array_push($assignList, $assign);
            }
        }

        return $assignList;
    }

    function GetAssignmentById($assignId)
    {
        $sql = "SELECT * FROM Assignments WHERE AssignmentID={$assignId}";

        $rs = $this->link->query($sql);

        if ($rs->num_rows > 0) {
            $row = $rs->fetch_assoc();
            $assign = new Assignment();
            $assign->setAssignmentID($row["AssignmentID"]);
            $assign->setDescription($row["Description"]);
            $assign->setDueTo(date("H:i d-m-Y", strtotime($row["DueTo"])));
            $assign->setFilePath($row["FilePath"]);

            return $assign;
        }
        
        return null;
    }
}
