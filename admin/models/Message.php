<?php

class Message
{
    private $MessageID;
    private $Content;
    private $SendID;
    private $ReceiveID;
    private $Seen;

    function getMessageID()
    {
        return $this->MessageID;
    }
    function getContent()
    {
        return $this->Content;
    }
    function getSendID()
    {
        return $this->SendID;
    }
    function getReceiveID()
    {
        return $this->ReceiveID;
    }
    function getSeen()
    {
        return $this->Seen;
    }

    function setMessageID($MessageID): void
    {
        $this->MessageID = $MessageID;
    }
    function setContent($Content): void
    {
        $this->Content = $Content;
    }
    function setSendID($SendID): void
    {
        $this->SendID = $SendID;
    }
    function setReceiveID($ReceiveID): void
    {
        $this->ReceiveID = $ReceiveID;
    }
    function setSeen($Seen): void
    {
        $this->Seen = $Seen;
    }
}
