<html lang="ja">
<head>
    <title>SIMULATION PAGE</title>
</head>

<?php header("Content-Type: text/html;charset=UTF-8");


//WEB上で入力されたデータを読込
$denryoku=$_POST['denryoku'];
$siyoryo=$_POST['siyoryo'];
$operator=$_POST['operator'];
$result1="0";
$result2="0";
$result3="0";
$result4="0";

//従量電灯Bの単価設定 ミナサポ版
$bkihon="297";
$btanka1="19.86";
$btanka2="19.86";
$btanka3="22.92";

//従量電灯Cの単価設定 ミナサポ版
$ckihon="297";
$ctanka1="19.48";
$ctanka2="19.61";
$ctanka3="23.33";


//従量電灯Bの単価設定 九電版B
$kbkihon="297";
$kbtanka1="17.46";
$kbtanka2="23.06";
$kbtanka3="26.06";

//従量電灯Bの単価設定 九電版スマートファミリー
$kkbkihon="297";
$kkbtanka1="17.46";
$kkbtanka2="23.06";
$kkbtanka3="24.96";

//従量電灯Cの単価設定 九電版B
$kckihon="297";
$kctanka1="17.46";
$kctanka2="23.06";
$kctanka3="26.06";

//従量電灯Cの単価設定 九電版スマートビジネス
$kkckihon="297";
$kkctanka1="23.06";
$kkctanka2="23.06";
$kkctanka3="23.06";

//単価別電力使用量
$siyoryo2=$siyoryo;
$one="0";
$two="0";
$three="0";

//使用単語
$tango0="電気料金シュミレーションツール";
$tango0 =  mb_convert_encoding($tango0, 'UTF-8', 'SJIS');
$tango1="【一般家庭用】従量電灯B・スマートファミリ－";
$tango1 =  mb_convert_encoding($tango1, 'UTF-8', 'SJIS');
$tango2="【店舗・事務所用】従量電灯C・スマートビジネス";
$tango2 =  mb_convert_encoding($tango2, 'UTF-8', 'SJIS');
$tango3="１．契約電力：";
$tango3 =  mb_convert_encoding($tango3, 'UTF-8', 'SJIS');
$tango4="２．使用電力量：";
$tango4 =  mb_convert_encoding($tango4, 'UTF-8', 'SJIS');
$tango5="３．契約プラン：";
$tango5 =  mb_convert_encoding($tango5, 'UTF-8', 'SJIS');
$tango6="※上記ボタンを押してください。";
$tango6 =  mb_convert_encoding($tango6, 'UTF-8', 'SJIS');
$tango7="従来料金：";
$tango7 =  mb_convert_encoding($tango7, 'UTF-8', 'SJIS');
$tango8="ミナサポ提案　新料金：";
$tango8 =  mb_convert_encoding($tango8, 'UTF-8', 'SJIS');
$tango9="■削減金額(1ヶ月)：";
$tango9 =  mb_convert_encoding($tango9, 'UTF-8', 'SJIS');
$tango10="■削減金額(1年間)：";
$tango10 =  mb_convert_encoding($tango10, 'UTF-8', 'SJIS');
$tango11="円";
$tango11 =  mb_convert_encoding($tango11, 'UTF-8', 'SJIS');
$tango12="戻る";
$tango12 =  mb_convert_encoding($tango12, 'UTF-8', 'SJIS');
$tango13="お安くできます！！";
$tango13 =  mb_convert_encoding($tango13, 'UTF-8', 'SJIS');
$tango14="補足：年間金額は【１ヶ月の削減金額】を【12ヶ月分】とした額となります。";
$tango14 =  mb_convert_encoding($tango14, 'UTF-8', 'SJIS');
$tango15="　　　過去1年分の金額をお知りになりたい場合は";
$tango15 =  mb_convert_encoding($tango15, 'UTF-8', 'SJIS');
$tango16="　　　1か月ごとに入力をお願いいたします。";
$tango16 =  mb_convert_encoding($tango16, 'UTF-8', 'SJIS');
$tango17="A・kVA";
$tango17 =  mb_convert_encoding($tango17, 'UTF-8', 'SJIS');

//対象プラン
$plan1="従量電灯B";
$plan1 =  mb_convert_encoding($plan1, 'UTF-8', 'SJIS');
$plan2="スマートファミリー";
$plan2 =  mb_convert_encoding($plan2, 'UTF-8', 'SJIS');
$plan3="従量電灯C";
$plan3 =  mb_convert_encoding($plan3, 'UTF-8', 'SJIS');
$plan4="スマートビジネス";
$plan4 =  mb_convert_encoding($plan4, 'UTF-8', 'SJIS');


//単価別に電力使用量を分ける
//one=120まで、two=120-300、three=300以上
if($siyoryo2>="301"){
     $one="120";
     $two="180";
     $three=$siyoryo2-"300";
}elseif($siyoryo2>="121" and $siyoryo2<="300"){
       $one="120";
       $two=$siyoryo2-"120";
       $three="0";
}else{
       $one=$siyoryo2;
       $two="0";
       $three="0";
}

//プランによって料金を定める
//result1=従来、result2=新プラン、result3=削減金額
if(is_numeric($denryoku)&&is_numeric($siyoryo)){
    switch($operator){
        case "$plan1":
        $result1=floor($denryoku/"10"*$kbkihon+$kbtanka1*$one+$kbtanka2*$two+$kbtanka3*$three);
        $result2=floor($denryoku/"10"*$bkihon+$btanka1*$one+$btanka2*$two+$btanka3*$three);
        $result3=$result1-$result2;
        $result4=$result3*12;
        break;
        case "$plan2":
        $result1=floor($denryoku/"10"*$kkbkihon+$kkbtanka1*$one+$kkbtanka2*$two+$kkbtanka3*$three);
        $result2=floor($denryoku/"10"*$bkihon+$btanka1*$one+$btanka2*$two+$btanka3*$three);
        $result3=$result1-$result2;
        $result4=$result3*12;
        break;
        case "$plan3":
        $result1=floor($denryoku*$kckihon+$kctanka1*$one+$kctanka2*$two+$kctanka3*$three);
        $result2=floor($denryoku*$ckihon+$ctanka1*$one+$ctanka2*$two+$ctanka3*$three);
        $result3=$result1-$result2;
        $result4=$result3*12;
        break;
        case "$plan4":
        $result1=floor($denryoku*$kkckihon+$kkctanka1*$one+$kkctanka2*$two+$kkctanka3*$three);
        $result2=floor($denryoku*$ckihon+$ctanka1*$one+$ctanka2*$two+$ctanka3*$three);
        $result3=$result1-$result2;
        $result4=$result3*12;
    }
}


?>

<body>
    <h1><?php echo $tango0;?></h1>
    <form method="post">
     <p><?php echo $tango3;?>
     <input type="number" name="denryoku"  value="<?php echo $denryoku;?>"><label><?php echo $tango17;?></label></p>
     <p><?php echo $tango4;?>
     <input type="number" name="siyoryo"  value="<?php echo $siyoryo;?>">kWh</p>
     <?php echo $tango5;?>
     <br>
     <input type="submit" value="<?php echo $plan1;?>" name="operator">
     <input type="submit" value="<?php echo $plan2;?>" name="operator">
     <input type="submit" value="<?php echo $plan3;?>" name="operator">
     <input type="submit" value="<?php echo $plan4;?>" name="operator">
     <br>
     <?php echo $tango6;?>:

     <br><br><hr>

     <p>
        <p>
        <label><?php echo $tango7;?></label>
        <label><?php echo "$result1$tango11"?></label>
        </p>
        <p>
        <label><?php echo "<FONT COLOR=\"GREEN\">$tango8</FONT>"?></label>
        <label><?php echo "<FONT COLOR=\"GREEN\">$result2$tango11</FONT>"?></label>
        </p>
        <p>
        <label><?php echo $tango9;?></label>
        <label><?php echo "$result3$tango11"?></label>
        </p>
        <p>
        <label><?php echo $tango10;?></label>
        <label><?php echo "<FONT COLOR=\"RED\">$result4$tango11</FONT>"?></label>
        </p>
        <br>
        <label><?php echo $tango14;?></label><br>
        <label><?php echo $tango15;?></label><br>
        <label><?php echo $tango16;?></label>
    </p>


</form>

<a href="https://minasapo.jp/service/electricity">
<input type="button" value="<?php echo $tango12;?>">
</a>
</body>
</html>