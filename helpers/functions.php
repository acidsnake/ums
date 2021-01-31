<?php

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

function createRandomAge()
{
    return mt_rand(18, 99);
}
