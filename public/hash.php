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

$id = $_REQUEST['id'];

$player = $player_repo->get($id);

print '?id=' . $player->id . '&hash=' . $player_repo->getHash($player);