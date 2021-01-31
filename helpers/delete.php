<?php

require_once('../config/connection.php');

function delateAllRecords(string $table, mysqli $conn)
{
    $sql = "DELETE FROM $table";
    $result = $conn->query($sql);

    if (!$result) {
        die($conn->error);
    };

    return $result;
}
