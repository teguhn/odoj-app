<?php
    // Form template
    function control($label,$var,$id='')
    {
        control_open($label,$id);
        echo $var;
        control_close();
    }
    function control_open($label,$id='',$size1="col-sm-2",$size2="col-sm-10")
    {
        echo '<div class="form-group">
                <label class="'.$size1.' control-label" for="'.$id.'">'.$label.'</label>
                <div class="'.$size2.'">';
    }
    function control_close()
    {
        echo '</div>
            </div>';
    }
    function input_text($label,$name,$val='',$attr='class="form-control"',$type='text')
    {
        if(!isset($val))$val='';
        control_open($label,$name);
        echo '<input type="'.$type.'" id="'.$name.'" name="'.$name.'" value="'.set_value($name,$val).'" '.$attr.' />
                '.form_error($name,'<span class="help-inline">','</span>');
        control_close();
    }
    function input_text_nl($name,$val='',$attr='class="form-control"',$size='col-sm-10',$type='text')
    {
        if(!isset($val))$val='';
        echo '<div class="'.$size.'"><input type="'.$type.'" id="'.$name.'" name="'.$name.'" value="'.set_value($name,$val).'" '.$attr.' /></div>';
    }
    function input_check($name,$val,$lcheck,$checked)
    {
        echo '<div class="checkbox"><label>';
        echo form_checkbox($name, $val, $checked,'class="checkbox"');
        echo ' '.$lcheck.'</label></div>';
    }
    function input_radio($lcheck,$name,$val,$checked = FALSE, $extra = '')
    {
        echo '<label>';
        echo form_radio($name, $val, $checked, $extra);
        echo ' '.$lcheck.'</label>';
    }
    function action($extra1='class="btn btn-primary"',$extra2='class="btn" onclick="history.go(-1)"')
    {
        echo '<div class="form-group"><div class="col-sm-offset-2 col-sm-10">';
        echo form_submit('submit', 'Simpan',$extra1).' '.form_button('cancel', 'Batal', $extra2);
        echo ' *wajib diisi</div></div>';
    }
    
    // Button template
    function btn_add($link,$extra='')
    {
        return '<a class="btn btn-primary" href="'.$link.'" '.$extra.'><span class="glyphicon glyphicon-asterisk"></span> Tambah</a>';
    }
    function btn_back($link,$extra='')
    {
        return '<a class="btn btn-mini" href="'.$link.'" '.$extra.'><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>';
    }
    function btn_edit($link,$extra='')
    {
        return '<a class="btn btn-mini" href="'.$link.'" '.$extra.'><span class="glyphicon glyphicon-edit"></span> Ubah</a>';
    }
    function btn_del($link,$extra='')
    {
        return '<a class="btn btn-mini btn-danger" href="'.$link.'" '.$extra.'><span class="glyphicon glyphicon-trash"></span> Hapus</a>';
    }
    function countries_list(){
        $country_list = array(
                        "Afghanistan",
                        "Albania",
                        "Algeria",
                        "Andorra",
                        "Angola",
                        "Antigua and Barbuda",
                        "Argentina",
                        "Armenia",
                        "Australia",
                        "Austria",
                        "Azerbaijan",
                        "Bahamas",
                        "Bahrain",
                        "Bangladesh",
                        "Barbados",
                        "Belarus",
                        "Belgium",
                        "Belize",
                        "Benin",
                        "Bhutan",
                        "Bolivia",
                        "Bosnia and Herzegovina",
                        "Botswana",
                        "Brazil",
                        "Brunei",
                        "Bulgaria",
                        "Burkina Faso",
                        "Burundi",
                        "Cambodia",
                        "Cameroon",
                        "Canada",
                        "Cape Verde",
                        "Central African Republic",
                        "Chad",
                        "Chile",
                        "China",
                        "Colombi",
                        "Comoros",
                        "Congo (Brazzaville)",
                        "Congo",
                        "Costa Rica",
                        "Cote d'Ivoire",
                        "Croatia",
                        "Cuba",
                        "Cyprus",
                        "Czech Republic",
                        "Denmark",
                        "Djibouti",
                        "Dominica",
                        "Dominican Republic",
                        "East Timor (Timor Timur)",
                        "Ecuador",
                        "Egypt",
                        "El Salvador",
                        "Equatorial Guinea",
                        "Eritrea",
                        "Estonia",
                        "Ethiopia",
                        "Fiji",
                        "Finland",
                        "France",
                        "Gabon",
                        "Gambia, The",
                        "Georgia",
                        "Germany",
                        "Ghana",
                        "Greece",
                        "Grenada",
                        "Guatemala",
                        "Guinea",
                        "Guinea-Bissau",
                        "Guyana",
                        "Haiti",
                        "Honduras",
                        "Hungary",
                        "Iceland",
                        "India",
                        "Indonesia",
                        "Iran",
                        "Iraq",
                        "Ireland",
                        "Israel",
                        "Italy",
                        "Jamaica",
                        "Japan",
                        "Jordan",
                        "Kazakhstan",
                        "Kenya",
                        "Kiribati",
                        "Korea, North",
                        "Korea, South",
                        "Kuwait",
                        "Kyrgyzstan",
                        "Laos",
                        "Latvia",
                        "Lebanon",
                        "Lesotho",
                        "Liberia",
                        "Libya",
                        "Liechtenstein",
                        "Lithuania",
                        "Luxembourg",
                        "Macedonia",
                        "Madagascar",
                        "Malawi",
                        "Malaysia",
                        "Maldives",
                        "Mali",
                        "Malta",
                        "Marshall Islands",
                        "Mauritania",
                        "Mauritius",
                        "Mexico",
                        "Micronesia",
                        "Moldova",
                        "Monaco",
                        "Mongolia",
                        "Morocco",
                        "Mozambique",
                        "Myanmar",
                        "Namibia",
                        "Nauru",
                        "Nepal",
                        "Netherlands",
                        "New Zealand",
                        "Nicaragua",
                        "Niger",
                        "Nigeria",
                        "Norway",
                        "Oman",
                        "Pakistan",
                        "Palau",
                        "Panama",
                        "Papua New Guinea",
                        "Paraguay",
                        "Peru",
                        "Philippines",
                        "Poland",
                        "Portugal",
                        "Qatar",
                        "Romania",
                        "Russia",
                        "Rwanda",
                        "Saint Kitts and Nevis",
                        "Saint Lucia",
                        "Saint Vincent",
                        "Samoa",
                        "San Marino",
                        "Sao Tome and Principe",
                        "Saudi Arabia",
                        "Senegal",
                        "Serbia and Montenegro",
                        "Seychelles",
                        "Sierra Leone",
                        "Singapore",
                        "Slovakia",
                        "Slovenia",
                        "Solomon Islands",
                        "Somalia",
                        "South Africa",
                        "Spain",
                        "Sri Lanka",
                        "Sudan",
                        "Suriname",
                        "Swaziland",
                        "Sweden",
                        "Switzerland",
                        "Syria",
                        "Taiwan",
                        "Tajikistan",
                        "Tanzania",
                        "Thailand",
                        "Togo",
                        "Tonga",
                        "Trinidad and Tobago",
                        "Tunisia",
                        "Turkey",
                        "Turkmenistan",
                        "Tuvalu",
                        "Uganda",
                        "Ukraine",
                        "United Arab Emirates",
                        "United Kingdom",
                        "United States",
                        "Uruguay",
                        "Uzbekistan",
                        "Vanuatu",
                        "Vatican City",
                        "Venezuela",
                        "Vietnam",
                        "Yemen",
                        "Zambia",
                        "Zimbabwe"
                );
        $cl=array(''=>'--Select a country--');
        foreach($country_list as $c){
            $cl[$c]=$c;
        }
        return $cl;
    }
?>
