<?php
//color
$ijo="\033[92m";
$biru="\033[1;36m";
$putih="\033[1;37m";
$red="\033[1;31m";
$t = "\n";
function kntl($ticket, $jumlah, $jeda){
    $x = 0; 
    while($x < $jumlah) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://nandrbiz1.com/ttnews.php?ticket=".$ticket);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);     
        $result = curl_exec ($ch);
		    $js = json_decode($result,true);
        $code = $js['code'];
        $msg = $js['msg'];
        $gold = $js['data']['gold_flag'];
		    $count = $js['data']['count'];
        curl_close ($ch);
        $biru="\033[1;36m";
        $ijo="\033[92m";
        $putih="\033[1;37m";
        $t = "\n";
        if ($js['code'] == '200') {
          echo $biru."[-] ".$ijo.$msg.$putih." || Gold: ".$ijo."+".$gold.$putih." || Count: ".$ijo.$count.$t;
        }
        else
        {
        echo $biru."[-] ".$ijo.$msg.$t;
        }
        sleep($jeda);
        $x++;
        flush();
    }
}
echo $ijo.
"
===================================================
	         NUYUL COIN TTNEWS
            CREATED BY GUSRYAN PADRIANSYAH
	           ReCode By PGV
===================================================
".$t;
echo $biru."[✔] ".$putih."Nhập Ticket: ";
$ticket = trim(fgets(STDIN));
echo $biru."[✔] ".$putih."Nhập số lần xem: ";
$jumlah = trim(fgets(STDIN));
echo $biru."[T] ".$putih."Thời gian? 0-999 (ex:15): ";
$jeda = trim(fgets(STDIN));
$pukis = kntl($ticket, $jumlah, $jeda);
print $pukis;
print $biru."[✔] ".$red."Đã auto xong\n";
?>
