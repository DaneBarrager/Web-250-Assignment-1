
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>SportsPro Technical Support</title>
    <link rel="stylesheet" type="text/css"
          href="main.css">
</head>

<!-- the body section -->
<body>
<header>
    <h1>SportsPro Technical Support</h1>
    <p>Sports management software for the sports enthusiast</p>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
        </ul>
        <p>
		<div id="lastName">
			<h2>To Search, Enter Last Name</h2><p>
			(Default is list all names)<p><p><p>
			<form action='../manage_customers/index.php' method='GET'>
				Last Name (begins with):</br><input type="text" name="lastName" ></br></br>
				<input type="submit" value="Submit">
				</br></br>
			</form>
		</div> <!-- lastName -->
    </nav>
</header>
