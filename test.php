

<?php
#if(isset($_POST['submit'])){
#$days=$_POST['days'];
#$from_date=strtotime($_POST['from_date']);

       


#}






$from_date=strtotime("07/08/2021");
#Here 20 is the value of how many days it require to take the car for rent and from date is the date from in where date the car will be rent.
$no_of_days=20;
$day_diff=$no_of_days*60*60*24;
$to_date=$from_date + $day_diff;
#echo floor($day_diff/(60*60*24))."\n";
#echo $to_date ."\n";
echo date("d/m/Y",$to_date);

?>
