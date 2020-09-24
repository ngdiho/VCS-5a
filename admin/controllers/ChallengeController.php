<?php

require_once '../../admin/dbconnect/dbconnection.php';
require_once '../../admin/models/Challenge.php';
require_once '../../public/config/routes.php';
require_once 'HistoryController.php';

class ChallengeController
{
    private $link;

    function __construct()
    {
        $dbconnect = new DBConnect();
        $this->link = $dbconnect->InitConnect();
    }

    function AddChallenge($challengename, $hint, $filepath, $filename, $folder)
    {
        $sql = "INSERT INTO Challenges (ChallengeName, Hint, FilePath, FileName, Folder) 
            VALUES ('{$challengename}','{$hint}', '{$filepath}', '{$filename}', '{$folder}')";

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

        $historyController = new HistoryController();
        $chal->setHistories($historyController->LoadHistory($chalid));

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

        $folder = $row["Folder"];
        $filepath = $_SERVER['DOCUMENT_ROOT'] . ROUTE_CHALLENGE_FILE . $folder . "/";
        $output = shell_exec('ls ' . $filepath);
        $filename = substr($output, 0, strrpos($output, "."));

        if ($filename == $answer) {
            return 1;
        } else {
            return 0;
        }

        // $sql = "SELECT * FROM Challenges WHERE ChallengeID=" . $chalid;

        // $rs = $this->link->query($sql);
        // $row = $rs->fetch_assoc();

        // $folder = $row["Folder"];
        // $filepath = $_SERVER['DOCUMENT_ROOT'] . ROUTE_CHALLENGE_FILE . $folder . "/";
        // $output = scandir($filepath);
        // $filename = substr($output[2], 0, strrpos($output[2], "."));

        // if ($filename == $answer) {
        //     return 1;
        // } else {
        //     return 0;
        // }
    }
}
