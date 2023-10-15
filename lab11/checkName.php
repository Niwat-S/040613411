<?php 
    if(isset($_GET['mango']) && isset($_GET['orange']) && isset($_GET['banana'])){
        $mango = intval($_GET['mango']);
        $orange = intval($_GET['orange']);
        $banana = intval($_GET['banana']);

        $totalSales = ($mango * 30) + ($orange * 70) + ($banana * 30);

        echo "ยอดขาย " . $totalSales . " บาท";

    }
    else{
        echo "ไม่สามารถคำนวณยอดขายได้";
    }
?>