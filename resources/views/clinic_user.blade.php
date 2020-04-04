@extends('layouts.mainlayout')

@section('content')

    <section id="appointment" data-stellar-background-ratio="3">
			<div class="container">
				<section id="content">
					<form action="clinicIndex.php">
						<h1>Login Form</h1>
						<div>
							<input type="text" placeholder="Username" required="" id="username" />
						</div>
						<div>
							<input type="password" placeholder="Password" required="" id="password" />
						</div>
						<div>
							<input type="submit" value="Log in" />
							<a href="#">Lost your password?</a>
				
						</div>
					</form><!-- form -->
				</section><!-- content -->
			</div><!-- container -->
	</section>
    

@endsection