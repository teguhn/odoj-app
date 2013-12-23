<div class="btn-group">
    <?=$this->tmpl->btn_back('admin/user'); ?> 
    <?=$this->tmpl->btn_edit('admin/user/edit/'.$table_data['id_user']); ?> 
    <?=$this->tmpl->btn_del('admin/user/delete/'.$table_data['id_user']); ?>
</div>
<table class="table table-striped">
    <tbody>
        <tr>
            <th>Nama</th>
            <td><?=$table_data['nama'] ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?=$table_data['username'] ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$table_data['email'] ?></td>
        </tr>
        <tr>
            <th>Role</th>
            <td><?=$table_data['role'] ?></td>
        </tr>
    </tbody>
</table>