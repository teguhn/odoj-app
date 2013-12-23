<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?=$title_page ?></title>
    </head>
    <body>
    <table width="100%" border="1" cellspacing="0">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($table_data as $u): ?>
        <tr>
            <td><?=$u['nama'] ?></td>
            <td><?=$u['username'] ?></td>
            <td><?=$u['email'] ?></td>
            <td><?=$u['role'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </body>
</html>
       