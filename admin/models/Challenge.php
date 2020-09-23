<?php

class Challenge{
    private $ChallengeID;
    private $ChallengeName;
    private $Hint;
    private $FilePath;
    private $FileName;

    function getChallengeID()
    {
        return $this->ChallengeID;
    }
    function getFilePath()
    {
        return $this->FilePath;
    }
    function getFileName()
    {
        return $this->FileName;
    }
    function getHint()
    {
        return $this->Hint;
    }
    function getChallengeName()
    {
        return $this->ChallengeName;
    }

    function setChallengeName($ChallengeName): void
    {
        $this->ChallengeName = $ChallengeName;
    }

    function setHint($Hint): void
    {
        $this->Hint = $Hint;
    }

    function setChallengeID($ChallengeID): void
    {
        $this->ChallengeID = $ChallengeID;
    }
    function setFilePath($FilePath): void
    {
        $this->FilePath = $FilePath;
    }
    function setFileName($FileName): void
    {
        $this->FileName = $FileName;
    }
}