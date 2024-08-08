<?php

function myDateStyle1($date,$format = 'd/m/Y') {
    if($date)
        return \Carbon\Carbon::parse($date)->format($format);
}


function myDateStyle2($date, $format = 'Y-m-d H:i:s'){
    if($date)
        return \Carbon\Carbon::parse($date)->format($format);
}