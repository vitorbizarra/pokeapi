<?php require_once('../vendor/danrovito/pokephp/src/PokeApi.php');

use PokePHP\PokeApi;

$api = new PokeApi;

$limit = $_POST['limit'];
$offset = $_POST['offset'];

$Pokemons = $api->resourceList('pokemon', $limit, $offset);

foreach ($Pokemons->results as $Results) {
	$PokeName = $Results->name;
	$Pokemon = $api->pokemon($PokeName);
	$Types = $Pokemon->types;
?>
	<div class="col">
		<div class="card shadow">
			<div class="card-image image <?= $Types[0]->type->name; ?>">
				<div id="carousel<?= $PokeName; ?>" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<?php
						$i = 0;
						foreach ($Pokemon->sprites->other->home as $pic) {
							if (!is_null($pic)) {
								if (substr_count($pic, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/') == 2) {
									$pic_urls = explode('https://raw.githubusercontent.com/PokeAPI/sprites/master/', $pic, 2);
									$pic = $pic_urls[count($pic_urls) - 1];
								}
						?>
								<div class="carousel-item<?= ($i == 0) ? ' active' : ''; ?>">
									<img src="<?= $pic; ?>" class="card-img-top p-2 d-block w-100" alt="<?= ucwords(str_replace('-', ' ', $Pokemon->name)); ?>">
								</div>
						<?php $i++;
							}
						} ?>
						<?php if (is_null($Pokemon->sprites->other->home->front_default)) { ?>
							<div class="carousel-item active">
								<img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/home/132.png" class="card-img-top p-5 d-block w-100" alt="<?= ucwords(str_replace('-', ' ', $Pokemon->name)); ?>">
							</div>
							<div class="carousel-item">
								<img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/home/shiny/132.png" class="card-img-top p-5 d-block w-100" alt="<?= ucwords(str_replace('-', ' ', $Pokemon->name)); ?>">
							</div>
						<?php } ?>
					</div>
					<a class="carousel-control-prev" href="#carousel<?= $PokeName; ?>" role="button" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					</a>
					<a class="carousel-control-next" href="#carousel<?= $PokeName; ?>" role="button" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
					</a>
				</div>
			</div>
			<div class="card-body">
				<span class="text-muted">
					<?php
					if (strlen($Pokemon->id) == 1) {
						echo "#00{$Pokemon->id}";
					} else if (strlen($Pokemon->id) == 2) {
						echo "#0{$Pokemon->id}";
					} else {
						echo "#{$Pokemon->$id}";
					}
					?>
				</span>
				<div class="title-area">
					<h5 class="card-title"><?= ucwords(str_replace('-', ' ', $Pokemon->name)); ?></h5>
					<ul class="list-group list-group-horizontal ul-tags">
						<?php foreach ($Types as $Type) { ?>
							<li class="list-group-item tag <?= $Type->type->name; ?>"><?= ucfirst($Type->type->name); ?></li>
						<?php } ?>
					</ul>
				</div>
				<div class="info-area mt-4">
					<div class="info-col">
						<p class="text-muted">Weight:</p>
						<p><?= $Pokemon->weight / 10; ?>kg</p>
					</div>
					<div class="info-col">
						<p class="text-muted">Height:</p>
						<p><?= $Pokemon->height / 10 ?>m</p>
					</div>
					<div class="info-col">
						<div class="dropdown">
							<button class="btn btn-light dropdown-toggle" type="button" id="dropdown<?= $PokeName; ?>" data-bs-toggle="dropdown" aria-expanded="false">
								Abilities
							</button>
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown<?= $PokeName; ?>">
								<?php foreach ($Pokemon->abilities as $Ability) { ?>
									<li>
										<p class="dropdown-item-custom"><?= ucwords(str_replace('-', ' ', $Ability->ability->name)); ?></p>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>

				<div class="stats-area mt-4">
					<?php foreach ($Pokemon->stats as $stat) { ?>
						<small class="text-muted"><?= ucwords(str_replace('-', ' ', $stat->stat->name)); ?></small>
						<div class="stats-bar mb-3">
							<ul class="stats-separators list-group-horizontal">
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
							</ul>
							<div class="stats-value" style="width: <?= ($stat->base_stat); ?>%;"></div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>