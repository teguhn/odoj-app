<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?=$title_page ?></title>
        <style type="text/css">
        @page {
            margin-top: 0.6em;
            margin-bottom: 0.6em;
            margin-left: 1.5em;
            margin-right: 1.5em;
        }
        table{
            font-size: x-small;
        }
        </style>
    </head>
    <body>
        <h1 align="center">Paper ISTB 2013</h1>
        <p>
            Total : <?=$total_rows?> | Sudah upload : <?=$total_upload?> | Sudah fix : <?=$total_fix?>
        </p>

    <table width="100%" border="1" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Full Name</th>
        <?php foreach($field as $fd=>$fn): ?>
            <th><?=$fd ?></td>
        <?php endforeach; ?>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($table_data as $u): ?>
        <tr>
	    <td><?=$no++?></td>
            <td><?php echo $u['cn_first'].' '.$u['cn_last']?></td>
            <?php foreach($field as $fd=>$fn): ?>
            <?php if($fn=='section'){$s=explode(':',$u[$fn]);$u[$fn]=$s[0];} ?>
                <td><?=$u[$fn] ?></td>
            <?php endforeach; ?>
            <td><?php $u['file']=($u['file'])? 'Yes':'No'; echo $u['file']?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </body>
</html>
       