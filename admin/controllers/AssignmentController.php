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

    function AddAssignment($description, $filepath, $dueto, $filename)
    {
        $sql = "INSERT INTO Assignments (Description, FilePath, DueTo, FileName) 
            VALUES ('{$description}', '{$filepath}', '{$dueto}', '{$filename}')";

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
            $assign->setFileName($row["FileName"]);

            return $assign;
        }

        return null;
    }

    function ChangeAssignment($assignid, $filepath, $filename)
    {
        $sql = "UPDATE Assignments SET FilePath='{$filepath}', FileName='{$filename}' WHERE AssignmentID={$assignid}";

        if ($this->link->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    
    function DeleteAssignment($assignid){
        $sql = "DELETE FROM Assignments WHERE AssignmentID={$assignid}";

        if ($this->link->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
