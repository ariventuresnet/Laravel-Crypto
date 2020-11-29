<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<title>Responsible Bitcoin & Cryptocurrency knowledge & reviews</title>
	<!-- Meta tag Keywords -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- css files -->
	<link rel="stylesheet" href="{{asset('/customAuth/css/style.css')}}" type="text/css" media="all" />
	<!-- Font-Awesome-Icons-CSS -->
	<link rel="stylesheet" href="{{asset('/customAuth/css/fontawesome-all.css')}}">
	<!-- web-fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
	<!-- bg effect -->
	<div id="bg">
		<canvas></canvas>
		<canvas></canvas>
		<canvas></canvas>
	</div>
	<!-- //bg effect -->

	<!-- title -->
	<h1></h1>
	<!-- //title -->

	<!-- content -->
	<div class="sub-main-w3">
		<form method="POST" action="{{ route('login') }}">
            @csrf

			<h2>Login Now
				<i class="fas fa-level-down-alt"></i>
			</h2>
			<div class="form-style-agile">
				<label>
					<i class="fas fa-user"></i>
					E-Mail Address
				</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                {{-- <input placeholder="Username" name="Name" type="text" required=""> --}}

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					Password
				</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<!-- checkbox -->
			<div class="wthree-text">
				<ul>
					<li>
						<label class="anim">
							<input class="form-check-input checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
							<span>Remember Me</span>
						</label>
					</li>
				</ul>
			</div>
			<!-- //checkbox -->
            <input type="submit" value="Log In">
		</form>
	</div>
	<!-- //content -->

	<!-- Jquery -->
	<script src="{{asset('/customAuth/js/jquery-3.3.1.min.js')}}"></script>
	<!-- //Jquery -->

	<!-- effect js -->
	<script src="{{asset('/customAuth/js/canva_moving_effect.js')}}"></script>
	<!-- //effect js -->

</body>

</html>