<?php

if(isset($welcome)){?>
	<div class="center-page head">
Welcome to Riddles of the Sphinx 2014.</div>
<div class="center-page head">1.Login before you start playing</div>
<div class="center-page head">2.Also complete your profile to play</div>
<?}


	

if(isset($img))
{
	
	echo '<img class="center-page" width="600" height="500" src ='.base_url().'assets/images/'.$img.' class="image-block">';
}

?>