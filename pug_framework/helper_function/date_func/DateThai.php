<?php

namespace Pug_Framework\Helper_Function\Date_Func;

class DateThai
{
    private array $strMonthCut = [
        "", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."
    ];

    private array $strFullMonth = [
        "", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
    ];
    /**
     * @param string $strDate
     * @return object
     */
    public function get(string $strDate): object
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));

        $strMonthThai = $this->strMonthCut[$strMonth];
        $strFullMonthThai = $this->strFullMonth[$strMonth];

        $result = (object)[
            'day' => date('d'),
            'month' => date('m'),
            'year' => substr($strYear, 2),
            'ymd' => date('Y-m-d'),
            'monthYearFull' => $strFullMonthThai . ' ' . $strYear,
            'dayMonthYearCut' => $strDay . ' ' . $strMonthThai . ' ' . substr($strYear, 2)
        ];

        return $result;
    }
}
