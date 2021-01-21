<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function registerLog($table, $table_id, $log)
    {
        Log::create([
            'user_id' => Auth::user()->id,
            'table_used' => $table,
            'table_id' => $table_id,
            'log' => $log,
        ]);
    }

    public static function cur_date($type = "date")
    {
        if ($type == "date") {
            $sql = "select curdate()";
        } else if ($type == "datetime") {
            $sql = "select now()";
        } else if ($type == "dayofweek") {
            $sql = "select dayofweek(NOW())";
        } else if ($type == "time") {
            $sql = "select time(NOW())";
        }

        return collect(DB::select($sql))->map(function ($x) {
            return (array) $x;
        })->toArray()[0]["curdate()"];
    }

    public static function array_cut($array)
    {
        $rst = array();

        if (is_array($array)) {
            foreach ($array as $array_1) {
                if (is_array($array_1)) {
                    foreach ($array_1 as $array_2) {
                        array_push($rst, $array_2);
                    }
                }
            }
        }

        return $rst;
    }

    public static function patent($p)
    {
        $id = array(
            0 => 'Adm',
            1 => 'Sd EV',
            2 => 'Sd EP',
            3 => 'Cb',
            4 => '3º Sgt',
            5 => '2º Sgt',
            6 => '1º Sgt',
            7 => 'S Ten',
            8 => 'Asp',
            9 => '2º Ten',
            10 => '1º Ten',
            11 => 'Cap',
            12 => 'Maj',
            13 => 'TC',
            14 => 'Cel',
            15 => 'Gen',
            16 => 'R2'
        );

        return strtr($p, $id);
    }

    public static function fullPatent($p)
    {
        $id = array(
            1 => 'Administrador',
            1 => 'Soldado EV',
            2 => 'Soldado EP',
            3 => 'Cabo',
            4 => '3º Sargento',
            5 => '2º Sargento',
            6 => '1º Sargento',
            7 => 'Sub Tenente',
            8 => 'Aspirante',
            9 => '2º Tenente',
            10 => '1º Tenente',
            11 => 'Capitão',
            12 => 'Major',
            13 => 'Tenente Coronel',
            14 => 'Coronel',
            15 => 'General',
            16 => 'Reserva não remunerada'
        );

        return strtr($p, $id);
    }

    public static function token($size)
    {
        return substr(bin2hex(random_bytes($size)), 0, $size);
    }

    public static function ifnull($p, $v)
    {
        if (empty($p)) {
            return $v;
        } else {
            return $p;
        }
    }

    public static function encrypt($plaintext, $password)
    {
        $method = "AES-256-CBC";
        $key = hash('sha256', $password, true);
        $iv = openssl_random_pseudo_bytes(16);

        $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);

        return $iv . $hash . $ciphertext;
    }

    public static function decrypt($ivHashCiphertext, $password)
    {
        $method = "AES-256-CBC";
        $iv = substr($ivHashCiphertext, 0, 16);
        $hash = substr($ivHashCiphertext, 16, 32);
        $ciphertext = substr($ivHashCiphertext, 48);
        $key = hash('sha256', $password, true);

        if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) {
            return null;
        }
        return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
    }

    public static function minuteToStr($m)
    {
        $h = floor($m / 60);
        $m = $m - ($h * 60);
        return $h . ":" . substr("00" . $m, -2, 2);
    }

    public static function dateToStr($d)
    {
        if ($d != "") {
            $d = explode("-", substr($d, 0, 10));
            return $d[2] . "/" . substr("00" . $d[1], -2, 2) . "/" . substr("00" . $d[0], -4, 4);
        } else {
            return "";
        }
    }

    public static function strToDate($d)
    {
        $d = substr($d, 3, 2) . "/" . substr($d, 0, 2) . "/" . substr($d, -4, 4);
        return date("Y-m-d", strtotime($d));
    }

    public static function strToDateTime($d, $t)
    {
        $d = Controller::strToDate($d);
        if (strlen($t) == 5) {
            $t = $t . ":00";
        }

        return $d . " " . $t;
    }

    public static function monthToNumber($month)
    {
        $month = strtolower($month);
        $m = [
            "janeiro" => "01",
            "fevereiro" => "02",
            "março" => "03",
            "abril" => "04",
            "maio" => "05",
            "junho" => "06",
            "julho" => "07",
            "agosto" => "08",
            "setembro" => "09",
            "outubro" => "10",
            "novembro" => "11",
            "dezembro" => "12"
        ];
        return $m[$month];
    }

    public static function getDateInLine($line)
    {
        $validityLine = str_replace(' ', '', $line);
        preg_match('/(\d{1,2})(de)(\D{1,})(de)(\d{4})/', $validityLine, $matches);

        $day = strlen($matches[1]) == 1 ? "0" . $matches[1] : $matches[1];
        $month = Controller::monthToNumber($matches[3]);
        $year = $matches[5];

        return date($year . "-" . $month . "-" . $day);
    }

    public static function addDateTime($date, $time = "+0 days", $format = 'Y-m-d')
    {
        return date($format, strtotime($date . $time));
    }

    public static function formatValue($str, $decimal = false, $qtdDecimals = 2)
    {
        $value = floatVal($str);
        if (!$decimal)  return number_format($value, $qtdDecimals, ',', '.');
        else  return number_format($value, $qtdDecimals);
    }

    public static function valueToStr($str, $decimal = false, $qtdDecimals = 2)
    {
        $value = floatVal($str);
        if (!$decimal)  return number_format($value, $qtdDecimals, ',', '.');
        else  return number_format($value, $qtdDecimals);
    }

    public static function strToValue($str)
    {
        return str_replace(",", ".", str_replace(".", "", $str));
    }


    public static function formatCnpjCpf($value)
    {
        $cnpj_cpf = preg_replace("/\D/", '', $value);

        if (strlen($cnpj_cpf) === 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
        }

        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }

    public static function sanitizeString($string)
    {
        $what = array('ä', 'ã', 'à', 'á', 'â', 'ê', 'ë', 'è', 'é', 'ï', 'ì', 'í', 'ö', 'õ', 'ò', 'ó', 'ô', 'ü', 'ù', 'ú', 'û', 'À', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ', 'ç', 'Ç', ' ', '-', '(', ')', ',', ';', ':', '|', '!', '"', '#', '$', '%', '&', '/', '=', '?', '~', '^', '>', '<', 'ª', 'º');

        $by   = array('a', 'a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'A', 'A', 'E', 'I', 'O', 'U', 'n', 'n', 'c', 'C', '_', '_', '', '', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '', '_', '_', '_', '_', '_', '_', '_', '');

        return str_replace($what, $by, $string);
    }

    public static function formatDate($date, $format = "d/m/Y")
    {
        return date_format(date_create($date), $format);
    }

    public static function addSimpleQuotes($string)
    {
        return "'" . str_replace(",", "','", $string) . "'";
    }

    public static function fullMonthToNumeric($month, $translate = false)
    {
        if ($translate) {
            $months = [
                "Janeiro" => '01',
                "Fevereiro" => '02',
                "Março" => '03',
                "Abril" => '04',
                "Maio" => '05',
                "Junho" => '06',
                "Julho" => '07',
                "Agosto" => '08',
                "Setembro" => '09',
                "Outubro" => '10',
                "Novembro" => '11',
                "Dezembro" => '12'
            ];
        } else {
            $months = [
                "January" => '01',
                "February" => '02',
                "March" => '03',
                "April" => '04',
                "May" => '05',
                "June" => '06',
                "July" => '07',
                "August" => '08',
                "September" => '09',
                "October" => '10',
                "November" => '11',
                "December" => '12'
            ];
        }

        foreach ($months as $full => $m) {
            if (strstr(utf8_decode($full), str_replace(["_", '.'], '', Controller::sanitizeString($month)))) {
                return $months[$full];
            }
        }
    }

    public static function strToDecimalDB($str)
    {
        return str_replace(",", ".", str_replace(".", '', $str));
    }

    public static function replaceAccentuation($string)
    {
        return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $string);
    }

    public static function jsonDecode($s, $debug = false)
    {
        $s = str_replace('\"', '{|QUOTES|}', $s);
        $s = preg_replace('/".*?"(*SKIP)(*FAIL)|("(.*?)"|(\w+))(\s*:\s*(".*?"|.))/s', '"$2$3"$4', $s);
        $s = str_replace('{|QUOTES|}', '\"', $s);
        if ($debug) {
            // echo $s;
        }
        $aux = json_decode($s);
        if ($aux == null) {
            //print_r($s);
        }
        return json_decode($s);
    }

    public static function jsonEncode($s)
    {
        return json_encode(($s), JSON_UNESCAPED_UNICODE);
    }
    public static function safeStr($s)
    {
        return str_replace(array("'"), array("&#39;"), $s);
    }
}
