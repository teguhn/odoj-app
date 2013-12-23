<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?=$title_page ?></title>
    </head>
    <body>
<h2><?=$table_data['cn'] ?></h2>
    <table width="100%" cellspacing="0">
        <tbody>
            <?php foreach($field as $fd=>$fn): ?>
            <tr>
                <th width="30%"><?=$fd ?></th>
                <td><?=$table_data[$fn] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </body>
</html>
        