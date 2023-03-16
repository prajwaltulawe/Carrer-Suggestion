<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userId = $_POST['userId'];
    include '_dbconnect.php';
   
    $isUserRecordedQ = "SELECT * FROM `userdata` WHERE userId = '$userId';";
    $isUserRecordedQResult = mysqli_query($connectionquery, $isUserRecordedQ);
    $isRecorded = mysqli_num_rows($isUserRecordedQResult);

    if ( $isRecorded == 1 ){
        $dataEnterQuery = "UPDATE `userdata` 
        SET `df`='".$_POST['df']."',`ca`='".$_POST['ca']."',`cs`='".$_POST['cs']."',`cybrsec`='".$_POST['cybrsec']."',`net`='".$_POST['net']."',`sd`='".$_POST['sd']."',`ps`='".$_POST['ps']."',`pm`='".$_POST['pm']."',`cff`='".$_POST['cff']."',`tc`='".$_POST['tc']."',`aiml`='".$_POST['aiml']."',`se`='".$_POST['se']."',`ba`='".$_POST['ba']."',`comski`='".$_POST['comski']."',`ds`='".$_POST['ds']."',`ts`='".$_POST['ts']."',`gd`='".$_POST['gd']."',`result`='".$_POST['result']."' 
        WHERE `userId` = '$userId';";
    }
    else{
        $dataEnterQuery = "INSERT INTO `userData`(`userId`, `df`, `ca`, `cs`, `cybrsec`, `net`, `sd`, `ps`, `pm`, `cff`, `tc`, `aiml`, `se`, `ba`, `comski`, `ds`, `ts`, `gd`, `result`) 
            VALUES ('".$userId."','".$_POST['df']."', '".$_POST['ca']."', '".$_POST['cs']."', '".$_POST['cybrsec']."', '".$_POST['net']."', '".$_POST['sd']."', '".$_POST['ps']."', '".$_POST['pm']."', '".$_POST['cff']."', '".$_POST['tc']."', '".$_POST['aiml']."', '".$_POST['se']."', '".$_POST['ba']."', '".$_POST['comski']."', '".$_POST['ds']."', '".$_POST['ts']."', '".$_POST['gd']."', '".$_POST['result']."');";
    }
    $insertRecordQ = mysqli_query($connectionquery, $dataEnterQuery);
} 

?>