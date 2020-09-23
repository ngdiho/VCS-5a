<?php

require_once '../../admin/dbconnect/dbconnection.php';
require_once '../../admin/models/Challenge.php';

class ChallengeController
{
    private $link;

    function __construct()
    {
        $dbconnect = new DBConnect();
        $this->link = $dbconnect->InitConnect();
    }

    function AddChallenge($challengename, $hint, $filepath, $filename)
    {
        $sql = "INSERT INTO Challenges (ChallengeName, Hint, FilePath, FileName) 
            VALUES ('{$challengename}','{$hint}', '{$filepath}', '{$filename}')";

        if ($this->link->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function GetAllChallenge()
    {
        $sql = "SELECT * FROM Challenges";
        $challenges = [];

        $rs = $this->link->query($sql);

        if ($rs->num_rows > 0) {
            while ($row = $rs->fetch_assoc()) {
                $chal = new Challenge();
                $chal->setChallengeID($row["ChallengeID"]);
                $chal->setChallengeName($row["ChallengeName"]);

                array_push($challenges, $chal);
            }
        }

        return $challenges;
    }

    function GetChallengeById($chalid)
    {
        $sql = "SELECT * FROM Challenges WHERE ChallengeID=" . $chalid;

        $rs = $this->link->query($sql);
        $row = $rs->fetch_assoc();

        $chal = new Challenge();
        $chal->setChallengeID($row["ChallengeID"]);
        $chal->setChallengeName($row["ChallengeName"]);
        $chal->setHint($row["Hint"]);
        $chal->setFileName($row["FileName"]);
        $chal->setFilePath($row["FilePath"]);

        return $chal;
    }

    function DeleteChallenge($chalid)
    {
        $sql = "DELETE FROM Challenges WHERE ChallengeID=" . $chalid;

        if ($this->link->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function CheckAnswer($chalid, $answer)
    {
        $sql = "SELECT * FROM Challenges WHERE ChallengeID=" . $chalid;

        $rs = $this->link->query($sql);
        $row = $rs->fetch_assoc();

        $filename=$row["FileName"];

        if($filename == $answer){
            return 1;
        }
        else {
            return 0;
        }
    }
}
