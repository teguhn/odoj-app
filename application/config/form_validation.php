<?php
$config = array(
    'user/add'=>array(
        array(
              'field'   => 'username', 
              'label'   => 'Username', 
              'rules'   => 'trim|required|max_length[20]|is_unique[user.username]'
           ),
        array(
              'field'   => 'password', 
              'label'   => 'Password', 
              'rules'   => 'trim|required|matches[passconf]|md5'
           ),
        array(
              'field'   => 'passconf', 
              'label'   => 'Password Confirmation', 
              'rules'   => 'trim|required'
           ),   
        array(
              'field'   => 'email', 
              'label'   => 'Email', 
              'rules'   => 'trim|required|valid_email|is_unique[user.email]'
           ),
        array(
            'field'=>'role_id',
            'label'=>'Role',
            'rules'=>'required'
        )
    ),
    'user/edit'=>array(
        array(
              'field'   => 'username', 
              'label'   => 'Username', 
              'rules'   => 'trim|required|max_length[20]'
           ),
        array(
              'field'   => 'password', 
              'label'   => 'Password', 
              'rules'   => 'trim|matches[passconf]|md5'
           ),
        array(
              'field'   => 'passconf', 
              'label'   => 'Password Confirmation', 
              'rules'   => 'trim'
           ),   
        array(
              'field'   => 'email', 
              'label'   => 'Email', 
              'rules'   => 'trim|required|valid_email'
           ),
        array(
            'field'=>'role_id',
            'label'=>'Role',
            'rules'=>'required'
        )
    ),
    'role'=>array(
        array(
            'field'=>'role',
            'label'=>'Role',
            'rules'=>'required',
        ),
        array(
            'field'=>'nicename',
            'label'=>'Nicename',
            'rules'=>'required',
        )
    ),
    'menu'=>array(
        array(
            'field'=>'menu',
            'label'=>'Menu',
            'rules'=>'required',
        ),
        array(
            'field'=>'link',
            'label'=>'Link',
            'rules'=>'required',
        ),
        array(
            'field'=>'role_id',
            'label'=>'Role',
            'rules'=>'required',
        )
    ),
    'profile/add'=>array(
        array(
            'field'=>'name',
            'label'=>'Nama Lengkap',
            'rules'=>'trim|required',
        ),
        array(
              'field'   => 'username', 
              'label'   => 'Username', 
              'rules'   => 'trim|required|max_length[20]|is_unique[user.username]'
           ),
        array(
              'field'   => 'password', 
              'label'   => 'Password', 
              'rules'   => 'trim|required|matches[passconf]|md5'
           ),
        array(
              'field'   => 'passconf', 
              'label'   => 'Konfirmasi Password', 
              'rules'   => 'trim|required'
           ),   
        array(
              'field'   => 'email', 
              'label'   => 'Email', 
              'rules'   => 'trim|required|valid_email'
           ),
        array(
            'field'=>'phone',
            'label'=>'Handphone',
            'rules'=>'trim|required',
        )
    ),
    'profile/broadcast'=>array(
        array(
            'field'=>'subject',
            'label'=>'Subject',
            'rules'=>'required',
        ),	
        array(
            'field'=>'pesan',
            'label'=>'Message',
            'rules'=>'required',
        ),	
    ),
    'profile/edit'=>array(
        array(
            'field'=>'name',
            'label'=>'Nama Lengkap',
            'rules'=>'trim|required',
        ),
        array(
              'field'   => 'username', 
              'label'   => 'Username', 
              'rules'   => 'trim|required|max_length[20]'
           ),
        array(
              'field'   => 'password', 
              'label'   => 'Password', 
              'rules'   => 'trim|matches[passconf]|md5'
           ),
        array(
              'field'   => 'passconf', 
              'label'   => 'Konfirmasi Password', 
              'rules'   => 'trim'
           ),   
        array(
              'field'   => 'email', 
              'label'   => 'Email', 
              'rules'   => 'trim|required|valid_email'
           ),
        array(
            'field'=>'phone',
            'label'=>'Telephone',
            'rules'=>'trim|required',
        )
    )
 );
?>
