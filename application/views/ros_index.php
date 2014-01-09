<?php 
echo 'Welcome to the Riddles of Sphinx';
if(isset($url))
{
	echo $url;
}
else if(isset($login))
{
	echo 'Site Login'.anchor('auth/k_login','login');
	echo 'FB Login'.anchor('auth/k_fb','login');
}
else if(isset($cheating))
{
	echo $cheating;
}
else if(isset($meme))
{
	echo $meme;
}
else if(isset($level))
{
	echo $level;
}
?>