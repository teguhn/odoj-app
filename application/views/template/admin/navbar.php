<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
 
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          Menu 
      </a>
 
      <!-- Be sure to leave the brand out there if you want it shown -->
      <a class="brand" href="#">ISTB 2013</a>
 
      <!-- Everything you want hidden at 940px or less, place within here -->
      <div class="nav-collapse collapse">
        <!-- .nav, .navbar-search, .navbar-form, etc -->
        <?php $uri=$this->uri->segment(1).'/'.$this->uri->segment(2); ?>
        <?php
            $this->db->order_by('order','asc');
            $this->db->where('parent_id',0);
            $menu=$this->db->get('menu')->result_array();
        ?>
        <ul class="nav">
            <?php foreach($menu as $m): if($this->access->cek($m['link'])):?>
                <?php 
                    $this->db->order_by('order','asc');
                    $child_menu=$this->db->get_where('menu',array('parent_id'=>$m['id']))->result_array();
                    if(!$child_menu){
                ?>
            <li class="<?php if($uri==$m['link'])echo 'active'; ?>">
                <a href="<?=$m['link']?>"><?=$m['menu']?></a>
                <?php }else{ ?>
            <li class="dropdown <?php if($uri==$m['link'])echo 'active'; ?>">
                <a class="dropdown-toggle"  role="button" data-toggle="dropdown" data-target="<?=$m['link']?>"  href="<?=$m['link']?>" id="<?=$m['menu']?>">
                    <?=$m['menu']?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="<?=$m['menu']?>">
                    <?php foreach($child_menu as $cm): if($this->access->cek($cm['link'])):?>
                    <?php $uri2=$uri.'/'.$this->uri->segment(3); ?>
                    <li class="<?php if($cm['link']==$uri2)echo 'active' ?>">
                        <a href="<?=$cm['link']?>"><?=$cm['menu']?></a>
                    </li>
                    <?php endif; endforeach; ?>
                </ul>
                <?php } ?>
            </li>
            <?php endif; endforeach; ?>
        </ul>
        <ul class="nav pull-right">
            <li class="divider-vertical"></li>
            <li><a href="admin/index/logout">Logout</a></li>
        </ul>
      </div>
 
    </div>
  </div>
</div>