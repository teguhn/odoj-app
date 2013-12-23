<div class="alert alert-block alert-success">
    Broadcast email telah berhasil dikirim
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
<h3>Penerima :</h3>
<p><?=implode(', ', $to)?></p>
<h3>Subject :</h3>
<p><?=$subject?></p>
<h3>Pesan :</h3>
<p><?=$message?></p>