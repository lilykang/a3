<!-- this is the parent template upon which the children templates are built -->

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>
        @yield('title','Your Well-Being Score')
    </title>

	  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
		<link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
    <link href='/public/css/styles.css' rel='stylesheet'>

</head>
<body>
    <section>
        @yield('content')
    </section>

    <footer>
        <a href='/'>&larr; Calculate Again</a>
    </footer>

</body>
</html>
