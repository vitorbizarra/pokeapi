<?php require_once('../vendor/danrovito/pokephp/src/PokeApi.php');

use PokePHP\PokeApi;

$api = new PokeApi;

$allPokemons = $api->resourceList('pokemon');

$Types = $api->pokemonType('');
?>
<li>
    <button class="btn list-group-item d-flex justify-content-between button-all dropdown-item align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">All</div>
        </div>
        <span class="badge bg-secondary rounded-pill"><?= $allPokemons->count; ?></span>
    </button>
</li>


<?php

foreach ($Types->results as $Results) {
    $TypeName = $Results->name;
    $Type = $api->pokemonType($TypeName);
    if ($Type->name != 'unknown' && $Type->name != 'shadow') {
?>
<li>
    <button class="btn list-group-item d-flex justify-content-between button-types dropdown-item align-items-start<?= " $Type->name"; ?>" data-id="<?= "$Type->name"; ?>">
        <div class="ms-2 me-auto">
            <div class="fw-bold"><?= ucfirst($Type->name); ?></div>
        </div>
        <span class="badge<?= " $Type->name"; ?> rounded-pill"><?= count($Type->pokemon); ?></span>
    </button>
</li>
<?php }
} ?>