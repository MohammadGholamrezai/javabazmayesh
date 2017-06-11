<?php namespace App\Providers\Helpers\PersianDate;

use Symfony\Component\VarDumper\Cloner\Data;

if (class_exists('PersianDate'))
    return;

class PersianDate
{
    // Version 1.2

    static $pdateWeekName = array(
        "شنبه",
        "یکشنبه",
        "دوشنبه",
        "سه شنبه",
        "چهارشنبه",
        "پنج شنبه",
        "جمعه");
    static $pdateWeekNameWithKey = array(
        "sat" => "شنبه",
        "sun" => "یکشنبه",
        "mon" => "دوشنبه",
        "tue" => "سه شنبه",
        "wed" => "چهارشنبه",
        "thu" => "پنج شنبه",
        "fri" => "جمعه");
    static $pdateMonthName = array(
        "",
        "فروردین",
        "اردیبهشت",
        "خرداد",
        "تیر",
        "مرداد",
        "شهریور",
        "مهر",
        "آبان",
        "آذر",
        "دی",
        "بهمن",
        "اسفند");
    static $MonthDays = array(0, 31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);

    public static function pdate($format, $timestamp = "")
    {
        //global $pdateMonthName,$pdateWeekName,$MonthDays;
        if ($timestamp === "") {
            $timestamp = time();
        }

        // Create need date parametrs
        $date = date("Y-m-d-w", $timestamp);
        list($gYear, $gMonth, $gDay, $gWeek) = explode('-', $date);
        list($pYear, $pMonth, $pDay) = PersianDate::gregorian_to_jalali($gYear, $gMonth, $gDay);
        $pWeek = $gWeek + 1;
        if ($pWeek == 7) $pWeek = 0;

        $lenghFormat = strlen($format);
        $i = 0;
        $result = "";
        while ($i < $lenghFormat) {
            $par = $format{$i};
            if ($par == '\\') {
                $result .= $format{++$i};
                $i++;
                continue;
            }
            switch ($par) {
                //Day
                case 'd':
                    $result .= ($pDay < 10) ? "0" . $pDay : $pDay;
                    break;

                case 'D':
                    $result .= substr(PersianDate::$pdateWeekName[$pWeek], 0, 2);
                    break;

                case 'j':
                    $result .= $pDay;
                    break;

                case 'l':
                    $result .= PersianDate::$pdateWeekName[$pWeek];
                    break;

                case 'N':
                    $result .= $pWeek + 1;
                    break;

                case 'w':
                    $result .= $pWeek;
                    break;

                case 'z':
                    $result .= DayOfYear($pYear, $pMonth, $pDay);
                    break;

                case 'S':
                    $result .= "م";
                    break;

                //Week
                case 'W':
                    $result .= ceil(DayOfYear($pYear, $pMonth, $pDay) / 7);
                    break;

                //Month
                case 'F':
                    $result .= PersianDate::$pdateMonthName[$pMonth];
                    break;

                case 'm':
                    $result .= ($pMonth < 10) ? "0" . $pMonth : $pMonth;
                    break;

                case 'M':
                    $result .= substr(PersianDate::$pdateMonthName[$pMonth], 0, 6);
                    break;

                case 'n':
                    $result .= $pMonth;
                    break;

                case 't':
                    $result .= (isKabise($pYear) and $pMonth == 12) ? 30 : PersianDate::$MonthDays[$pMonth];
                    break;

                //Years
                case 'L':
                    $result .= (int)isKabise($pYear);
                    break;

                case 'Y':
                case 'o':
                    $result .= $pYear;
                    break;

                case 'y':
                    $result .= substr($pYear, 2);
                    break;

                //Time
                case 'a':
                case 'A':
                    if (date('a', $timestamp) == 'am') {
                        $result .= ($par == 'a') ? 'ق.ظ' : 'قبل از ظهر';
                    } else {
                        $result .= ($par == 'a') ? 'ب.ظ' : 'بعد از ظهر';
                    }
                    break;

                case 'B':
                case 'g':
                case 'G':
                case 'h':
                case 'H':
                case 's':
                case 'u':
                case 'i':

                    //Timezone
                case 'e':
                case 'I':
                case 'O':
                case 'P':
                case 'T':
                case 'Z':
                    $result .= date($par, $timestamp);
                    break;

                //Full Date/Time

                case 'c':
                    $result .= $pYear . "-" . $pMonth . "-" . $pDay . "T" . date("H::i:sP", $timestamp);
                    break;

                case 'r':
                    $result .= substr(PersianDate::$pdateWeekName[$pWeek], 0, 2) . "، " . $pDay . " " . substr(PersianDate::$pdateMonthName[$pMonth], 0, 6) . " " . $pYear . " " . date("H::i:s P", $timestamp);
                    break;
                case 'U':
                    $result .= $timestamp;
                    break;
                default:
                    $result .= $par;


            }
            $i++;
        }
        return $result;


    }


    public static function pstrftime($format, $timestamp = "")
    {
        //global $pdateMonthName,$pdateWeekName,$MonthDays;
        if ($timestamp === "") {
            $timestamp = time();
        }
        // Create need date parametrs
        $date = date("Y-m-d-w", $timestamp);
        list($gYear, $gMonth, $gDay, $gWeek) = explode('-', $date);
        list($pYear, $pMonth, $pDay) = PersianDate::gregorian_to_jalali($gYear, $gMonth, $gDay);
        $pWeek = $gWeek + 1;
        if ($pWeek == 7) $pWeek = 0;

        $lenghFormat = strlen($format);
        $i = 0;
        $result = "";
        while ($i < $lenghFormat) {
            $par = $format{$i};
            if ($par == "%") {
                $type = $format{++$i};
                switch ($type) {
                    //Day
                    case 'a':
                        $result .= substr(PersianDate::$pdateWeekName[$pWeek], 0, 2);
                        break;

                    case 'A':
                        $result .= PersianDate::$pdateWeekName[$pWeek];
                        break;

                    case 'd':
                        $result .= ($pDay < 10) ? "0" . $pDay : $pDay;
                        break;

                    case 'e':
                        $result .= $pDay;
                        break;

                    case 'j':
                        $dayinM = DayOfYear($pYear, $pMonth, $pDay);
                        $result .= ($dayinM < 10) ? "00" . $dayinM : (($dayinM < 100) ? "0" . $dayinM : $dayinM);
                        break;

                    case 'u':
                        $result .= $pWeek + 1;
                        break;

                    case 'w':
                        $result .= $pWeek;
                        break;

                    //Week
                    case 'U':
                        $result .= floor(DayOfYear($pYear, $pMonth, $pDay) / 7);
                        break;

                    case 'V':
                    case 'W':
                        $result .= ceil(DayOfYear($pYear, $pMonth, $pDay) / 7);
                        break;

                    //Month
                    case 'b':
                    case 'h':
                        $result .= substr(PersianDate::$pdateMonthName[$pMonth], 0, 6);
                        break;

                    case 'B':
                        $result .= PersianDate::$pdateMonthName[$pMonth];
                        break;

                    case 'm':
                        $result .= ($pMonth < 10) ? "0" . $pMonth : $pMonth;
                        break;

                    //Year
                    case 'C':
                        $result .= ceil($pYear / 100);
                        break;

                    case 'g':
                    case 'y':
                        $result .= substr($pYear, 2);
                        break;

                    case 'G':
                    case 'Y':
                        $result .= $pYear;
                        break;

                    //Time
                    case 'H':
                    case 'I':
                    case 'l':
                    case 'M':
                    case 'R':
                    case 'S':
                    case 'T':
                    case 'X':
                    case 'z':
                    case 'Z':
                        $result .= strftime("%" . $type, $timestamp);
                        break;
                    case 'p':
                    case 'P':
                    case 'r':
                        if (date('a', $timestamp) == 'am') {
                            $result .= ($type == 'p') ? 'ق.ظ' : (($type == 'P') ? 'قبل از ظهر' : strftime("%I:%M:%S قبل از ظهر", $timestamp));
                        } else {
                            $result .= ($type == 'p') ? 'ب.ظ' : (($type == 'P') ? 'بعد از ظهر' : strftime("%I:%M:%S بعد از ظهر", $timestamp));
                        }
                        break;

                    //Time and Date Stamps
                    case 'c':
                        $result .= substr(PersianDate::$pdateWeekName[$pWeek], 0, 2) . " " . substr(PersianDate::$pdateMonthName[$pMonth], 0, 6) . " " . $pDay . " " . strftime("%T", $timestamp) . " " . $pYear;
                        break;

                    case 'D':
                    case 'x':
                        $result .= (($pMonth < 10) ? "0" . $pMonth : $pMonth) . "/" . (($pDay < 10) ? "0" . $pDay : $pDay) . "/" . substr($pYear, 2);
                        break;

                    case 'F':
                        $result .= $pYear . "-" . (($pMonth < 10) ? "0" . $pMonth : $pMonth) . "-" . (($pDay < 10) ? "0" . $pDay : $pDay);
                        break;

                    case 's':
                        $result .= $timestamp;
                        break;

                    //Miscellaneous
                    case 'n':
                        $result .= "\n";
                        break;

                    case 't':
                        $result .= "\t";
                        break;

                    case '%':
                        $result .= "%";
                        break;

                    default:
                        $result .= "%" . $type;


                }
            } else {
                $result .= $par;
            }
            $i++;
        }
        return $result;
    }

    public static function DayOfYear($pYear, $pMonth, $pDay)
    {
        $days = 0;
        for ($i = 1; $i < $pMonth; $i++) {
            $days += PersianDate::$MonthDays[$i];
        }
        return $days + $pDay;
    }

    public static function isKabise($year)
    {
        $mod = $year % 33;
        if ($mod == 1 or $mod == 5 or $mod == 9 or $mod == 13 or $mod == 17 or $mod == 22 or $mod == 26 or $mod == 30) return true;
        return false;
    }

    public static function pmktime($hour = 0, $minute = 0, $second = 0, $month = 0, $day = 0, $year = 0, $is_dst = -1)
    {

        if ($hour == 0 && $minute == 0 && $second == 0 && $month == 0 && $day == 0 && $year == 0) return time();

        list($year, $month, $day) = PersianDate::jalali_to_gregorian($year, $month, $day);

        return mktime($hour, $minute, $second, $month, $day, $year, $is_dst);
    }

    public static function pcheckdate($month, $day, $year)
    {
        if ($month < 1 || $month > 12 || $year < 1 || $year > 32767 || $day < 1) {
            return false;
        }
        if ($day > PersianDate::$MonthDays[$month]) {
            if ($month != 12 || $day != 30 || !isKabise($year)) {
                return false;
            }
        }
        return true;
    }

    public static function pgetdate($timestamp = "")
    {
        if ($timestamp === "")
            $timestamp = mktime();
        list($seconds, $minutes, $hours, $mday, $wday, $mon, $year, $yday, $weekday, $month) = explode("-", pdate("s-i-G-j-w-n-Y-z-l-F", $timestamp));
        return array(
            0 => $timestamp,
            "seconds" => $seconds,
            "minutes" => $minutes,
            "hours" => $hours,
            "mday" => $mday,
            "wday" => $wday,
            "mon" => $mon,
            "year" => $year,
            "yday" => $yday,
            "weekday" => $weekday,
            "month" => $month,
        );
    }

    public static function div($a, $b)
    {
        return (int)($a / $b);
    }

    public static function gregorian_to_jalali($g_y, $g_m, $g_d)
    {
        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);


        $gy = $g_y - 1600;
        $gm = $g_m - 1;
        $gd = $g_d - 1;

        $g_day_no = 365 * $gy + PersianDate::div($gy + 3, 4) - PersianDate::div($gy + 99, 100) + PersianDate::div($gy + 399, 400);

        for ($i = 0; $i < $gm; ++$i)
            $g_day_no += $g_days_in_month[$i];
        if ($gm > 1 && (($gy % 4 == 0 && $gy % 100 != 0) || ($gy % 400 == 0)))
            /* leap and after Feb */
            $g_day_no++;
        $g_day_no += $gd;

        $j_day_no = $g_day_no - 79;

        $j_np = PersianDate::div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */
        $j_day_no = $j_day_no % 12053;

        $jy = 979 + 33 * $j_np + 4 * PersianDate::div($j_day_no, 1461); /* 1461 = 365*4 + 4/4 */

        $j_day_no %= 1461;

        if ($j_day_no >= 366) {
            $jy += PersianDate::div($j_day_no - 1, 365);
            $j_day_no = ($j_day_no - 1) % 365;
        }

        for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i)
            $j_day_no -= $j_days_in_month[$i];
        $jm = $i + 1;
        $jd = $j_day_no + 1;

        return array($jy, $jm, $jd);
    }

    public static function jalali_to_gregorian($j_y, $j_m, $j_d)
    {
        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);


        $jy = $j_y - 979;
        $jm = $j_m - 1;
        $jd = $j_d - 1;

        $j_day_no = 365 * $jy + PersianDate::div($jy, 33) * 8 + PersianDate::div($jy % 33 + 3, 4);
        for ($i = 0; $i < $jm; ++$i)
            $j_day_no += $j_days_in_month[$i];

        $j_day_no += $jd;

        $g_day_no = $j_day_no + 79;

        $gy = 1600 + 400 * PersianDate::div($g_day_no, 146097); /* 146097 = 365*400 + 400/4 - 400/100 + 400/400 */
        $g_day_no = $g_day_no % 146097;

        $leap = true;
        if ($g_day_no >= 36525) /* 36525 = 365*100 + 100/4 */ {
            $g_day_no--;
            $gy += 100 * PersianDate::div($g_day_no, 36524); /* 36524 = 365*100 + 100/4 - 100/100 */
            $g_day_no = $g_day_no % 36524;

            if ($g_day_no >= 365)
                $g_day_no++;
            else
                $leap = false;
        }

        $gy += 4 * PersianDate::div($g_day_no, 1461); /* 1461 = 365*4 + 4/4 */
        $g_day_no %= 1461;

        if ($g_day_no >= 366) {
            $leap = false;

            $g_day_no--;
            $gy += PersianDate::div($g_day_no, 365);
            $g_day_no = $g_day_no % 365;
        }

        for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++)
            $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap);
        $gm = $i + 1;
        $gd = $g_day_no + 1;

        return array($gy, $gm, $gd);
    }

    public static function convert_date_H_to_M($DATE/*1392-01-01*/, $sep = '-')
    {
        if (empty($DATE))
            return false;

        $date_startArr = explode(' ', $DATE);
        $D_S_Arr = explode($sep, $date_startArr[0]);

        $date_start_g_arr = PersianDate::jalali_to_gregorian($D_S_Arr[0], $D_S_Arr[1], $D_S_Arr[2]);

        if ((strlen($date_start_g_arr[1]) == 1)) {
            $month = '0' . $date_start_g_arr[1];
        } else {
            $month = $date_start_g_arr[1];
        }

        if ((strlen($date_start_g_arr[2]) == 1)) {
            $day = '0' . $date_start_g_arr[2];
        } else {
            $day = $date_start_g_arr[2];
        }

        $date_start = $date_start_g_arr[0] . $sep . $month . $sep . $day;

        if (!empty($date_startArr[1])) {
            $date_start .= ' ' . $date_startArr[1];
        }

        return $date_start;
    }

    public static function convert_date_M_to_H($DATE/*2014-01-01*/, $sep = '-', $time = true)
    {
        if (empty($DATE))
            return false;

        $date_startArr = explode(' ', $DATE);
        $D_S_Arr = explode($sep, $date_startArr[0]);

        $date_start_g_arr = PersianDate::gregorian_to_jalali($D_S_Arr[0], $D_S_Arr[1], $D_S_Arr[2]);

        if ((strlen($date_start_g_arr[1]) == 1)) {
            $month = '0' . $date_start_g_arr[1];
        } else {
            $month = $date_start_g_arr[1];
        }

        if ((strlen($date_start_g_arr[2]) == 1)) {
            $day = '0' . $date_start_g_arr[2];
        } else {
            $day = $date_start_g_arr[2];
        }

        $date_start = $date_start_g_arr[0] . $sep . $month . $sep . $day;

        if (!empty($date_startArr[1]) && $time) {
            $date_start .= ' ' . $date_startArr[1];
        }

        return $date_start;
    }

    public static function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    // MICROTIME
    public static function mtime()
    {
        $time = microtime();
        $etime = explode(' ', $time); // جدا کردن مقدار بازگشتي تابع اصلي
        $totaltime = $etime[0]; // ذخيره کردن قسمت اول تابع در متغيير
        $totaltime = substr($totaltime, 0, 5); // کوتاه کردن مقدار به 5 عدد
        return $totaltime;
    }

    public static function getMothNameShamsi($date = '1395-01-01')
    {
        $arr = explode('-', $date);
        $month = isset($arr[1]) && $arr[1] ? $arr[1] : 0;

        if (!$month)
            return 0;

        $month = !empty(self::$pdateMonthName[(int)$month]) ? self::$pdateMonthName[(int)$month] : false;

        return $month;

    }

    public static function renderCalenderSelector($inputName = 'start_date', $inputId = 'start_date'
        , $parentId = 'date-start'
        , $startYear = 1360, $endYear = 1400, $date = null
        , $defaultDate = '1396-01-01', $time = false, $timeSet = '12:00:00', $inputSize = 'xsmall')
    {
        $date = isset($date) && $date ? $date : $defaultDate;
        $arr = explode("-", $date);

        for ($i = $startYear; $i <= $endYear; $i++) {
            $yearArr[$i] = $i;
        }
        for ($i = 1; $i <= 12; $i++) {
            $monthArr[$i] = $i;
            $monthNameArr[$i] = self::$pdateMonthName[$i];
        }
        for ($i = 1; $i <= 31; $i++) {
            $dayArr[$i] = $i;
        }

        $html = '<div id="' . $parentId . '" class="form-group">';
        $html .= '<div class="col-md-4">';
        $html .= ' <span class="select_label">روز</span>' . \Form::select('day_s', $dayArr, (int)$arr[2], ['class' => 'form-control input-' . $inputSize, 'id' => 'day_s', 'required' => '', 'data-select-style' => '']) . '';
        $html .= '</div>';
        $html .= '<div class="col-md-4">';
        $html .= ' <span class="select_label">ماه</span>' . \Form::select('month_s', $monthNameArr, (int)$arr[1], ['class' => 'form-control input-' . $inputSize, 'id' => 'month_s', 'required' => '', 'data-select-style' => '']) . '';
        $html .= '</div>';
        $html .= '<div class="col-md-4">';
        $html .= ' <span class="select_label">سال</span>' . \Form::select('year_s', $yearArr, (int)$arr[0], ['class' => 'form-control input-' . $inputSize, 'id' => 'year_s', 'required' => '', 'data-select-style' => '']) . '';
        $html .= '</div>';

        $html .= '<input type="hidden" name="' . $inputName . '" id="' . $inputId . '" value="' . (isset($date) && $date ? $date : $defaultDate) . ' ' . (isset($timeSet) && $time && $timeSet ? $timeSet : '12:00:00') . '"/>';

        if ($time) {
            $timeSet = isset($timeSet) && $timeSet ? $timeSet : null;
            $arrT = explode(":", $timeSet);

            for ($i = 1; $i <= 24; $i++) {
                $hArr[$i] = $i;
            }
            for ($i = 1; $i <= 59; $i++) {
                $mArr[$i] = $i;
            }
            for ($i = 1; $i <= 59; $i++) {
                $sArr[$i] = $i;
            }

            $html .= '<br/>';
            $html .= '<div class="col-md-4">';
            $html .= ' <span class="select_label">ثانیه</span>' . \Form::select('s_s', $sArr, (int)$arrT[2], ['class' => 'form-control input-' . $inputSize, 'id' => 's_s', 'required' => '', 'data-select-style' => '']) . '';
            $html .= '</div>';
            $html .= '<div class="col-md-4">';
            $html .= ' <span class="select_label">دقیقه</span>' . \Form::select('m_s', $mArr, (int)$arrT[1], ['class' => 'form-control input-' . $inputSize, 'id' => 'm_s', 'required' => '', 'data-select-style' => '']) . '';
            $html .= '</div>';
            $html .= '<div class="col-md-4">';
            $html .= ' <span class="select_label">ساعت</span>' . \Form::select('h_s', $hArr, (int)$arrT[0], ['class' => 'form-control input-' . $inputSize, 'id' => 'h_s', 'required' => '', 'data-select-style' => '']) . '';
            $html .= '</div>';

        }
        $html .= '</div>';


        ?>
        <script>
            $(document).ready(function () {
                var useTime = false;
                <?php
                if ($time) {
                ?>
                useTime = true;
                <?php
                }
                ?>

                var timeStamp = '';
                $('#<?=$parentId;?>').on('change', 'select#day_s', function (event) {
                    var clicked = $(this);

                    var day = $('#<?=$parentId;?>').find('select#day_s option:selected').val();
                    var month = $('#<?=$parentId;?>').find('select#month_s option:selected').val();
                    var year = $('#<?=$parentId;?>').find('select#year_s option:selected').val();

                    if (useTime == true) {
                        var ss = $('#<?=$parentId;?>').find('select#s_s option:selected').val();
                        var min = $('#<?=$parentId;?>').find('select#m_s option:selected').val();
                        var hur = $('#<?=$parentId;?>').find('select#h_s option:selected').val();
                        timeStamp = hur + ':' + min + ':' + ss;
                    }

                    var date = year + '-' + month + '-' + day + ' ' + timeStamp;

                    $('#<?=$parentId;?>').find('#<?=$inputId;?>').val(date);

                    console.log(date, $('#<?=$parentId;?>').find('#<?=$inputId;?>'));

                });
                $('#<?=$parentId;?>').on('change', 'select#month_s', function (event) {
                    var clicked = $(this);

                    var day = $('#<?=$parentId;?>').find('select#day_s option:selected').val();
                    var month = $('#<?=$parentId;?>').find('select#month_s option:selected').val();
                    var year = $('#<?=$parentId;?>').find('select#year_s option:selected').val();

                    if (useTime == true) {
                        var ss = $('#<?=$parentId;?>').find('select#s_s option:selected').val();
                        var min = $('#<?=$parentId;?>').find('select#m_s option:selected').val();
                        var hur = $('#<?=$parentId;?>').find('select#h_s option:selected').val();
                        timeStamp = hur + ':' + min + ':' + ss;
                    }

                    var date = year + '-' + month + '-' + day + ' ' + timeStamp;

                    $('#<?=$parentId;?>').find('#<?=$inputId;?>').val(date);

                });
                $('#<?=$parentId;?>').on('change', 'select#year_s', function (event) {
                    var clicked = $(this);

                    var day = $('#<?=$parentId;?>').find('select#day_s option:selected').val();
                    var month = $('#<?=$parentId;?>').find('select#month_s option:selected').val();
                    var year = $('#<?=$parentId;?>').find('select#year_s option:selected').val();

                    if (useTime == true) {
                        var ss = $('#<?=$parentId;?>').find('select#s_s option:selected').val();
                        var min = $('#<?=$parentId;?>').find('select#m_s option:selected').val();
                        var hur = $('#<?=$parentId;?>').find('select#h_s option:selected').val();
                        timeStamp = hur + ':' + min + ':' + ss;
                    }

                    var date = year + '-' + month + '-' + day + ' ' + timeStamp;

                    $('#<?=$parentId;?>').find('#<?=$inputId;?>').val(date);

                });
                $('#<?=$parentId;?>').on('change', 'select#s_s', function (event) {
                    var clicked = $(this);

                    var day = $('#<?=$parentId;?>').find('select#day_s option:selected').val();
                    var month = $('#<?=$parentId;?>').find('select#month_s option:selected').val();
                    var year = $('#<?=$parentId;?>').find('select#year_s option:selected').val();

                    if (useTime == true) {
                        var ss = $('#<?=$parentId;?>').find('select#s_s option:selected').val();
                        var min = $('#<?=$parentId;?>').find('select#m_s option:selected').val();
                        var hur = $('#<?=$parentId;?>').find('select#h_s option:selected').val();
                        timeStamp = hur + ':' + min + ':' + ss;
                    }

                    var date = year + '-' + month + '-' + day + ' ' + timeStamp;

                    $('#<?=$parentId;?>').find('#<?=$inputId;?>').val(date);

                });
                $('#<?=$parentId;?>').on('change', 'select#m_s', function (event) {
                    var clicked = $(this);

                    var day = $('#<?=$parentId;?>').find('select#day_s option:selected').val();
                    var month = $('#<?=$parentId;?>').find('select#month_s option:selected').val();
                    var year = $('#<?=$parentId;?>').find('select#year_s option:selected').val();

                    if (useTime == true) {
                        var ss = $('#<?=$parentId;?>').find('select#s_s option:selected').val();
                        var min = $('#<?=$parentId;?>').find('select#m_s option:selected').val();
                        var hur = $('#<?=$parentId;?>').find('select#h_s option:selected').val();
                        timeStamp = hur + ':' + min + ':' + ss;
                    }

                    var date = year + '-' + month + '-' + day + ' ' + timeStamp;

                    $('#<?=$parentId;?>').find('#<?=$inputId;?>').val(date);

                });
                $('#<?=$parentId;?>').on('change', 'select#h_s', function (event) {
                    var clicked = $(this);

                    var day = $('#<?=$parentId;?>').find('select#day_s option:selected').val();
                    var month = $('#<?=$parentId;?>').find('select#month_s option:selected').val();
                    var year = $('#<?=$parentId;?>').find('select#year_s option:selected').val();

                    if (useTime == true) {
                        var ss = $('#<?=$parentId;?>').find('select#s_s option:selected').val();
                        var min = $('#<?=$parentId;?>').find('select#m_s option:selected').val();
                        var hur = $('#<?=$parentId;?>').find('select#h_s option:selected').val();
                        timeStamp = hur + ':' + min + ':' + ss;
                    }

                    var date = year + '-' + month + '-' + day + ' ' + timeStamp;

                    $('#<?=$parentId;?>').find('#<?=$inputId;?>').val(date);

                });

            });
        </script>
        <?php

        return $html;

    }

    public static function setEnNumber($string)
    {
        $string = str_replace("۰", "0", $string);
        $string = str_replace("۱", "1", $string);
        $string = str_replace("۲", "2", $string);
        $string = str_replace("۳", "3", $string);
        $string = str_replace("۴", "4", $string);
        $string = str_replace("۵", "5", $string);
        $string = str_replace("۶", "6", $string);
        $string = str_replace("۷", "7", $string);
        $string = str_replace("۸", "8", $string);
        $string = str_replace("۹", "9", $string);

        return $string;
    }

    public static function setFaNumber($string)
    {
        $string = str_replace("0", "۰", $string);
        $string = str_replace("1", "۱", $string);
        $string = str_replace("2", "۲", $string);
        $string = str_replace("3", "۳", $string);
        $string = str_replace("4", "۴", $string);
        $string = str_replace("5", "۵", $string);
        $string = str_replace("6", "۶", $string);
        $string = str_replace("7", "۷", $string);
        $string = str_replace("8", "۸", $string);
        $string = str_replace("9", "۹", $string);

        return $string;
    }

}
