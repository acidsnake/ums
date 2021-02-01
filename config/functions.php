<?php

require_once 'connection.php';

// Recupera un parametro di configurazione
function getConfig($property)
{
    $config = require 'database.php';
    return array_key_exists($property, $config) ? $config[$property] : null;
}

// Recupera parametro passato via GET o POST
function getParam($param, $default = null)
{
    return !empty($_REQUEST[$param]) ? $_REQUEST[$param] : $default;
}

// Generare nome random
function createRandomUser(): string
{
    $names = [
        'Giovanni', 'Marta', 'Marco', 'Maria', 'Anna', 'Giuseppe', 'Sofia'
    ];
    $surnames = [
        'Re', 'Smith', 'Mendoza', 'Cruz', 'Garibaldi', 'Ponti'
    ];

    $rand1 = mt_rand(0, count($names) - 1);
    $rand2 = mt_rand(0, count($surnames) - 1);

    return $names[$rand1] . ' ' . $surnames[$rand2];
}

// Generare email random
function createRandomEmail(string $name): string
{
    $domains = [
        'gmail.com', 'yahoo.com', 'hotmail.it'
    ];

    $rand = mt_rand(0, count($domains) - 1);

    $name = strtolower(str_replace(' ', '.', $name));

    return $name . '@' . $domains[$rand];
}

// Generare codice fiscale random
function createRandomFiscalCode()
{
    $num = 16;
    $result = '';

    while ($num > 0) {
        // Genera lettere casuali basandosi sulla codifica ascii
        // Otteniamo un numero tra 65 e 90 (corrispondente di a-z sulla tabella ascii)
        // Convertiamo il numero in lettera con la funzione chr

        $result .= chr(mt_rand(65, 90));

        $num--;
    }

    return $result;
}

// Generare età random
function createRandomAge()
{
    return mt_rand(18, 99);
}

// Inserisci utenti random
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

// Select utenti
function getUsers(array $params = [])
{

    $conn = $GLOBALS['conn'];

    $records = [];

    $limit = getConfig('recordsPerPage');

    if (!$limit) {
        $limit = 10;
    }

    $sql = "SELECT * FROM users LIMIT $limit";

    $result = $conn->query($sql);

    if ($result) {
        // Ciclo finchè fetch_assoc non ritorna false
        while ($row = $result->fetch_assoc()) {
            $records[] = $row;
        }
    }

    return $records;
}

// Delete utenti
function delateAllRecords(string $table, mysqli $conn)
{
    $sql = "DELETE FROM $table";
    $result = $conn->query($sql);

    if (!$result) {
        die($conn->error);
    };

    return $result;
}
