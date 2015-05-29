<?php
function getuser()
{
	return array('pritesh','pritesh@123.com',new DateTime('1st February 1991'));
}
 

list($user,$email,$dob)=getuser();
echo $dob->format('Y:m:d');












/* =====URL Parsing===
$url="https://www.youtube.com/watch?v=uM1KphD-N84&index=28&list=PLfdtiltiRHWFD41D_LDomY1Fb-O9MtFqq&spfreload=1";

$myUrl=parse_url($url);
echo "<pre>".print_r($myUrl,true)."</pre>";
*/



/*====Call back=======
function string($name,$callback)
{
	$results=array('upper'=>strtoupper($name),'lower'=>strtolower($name));
	$family=array('Rahul','Yogesh');
if(is_callable($callback))
{
	call_user_func($callback,$results,$family);//call function 'callback' and pass results as parameters
}
}
string('Pritesh',function($name,$fam){
	echo $name['lower']."<br>".$fam[1];
});*/


?>