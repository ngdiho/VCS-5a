<?php
require_once '../../admin/dbconnect/dbconnection.php';
require_once '../../admin/models/Message.php';

session_start();

class MessageController
{
    private $link;

    function __construct()
    {
        $this->link = InitConnect();
    }

    function SendMessage($content, $createdate, $sendid, $receiveid)
    {
        $sql = "INSERT INTO Messages (Content, CreateDate, SendID, ReceiveID, Seen) 
            VALUES ('{$content}', '{$createdate}', '{$sendid}', '{$receiveid}', FALSE)";

        if ($this->link->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
