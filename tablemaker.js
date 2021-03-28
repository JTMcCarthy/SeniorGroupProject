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
	var rarr = [];
	var iarr = [];
	var marr = [];
	var sems = document.getElementById("numSemesters").value;
	var cours = document.getElementById("numCourses").value;
	var ramount = document.getElementById("ramount");  //many need .value on end
	//for loop to populate an array of required courses	
	var list = document.getElementById('ul1')
	var items = document.getElementById('ul1').getElementsByTagName('li');
	var seen = {};
	for (var i = 0; i < items.length; i++)
	{
		var str = items[i].innerHTML;
		if(!(str in seen))
		{
			rarr.push(str);
			seen[str] = true;
		}
	}
	//for loop to populate an arrray of inputed courses using id = c##
	var counter = 0;
	for (var i = 0; i < sems; i++)
	{
		for(var p = 0; p < cours; p++)
		{
			iarr[counter] = document.getElementById("c" + i + p).value;
			counter++;
		}
	}
	document.getElementById("test").innerHTML = iarr[iarr.length - 1];
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