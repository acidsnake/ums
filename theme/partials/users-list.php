<?php if (!empty($users)) : ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome utente</th>
                <th scope="col">Email</th>
                <th scope="col">Codice fiscale</th>
                <th scope="col">Età</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['username'] ?></td=>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['fiscalcode'] ?></tdope=>
                    <td><?= $user['age'] ?></tdscope=>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p class="text-center">Nessun record trovato</p>
<?php endif; ?>