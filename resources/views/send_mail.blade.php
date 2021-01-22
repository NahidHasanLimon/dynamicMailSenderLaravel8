<!DOCTYPE html>
<html>
<head>
	<title>Send Mail</title>
	 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h1>Sending Email</h1>
				
			</div>
			<div class="card-body">
				<form method="post">
					
				</form>
				<a  class="btn button btn-primary" href="{{route('sendmail.jobs_and_queue') }}">Send With Job and Queue</a>
				<a  class="btn button btn-secondary" href="{{ route('sendmail.basic') }}">Send Basic Email</a>
				<a  class="btn button btn-warning" href="{{ route('sendmail.html') }}">Send With HTML</a>
				<a  class="btn button btn-primary"href="{{ route('sendmail.attachment') }}">Send With Attachment</a>
				<a  class="btn button btn-danger"href="{{ route('sendmail.dynamic.check') }}">Send Dynamic Check</a>
			
			</div>
		</div>
	</div>
</body>
</html>