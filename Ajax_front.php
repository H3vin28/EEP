<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AJAX CRUD</title>
</head>
<body>
	<form id="regForm">
		<h1>Registration Form</h1>
		<label>Firstname: </label>
		<input type="text" name="fname" placeholder="Enter Firstname!">
		<br/>
		<label>Lastname: </label>
		<input type="text" name="lastname" placeholder="Enter Lastname!">
		<br/>
		<label>Middle Name (Optional): </label>
		<input type="text" name="mname" placeholder="Enter Middle Name!">
		<br/>
		<label>Gender: </label>
		<select name="gender">
			<option readonly selected>Select gender here!</option>
			<option>Male</option>
			<option>Female</option>
			<option>LGBTQ+</option>
		</select>
		<br/>
		<button type="button">Register</button>
	</form>
</body>
</html>