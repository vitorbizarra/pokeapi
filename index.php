<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="assets/js/script.js"></script>

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script src="assets/js/script.js"></script>
	<title>PokeApi</title>
</head>

<body>
	<div class="main-content">
		<!-- <header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-transparent py-4 px-5">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">
						<img src="https://raw.githubusercontent.com/PokeAPI/media/master/logo/pokeapi_256.png" alt="PokeApi" height="50">
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarText">
						<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="#">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Features</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Pricing</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header> -->
		<div class="img-pokemon-area">
			<img src="https://raw.githubusercontent.com/PokeAPI/media/master/logo/pokeapi_256.png" class="img-pokemon-banner" alt="PokéApi">
		</div>
	</div>

	<div class="content py-4">

		<div class="col-pokemon-types">
			<h1 class="mb-4">Types</h1>
			<!-- <form class="d-flex mb-4">
				<input class="form-control me-2" type="search" placeholder="Pesquisa" aria-label="Pesquisa">
				<button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
			</form> -->
			<div class="list-group ul-pokemon-types shadow">
			</div>
			<div class="dropdown dropdown-parent-types shadow">
				<button class="btn btn-light dropdown-toggle select-pokemon-types shadow" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					All
				</button>
				<ul class="dropdown-menu dropdown-types shadow">
					
				</ul>
			</div>
		</div>

		<div class="col-pokemon-cards">
			<h1 class="mb-4 type-title">All</h1>
			<div class="row row-cols-1 row-cols-md-3 g-5 cards-holder">

			</div>
			<div class="load-more-area">
				<button class="btn btn-primary" id="btn-load">Load more</button>
			</div>
		</div>
	</div>
	<div id="loading_wrap">
		<img src="https://user-images.githubusercontent.com/37589213/52086676-d41dce00-25a7-11e9-89fe-51a2aef284a9.gif" class="loading-gif" alt="Loading">
		<h1>Loading...</h1>
	</div>
</body>

</html>