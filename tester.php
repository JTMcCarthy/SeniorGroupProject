<!DOCTYPE html>
<?php 
	$checker = true;
	$name = $_POST["name"];
	$ID = $_POST["ID"];
	$major = $_POST["major"];
	$tInput = isset($_POST['transcript'])?$_POST['transcript']:"";
	if(strlen($tInput) == 0)
	{
		echo "no input";
		$checker = false;
	}
	$tarr = explode("\n", str_replace("\r", "", $tInput));
	if($checker == true)
	{
		$tarr = parseTranscript($tarr);
	}
	echo "<p>";
	echo $name."<br>";
	echo $ID."<br>";
	echo $major."<br>";
	echo $tarr[0];
	echo "</p>";
	$carr = file("Courses//".$major.".txt");
	if($checker == true)
	{
		$carr = transcriptEdit($tarr, $carr);
	}
	function transcriptEdit($tarr, $carr)
	{
		for($i = 0; $i < count($tarr); $i++)
		{
			for($j = 0; $j < count($carr); $j++)
			{
				if(str_contains($carr[$j], $tarr[$i]))
				{
					unset($carr[$j]);
					$carr = array_values($carr);
				}
				//else if to catch electives and cores
			}
		}
		return $carr;
	}
	function parseTranscript($tarr)
	{
		$j = 0;
		$tarr = array_filter($tarr);
		for($i = 0; $i < count($tarr); $i++)
		{
			if(isset($tarr[$i]))
			{
				$mtarr[$j] = substr($tarr[$i], 0, 6);
				$j++;
			}
		}
		return $mtarr;
	}
	function showCourses($arr)
	{
		echo "<ul id = 'ul1'>";
		foreach($arr as $x)
		{
			echo "<li>".$x."</li>";
		}
		echo "</ul>";
	}
	function showAmount($arr)
	{
		echo "<a id = 'ramount'>".count($arr)."</a>";
	}
?>
<html>
<head>
	<title>Student Information</title>
</head>
<body>
	<p>
		<br>Required Courses<br>
		<?php
		showCourses($carr);
		?><br>
		Total:
		<?php
		showAmount($carr);
		?><br>
		Number of Semesters needed:
		<input type="text" name="seme" id="numSemesters" />
		<br>
		Max courses per semester: 
		<input type="text" name="cour" id="numCourses" />
		<input type="button" onclick="myClass()" value="Create the table"/><br>
		<h1 align="center"><br>
		My Schedule
		</h1>
		<table id="schedule" border="2" align="Center" width="55%">
		</table>
		<table id="schedule2" border="2" align="Center" width="50%">
		</table>
		<br>
		<input type="button" onclick="validate()" value="Check Table"/>
		<br>Missing Courses <br>
		<a id = "display"></a><br>
		<a id = "test"></a><br>
	</p>
<script type="text/javascript">
	<?php
		$js_array = json_encode($carr);
		echo "var js_array = ".$js_array.";\n";
	?>
	for(var i = 0; i < js_array.length - 1; i++)
		{
			js_array[i] = js_array[i].slice(0,js_array[i].length-2);
		}
	function myClass()
	{
		var table = document.getElementById("schedule");
		var semesters = document.getElementById("numSemesters").value;	
		for(var r = 0;r<1; r++)
		{
			var table = document.getElementById('schedule')
			var rowTitle = table.insertRow();
			//var semNum = r+1;
			//rowTitle.innerHTML = "Semester " + semNum ;
			var x = document.getElementById('schedule').insertRow(r);
			for(var c=0; c<semesters;c++)
			{
				var semNum = c+1;
				//var first = x.insertcell();
				var y= x.insertCell();
				y.innerHTML = '<class = "semester"> Semester ' + semNum;
			}
		}
		var table2 = document.getElementById("schedule2");
		var courses = document.getElementById("numCourses").value;	
		for(var r = 0;r<courses; r++)
		{
			var tableClasses = document.getElementById('schedule2')
			var rowTitle = table.insertRow();
			//var semNum = r+1;
			//rowTitle.innerHTML = "Semester " + semNum ;
			var x = document.getElementById('schedule2').insertRow(r);
			for(var c=0; c<semesters;c++)
			{
				var y= x.insertCell();
				y.innerHTML = '<input type="text" id = "c' + c + r +'" class = "course">';
			}
		}
	}
	function validate()
	{
		var rarr = js_array;
		var iarr = [];
		var marr = [];
		var sems = document.getElementById("numSemesters").value;
		var cours = document.getElementById("numCourses").value;
		//for loop to populate an array of required courses	
		var list = document.getElementById('ul1')
		var items = document.getElementById('ul1').getElementsByTagName('li');
		var seen = {};
		/*for (var i = 0; i < items.length; i++)
		{
			var st = items[i].innerHTML;
			str = String(st);
			if(!(str in seen))
			{
				rarr.push(str);
				seen[str] = true;
			}
		}*/
		//for loop to populate an array of inputted courses using id = c##
		var counter = 0;
		for (var i = 0; i < sems; i++)
		{
			for(var p = 0; p < cours; p++)
			{
				var cor = document.getElementById("c" + i + p).value;
				cor = String(cor);
				iarr[counter] = cor;
				counter++;
			}
		}
		if(rarr[0].includes())
		{
			document.getElementById("test").innerHTML = rarr[0];
		}
		//for loop to compare a element of required array to each in inputed until found or inputed array ends
		//if inputed array ends present that course as missing
		//if given required element is found in inputed break interior loop and continue to next required element
		for(var i = 0; i < rarr.length; i++)
		{
			var spot = 0;
			while (rarr[i] != iarr[spot])
			{
				if(spot == (iarr.length - 1))
				{
					marr.push(rarr[i]);
					break;
				}
				spot++;
			}
		}
		var txt = "";
		if(marr.length != 0)
		{
			for(var i = 0; i < marr.length; i++)
			{
				txt += marr[i] + "<br>";
			}
			document.getElementById("display").innerHTML = txt;
		}
		else
		{
			document.getElementById("display").innerHTML = "No missing courses!<br>"
		}
	}
</script>
</body>
</html>
