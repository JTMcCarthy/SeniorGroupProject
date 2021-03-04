<?php
function validatecourses()
{
	for ($xy = 0; $xy <= 6; $xy++)
	{
		$end = $xy + 1;
		$userarr[$xy] = $_POST["c1" . $end];
		strval($userarr[$xy]);
		echo $userarr[$xy]."<br>";
	}
	echo "<br>";
	$carr = file("Input.txt");
	$cfile = fopen("Input.txt", "r+");
	for ($i = 0; $i < count($carr); $i++)
	{
		$rarr[$i] = fgets($cfile);
	}
	foreach($rarr as $co)
	{
		echo $co;
		echo "<br>";
	}
	echo "<br>";
	for ($c = 0; $c < count($rarr); $c++)
	{
		$spot = 0;
		while (str_contains($rarr[$c], $userarr[$spot]) == false)
		{
			if($spot == (count($userarr) - 1))
			{
				echo "Missing " . $rarr[$c] . "<br>";
				break;
			}
			$spot = $spot + 1;
		}
	}
	//Testing
	if('CSC 141' == $userarr[0])
	{
		echo "user array working <br>";
	}
	if(str_contains($rarr[0], 'CSC 141'))
	{
		echo "required array working <br>";
	}
	if(str_contains($rarr[0], $userarr[0]))
	{
		echo "compare array working <br>";
	}
}
if(isset($_POST["submit"]))
{
	validatecourses();
}
?>