@extends('layouts.master')

@section('title')
    Your Well-Being Score
@endsection

@section('content')
    <h1>Calculate a Score for Your Well-Being</h1>
    <h4>
		    How are you doing today? Track your well-being by entering daily information into the system. <br />
			  You will receive a score for your well-being based on your activities.
		</h4>
    <h5>Fields marked by * are required</h5>

    <form method='GET' action='/'>
        <!-- Enter today's date -->
        <label for='todayDate'>*Please enter today's date:</label>
        <input type='date' name='todayDate' required id='todayDate' value='{{ $todayDate or old('todayDate') }}'>

        <br/>
        <!-- Indicate how long the workout is using text box -->
        <label for='minWorkout'>*How long (in minutes) did you work out today?</label>
				<h5>(enter a number greater than 0; number of minutes = number of points earned)</h5>
        <input type='number' name='minWorkout' required id='minWorkout' value='{{ $minWorkout or old('minWorkout') }}'>

        <!-- Indicate whether journaled using radio button -->
        <fieldset class='radios'>
            <label>*Did you journal today?</label>
            <h5>{{ Form::radio('journal', 'Yes', old('journal')) }} Yes (+20 pts.)</h5>
            <h5>{{ Form::radio('journal', 'No', old('journal')) }} No</h5>
        </fieldset>

        <!-- Enter number of pages read using text box -->
				<label for='pagesRead'>*How many pages did you read today?</label>
				<h5>(enter a number greater than 0; number of pages = number of points earned)</h5>
        <input type='number' name='pagesRead' required id='pagesRead' value='{{ $pagesRead or old('pagesRead') }}'>

        <!-- Check bonus actions completed using checkbox -->
        <fieldset class='checkboxes'>
            <label>Which of the following did you do today? (Check all that apply)</label>
            <h5>{{ Form::checkbox('bonus[]', 'thankyou') }} Writing a thank-you note (+20 pts.)</h5>
            <h5>{{ Form::checkbox('bonus[]', 'kindness') }} Doing something kind to others (+20 pts.)</h5>
            <h5>{{ Form::checkbox('bonus[]', 'stranger') }} Talking to a stranger (+20 pts.)</h5>
            <h5>{{ Form::checkbox('bonus[]', 'veggie') }} Eating a vegeterian diet (+20 pts.)</h5>
        </fieldset>

        <br>
        <input type='submit' name='submit' class='btn btn-primary btn-small'>

    </form>


    <!-- Displaying all the errors -->
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    <!-- Diplay score if there is no error and if the form is submitted-->
    @elseif($request->input('submit'))
       <div class="alert alert-info">
           Your Well-Being Score for {{ $todayDate }} is: {{ $totalPoints }}
      </div>
    @endif

@endsection
