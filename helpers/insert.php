<?php

require_once('../config/connection.php');
require_once('functions.php');

function insertRandomUsers(int $maxRecords, string $table, mysqli $conn)
{
    while ($maxRecords > 0) {

        $username = createRandomUser();
        $email = createRandomEmail($username);
        $fiscalcode = createRandomFiscalCode();
        $age = createRandomAge();

        $sql = "INSERT INTO $table (username, email, fiscalcode, age) VALUES ";
        $sql .= "('$username', '$email', '$fiscalcode', $age)";

        $result = $conn->query($sql);

        if (!$result) {
            die($conn->error);
        } else {
            $maxRecords--;
        }
    }

    return $result;
}

function printUsers(mysqli $conn)
{
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    var_dump($result->fetch_all(MYSQLI_ASSOC));
}
printUsers($conn);
