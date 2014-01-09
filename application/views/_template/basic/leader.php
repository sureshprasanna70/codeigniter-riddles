<title>ROS|LEADERBOARD</title>
<div class="container">
	<div class="personal">
	<div class="col personal">
		<div class="col-md-6"><?if(isset($log)) echo "  ".$log->fullname;?></div>
		<div class="col-md-6">TOTAL HUNTERS:</div></div>
		<div class="col personal">
		<div class="col-md-6"><?if(isset($rank))echo $rank;?></div>
		<div class="col-md-6"><?if(isset($count))echo $count;?></div>
	</div>
</div>
	
	
</div>
<div class="row-fluid ">
<div class="col-md-8 others">

<div class="col-md-6">NAME</div>
<div class="col-md-1">LEVEL</div>
</div>
</div>
<div class="row-fluid">
<div class="col-md-8 others">
<?php
$i=1;
foreach($id as $mi)
{
	
	echo '<div class="col-md-6">'.$mi->name.'</div>';
  	echo '<div class="col-md-1">'.$mi->level.'</div>';
	$i++;
}
?>
</div>
</div>