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
			y.innerHTML = '<input type="text" name = "c' + c + r +'" class = "course">';
		}
	}
}
	