<?php
if (!function_exists('segment_translate')) {
    function segment_translate($segment)
    {
        switch ($segment) {
            case "home":
                return 'Beranda';
                break;
            case "history":
                return 'Riwayat';
                break;
            case "report":
                return 'Laporan';
                break;
            case "user":
                return 'Pengguna';
                break;
            case "profile":
                return 'Profil';
                break;
            case "detail":
                return 'Detail';
                break;
            default:
                NULL;
        }
    }
}

if (!function_exists('filter_filename')) {
    function filter_filename($filename)
    {
        $extension = substr($filename, strripos($filename, ".") + 1);
        $filename  = substr($filename, 0, strripos($filename, "."));

        $bad = array("<", ">", ":", '"', "/", "\\", "|", "?", "*", "(", ")", "@", "&", "!", ";", ",", ".", " ");
        $filename = str_replace($bad, "_", $filename);
        return $filename . "." . $extension;
    }
}

if (!function_exists('price_conversion')) {
    function price_conversion($price)
    {
        return "Rp. " . number_format(intval($price), 0, ",", ".");
    }
}

if (!function_exists('datetime_conversion')) {
    function datetime_conversion($datetime, $format = 'long')
    {
        if ($format == 'long') {
            return date('d F Y H:i:s', strtotime($datetime));
        } elseif ($format == 'medium') {
            return date('d/m/Y H:i', strtotime($datetime));
        } elseif ($format == 'short') {
            return date('d/m/Y', strtotime($datetime));
        } else {
            return NULL;
        }
    }
}
