<!-- < ?php require('wbscore.php'); ?> -->

<!DOCTYPE html>
<html>
<head>
    <title>Well-Being Score</title>
		<meta charset='utf-8'>

	  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
		<link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
		<link href='css/styles.css' rel='stylesheet'>

</head>
<body>

    <h1>Calculate a Score for Your Well-Being</h1>
		<h4>
		    How are you doing today? Track your well-being by entering daily information into the system. <br />
			  You will receive a score for your well-being based on your activities.
		</h4>
    <h5>Fields marked by * are required</h5>

    <form method='GET' action='/'>

				<!-- Trick to makes it so that if no checkboxes are selected, we still receive $_GET data -->
	      <input type='hidden' name='alwaysPost' value='0'>

				<!-- Enter today's date
        try this later <input type='date' name='todayDate' required id='todayDate' value='{{ $todayDate or $form->prefill('todayDate') }}'>
        -->
				<label for='todayDate'>*Please enter today's date:</label>
				<input type='date' name='todayDate' required id='todayDate' value='{{ $todayDate or '' }}'>


				<!-- Indicate how long the workout is using text box -->
        <label for='minWorkout'>*How long (in minutes) did you work out today?</label>
				<h5>(enter a number greater than 0; number of minutes = number of points earned)</h5>
        <input type='number' name='minWorkout' required id='minWorkout' value='{{ $minWorkout or '' }}'>

				<!-- Indicate whether journaled using radio button-->
				<fieldset class='radios'>
            <label>*Did you journal today?</label>
            <h5><input type='radio' name='journal' required value='Yes' {{ ($journal == 'Yes') ? 'CHECKED' : '' }} > Yes (+20 pts.)</h5>
            <h5><input type='radio' name='journal' value='No' {{ ($journal == 'No') ? 'CHECKED' : '' }} > No</h5>
        </fieldset>

				<!-- Enter number of pages read using text box -->
				<label for='pagesRead'>*How many pages did you read today?</label>
				<h5>(enter a number greater than 0; number of pages = number of points earned)</h5>
        <input type='number' name='pagesRead' required id='pagesRead' value='{{ $pagesRead or '' }}'>

				<!-- Check bonus actions completed using checkbox -->
        <fieldset class='checkboxes'>
            <label>Which of the following did you do today? (Check all that apply)</label>
            <h5><input type='checkbox' name='bonus[]' value='thankyou' <?php if(strstr($results, 'thankyou')) echo 'CHECKED'?>> Writing a thank-you note (+20 pts.)</h5>
            <h5><input type='checkbox' name='bonus[]' value='kindness' <?php if(strstr($results, 'kindness')) echo 'CHECKED'?>> Doing something kind to others (+20 pts.)</h5>
            <h5><input type='checkbox' name='bonus[]' value='stranger' <?php if(strstr($results, 'stranger')) echo 'CHECKED'?>> Talking to a stranger (+20 pts.)</h5>
            <h5><input type='checkbox' name='bonus[]' value='diet' <?php if(strstr($results, 'diet')) echo 'CHECKED'?>> Eating a vegeterian diet (+20 pts.)</h5>
        </fieldset>

        <br>
        <input type='submit' class='btn btn-primary btn-small'>



    </form>

		<!-- Validating input before showing result-->
		<?php if($errors): ?>

		    <div class='alert alert-danger'>
			      <ul>
					      <?php foreach($errors as $error): ?>
								  <li><?=$error?></li>
							  <?php endforeach; ?>
						</ul>
		    </div>

		<!-- If no errors, perform calculation and display result based on input -->
		<?php elseif($form->isSubmitted()): ?>

        <div class='alert alert-info'>Your Well-Being Score for <?=$form->sanitize($todayDate)?> is: <?=$form->sanitize($score)?></div>

		<?php endif; ?>

		<footer>
				<a href='/index.php'>&larr; Calculate Again</a>
		</footer>

</body>
</html>
