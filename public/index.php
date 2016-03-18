<?php

require_once '../DB.php';
require_once '../Player.php';
require_once '../Hasher.php';

// Obviously, if this were in a production environment,
// the connection string information would be stored
// and handled more securely
$db = new DB('mysql', 'localhost', 'sgi_demo', 'demo', 'demo');
$hasher = new Hasher();
$player_repo = new PlayerRepository($db, $hasher);

// In this case we are going to simulate routing rather
// than actually implement it. Routing would respond to an
// endpoint request like /api/player/{id}/update
require_once '../Controllers/Api/SlotMachineController.php';

$controller = new \Controllers\Api\SlotMachineController($player_repo);

// Normally we would get the id as part of the routing,
// but for the sake of this example, we will grab it from
// the request.
$id = $_REQUEST['id'];

return $controller->update($id);