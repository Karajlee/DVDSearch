<?php
	//1. Establish DB Connection
	$host = "303.itpwebdev.com";
	$user = "karajlee_db_user";  //let program know who connected to database
	$pass = "uscitp2023";
	$db = "karajlee_dvd_db";

	// Establish MySQL Connection.
	$mysqli = new mysqli($host, $user, $pass, $db);

	// Check for any Connection Errors.
	if ( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}

	//retrieve all genres from DB
	$sql_genre = "SELECT * FROM genres;";
	// echo $sql_genre;

	$results_genre = $mysqli->query( $sql_genre );

	// Check for SQL Errors.
	if ( !$results_genre ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	//retrieve all ratings from DB
	$sql_rating = "SELECT * FROM ratings;";

	$results_rating = $mysqli->query( $sql_rating );

	// Check for SQL Errors.
	if ( !$results_rating ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	//retrieve all labels from DB
	$sql_label = "SELECT * FROM labels;";

	$results_label = $mysqli->query( $sql_label );

	// Check for SQL Errors.
	if ( !$results_label ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	//retrieve all format from DB
	$sql_format = "SELECT * FROM formats;";

	$results_format = $mysqli->query( $sql_format );

	// Check for SQL Errors.
	if ( !$results_format ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	//retrieve all sound
	$sql_sound = "SELECT * FROM sounds;";

	$results_sound = $mysqli->query( $sql_sound );

	// Check for SQL Errors.
	if ( !$results_sound ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}
	// while($row = $results_genre->fetch_assoc()){
	// 	echo "<hr>";
	// 	echo $row['genre'];
	// }

	// Close MySQL Connection.
	$mysqli->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DVD Search Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="main.php">Home</a></li>
		<li class="breadcrumb-item active">Search</li>
	</ol>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4">DVD Search Form</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<form action="search_results.php" method="GET">
			<div class="form-group row">
				<label for="title-id" class="col-sm-3 col-form-label text-sm-right">DVD Title:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="title-id" name="title">
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="genre-id" class="col-sm-3 col-form-label text-sm-right">Genre:</label>
				<div class="col-sm-9">
					<select name="genre_id" id="genre-id" class="form-control">
						<option value="" selected>-- All --</option>
						<?php 
							while($row = $results_genre->fetch_assoc()) :
						?>
							<option value='<?php echo $row['genre_id'] ?>'>
								<?php echo $row['genre'] ?>
							</option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="rating-id" class="col-sm-3 col-form-label text-sm-right">Rating:</label>
				<div class="col-sm-9">
					<select name="rating_id" id="rating-id" class="form-control">
						<option value="" selected>-- All --</option>
						<?php 
							while($row = $results_rating->fetch_assoc()) :
						?>
							<option value='<?php echo $row['rating_id'] ?>'>
								<?php echo $row['rating'] ?>
							</option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="label-id" class="col-sm-3 col-form-label text-sm-right">Label:</label>
				<div class="col-sm-9">
					<select name="label_id" id="label-id" class="form-control">
						<option value="" selected>-- All --</option>
						<?php 
							while($row = $results_label->fetch_assoc()) :
						?>
							<option value='<?php echo $row['label_id'] ?>'>
								<?php echo $row['label'] ?>
							</option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="format-id" class="col-sm-3 col-form-label text-sm-right">Format:</label>
				<div class="col-sm-9">
					<select name="format_id" id="format-id" class="form-control">
						<option value="" selected>-- All --</option>
						<?php 
							while($row = $results_format->fetch_assoc()) :
						?>
							<option value='<?php echo $row['format_id'] ?>'>
								<?php echo $row['format'] ?>
							</option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="sound-id" class="col-sm-3 col-form-label text-sm-right">Sound:</label>
				<div class="col-sm-9">
					<select name="sound_id" id="sound-id" class="form-control">
						<option value="" selected>-- All --</option>
						<?php 
							while($row = $results_sound->fetch_assoc()) :
						?>
							<option value='<?php echo $row['sound_id'] ?>'>
								<?php echo $row['sound'] ?>
							</option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-sm-right">Award:</label>
				<div class="col-sm-9">
					<div class="form-check form-check-inline">
						<label class="form-check-label my-1">
							<input class="form-check-input mr-2" type="radio" name="award" id="inlineCheckbox3" value="any" checked>Any
						</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label my-1">
							<input class="form-check-input mr-2" type="radio" name="award" id="inlineCheckbox1" value="yes">Yes
						</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label my-1">
							<input class="form-check-input mr-2" type="radio" name="award" id="inlineCheckbox2" value="no">No
						</label>
					</div>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-sm-right">Release Date:</label>
				<div class="col-sm-9">
					<div class="row">
						<div class="col">
							<label class="form-check-label my-1">
								From: 
								<input type="date" class="form-control mt-2" name="release_date_from">
							</label>
						</div> <!-- .col -->
						<div class="col">
							<label class="form-check-label my-1">
								To: 
								<input type="date" class="form-control mt-2" name="release_date_to">
							</label>
						</div> <!-- .col -->
					</div> <!-- .row -->
				</div> <!-- .col -->
			</div> <!-- .form-group -->
			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary">Search</button>
					<button type="reset" class="btn btn-light">Reset</button>
				</div>
			</div> <!-- .form-group -->
		</form>
	</div> <!-- .container -->
</body>
</html>