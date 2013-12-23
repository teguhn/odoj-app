<?php
if ( !function_exists('format_date') )
{

    /**
     * Generate Unix time to formated date (in Bahasa Indonesia)
     *
     * @param int $unixtime
     * @param bool $hour
     * @return string
     */
    function format_date($unixtime = 0, $hour = false)
    {
        $CI = & get_instance();
        $CI->load->language('calendar');

        // ambil indeks bahasa dari calendar_lang.php
        $months = array(
            '01' => $CI->lang->line('cal_january'),
            '02' => $CI->lang->line('cal_february'),
            '03' => $CI->lang->line('cal_march'),
            '04' => $CI->lang->line('cal_april'),
            '05' => $CI->lang->line('cal_may'),
            '06' => $CI->lang->line('cal_june'),
            '07' => $CI->lang->line('cal_july'),
            '08' => $CI->lang->line('cal_august'),
            '09' => $CI->lang->line('cal_september'),
            '10' => $CI->lang->line('cal_october'),
            '11' => $CI->lang->line('cal_november'),
            '12' => $CI->lang->line('cal_december'),
        );

        $month = $months[date('m', $unixtime)];
        if ( $hour == true )
        {
            // menampilkan tanggal dan jam
            return sprintf('%s %s %s %s', date('d', $unixtime), $month, date('Y', $unixtime), date('H:i', $unixtime));
        }

        // menampilkan tanggal saja
        return sprintf('%s %s %s', date('d', $unixtime), $month, date('Y', $unixtime));
    }

}
    function get_month_name($idx){
        $arr_month = array(
            'Januari','Februari','Maret',
            'April','Mei','Juni','Juli','Agustus',
            'September','Oktober','November','Desember'
        );
        return $arr_month[$idx-1];
    }
    function get_day_name($idx){
        $arr_date = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
        return $arr_date[$idx-1];
    }
    
    function dmytoyymd($in){
        $obj_date=  date_create_from_format('d-m-Y', $in);
        return date_format($obj_date, 'Y-m-d');
    }
    function ymdtodmyy($in){
        //merubah format tanggal yy-mm-dd jadi dd-mm-yyyy
        if($in=="0000-00-00"){echo 'Tidak ada data';}else{
            $obj_date=  date_create_from_format('Y-m-d', $in);
            echo date_format($obj_date, 'd-m-Y');
        }
    }
    function ymdtodmy($in){
        //merubah format tanggal yy-mm-dd jadi dd-mm-yy
        if($in=="0000-00-00"){echo 'Tidak ada data';}else{
            $obj_date=  date_create_from_format('Y-m-d', $in);
            echo date_format($obj_date, 'd-m-y');
        }
    }
    function dmmyytoyymd($in){
        //merubah format dari model 09 Jan 2012 ke 2012-01-09
        $part = explode(' ',$in);
        return $part[2].'-'.$this->index_bulan_ina($part[1]).'-'.$part[0];
    }
    
    function yymdtodmmyy($in){
        //merubah ke tanggal indonesia
        $bulan=array(
            '','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
        );
        $obj_date=  date_create_from_format('Y-m-d', $in);
        echo date_format($obj_date, 'j').' '.$bulan[date_format($obj_date, 'n')].' '.date_format($obj_date, 'Y');
    }
        
    function index_bulan_ina($bulan){
        if(strcasecmp($bulan,'jan')==0||strcasecmp($bulan,'januari')==0){
            return '01';
        }else if(strcasecmp($bulan,'feb')==0||strcasecmp($bulan,'februari')==0){
            return '02';
        }else if(strcasecmp($bulan,'mar')==0||strcasecmp($bulan,'maret')==0){
            return '03';
        }else if(strcasecmp($bulan,'apr')==0||strcasecmp($bulan,'april')==0){
            return '04';
        }else if(strcasecmp($bulan,'mei')==0||strcasecmp($bulan,'mei')==0){
            return '05';
        }else if(strcasecmp($bulan,'jun')==0||strcasecmp($bulan,'juni')==0){
            return '06';
        }else if(strcasecmp($bulan,'jul')==0||strcasecmp($bulan,'juli')==0){
            return '07';
        }else if(strcasecmp($bulan,'agu')==0||strcasecmp($bulan,'agustus')==0){
            return '08';
        }else if(strcasecmp($bulan,'sep')==0||strcasecmp($bulan,'september')==0){
            return '09';
        }else if(strcasecmp($bulan,'okt')==0||strcasecmp($bulan,'oktober')==0){
            return '10';
        }else if(strcasecmp($bulan,'nov')==0||strcasecmp($bulan,'noember')==0){
            return '11';
        }else if(strcasecmp($bulan,'des')==0||strcasecmp($bulan,'desember')==0){
            return '12';
        }
    }
    
    function extract_date($in){
        $obj_date=  date_create_from_format('Y-m-d H:i:s', $in);
        
        $a[] = date_format($obj_date, 'Y');
        $a[] = date_format($obj_date, 'n')-1;
        $a[] = date_format($obj_date, 'j');
        $a[] = date_format($obj_date, 'G');
        $a[] = date_format($obj_date, 'i');
        $a[] = date_format($obj_date, 's');
        return implode(', ', $a);
    }
    
    function createDateRangeArray($strDateFrom,$strDateTo) {
        // takes two dates formatted as YYYY-MM-DD and creates an
        // inclusive array of the dates between the from and to dates.

        // could test validity of dates here but I'm already doing
        // that in the main script

        $aryRange=array();

        $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
        $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

        if ($iDateTo>=$iDateFrom) {
            array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry

            while ($iDateFrom<$iDateTo) {
                $iDateFrom+=86400; // add 24 hours
                array_push($aryRange,date('Y-m-d',$iDateFrom));
            }
        }
        return $aryRange;
    }
/* end of file helpers/MY_date_helper.php */
