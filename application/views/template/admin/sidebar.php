        <?php $uri=$this->uri->segment(1).'/'.$this->uri->segment(2); ?>
        <?php $parent=$this->db->get_where('menu',array('link'=>$uri))->row_array();?>
        <?php 
            $this->db->order_by('order','asc');
            $menu=$this->db->get_where('menu',array('parent_id'=>$parent['id']))->result_array();
        ?>
        <ul class="nav nav-tabs nav-stacked">
            <?php foreach($menu as $m): if($this->access->cek($m['link'])):?>
            <li class="<?php if($uri.'/'.$this->uri->segment(3)==$m['link'])echo 'active' ?>">
                <a href="<?=$m['link']?>">
                    <?=$m['menu']?>
                    <div class="pull-right"><i class="icon-chevron-right"></i></div>
                </a>
            </li>
            <?php endif; endforeach; ?>
        </ul>