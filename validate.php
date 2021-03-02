<?php
function validatecourse()
{
	for ($x = 0; $x <= 6; $x++)
	{
		$y = $x + 1;
		$userarr[$x] = $_POST["c1" . $y];
		strval($userarr[$x]);
		echo $userarr[$x]."<br>";
	}
	$requiredarray = file("Input.txt");
	foreach($requiredarray as $z)
	{
		strval($z);
	}
	for ($i = 0; $i < count($requiredarray); $i++)
	{
		if (array_search($requiredarray[$i], $userarr, false) == false)
		{
			echo "Missing " . $requiredarray[$i] . "<br>"; 
		}
	}
	if($requiredarray[0] != $userarr[0])
	{
		echo $requiredarray[0];
		echo $userarr[0];
		echo "hello";
	}
}
if(isset($_POST["submit"]))
{
	validatecourse();
}
?>