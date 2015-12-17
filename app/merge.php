<?php

$pdo = new PDO('sqlite:' . __DIR__ . '/storage/db.sqlite');
$sql = file_get_contents(__DIR__ . '/storage/schema.sql');
$pdo->exec($sql);

$sql = 'INSERT INTO "downloads" ("date", "ip", "ua") VALUES(?, ?, ?)';
$ins = $pdo->prepare($sql);

$pdo1 = new PDO('sqlite:' . __DIR__ . '/storage/stats.db');
$stm1 = $pdo1->prepare('SELECT * FROM "active"');
$stm1->execute();

while($row = $stm1->fetch(PDO::FETCH_OBJ)) {
	$ins->execute([$row->date, $row->ip, $row->ua]);
}

$stm1 = $pdo1->prepare('SELECT * FROM "downloads"');
$stm1->execute();

while($row = $stm1->fetch(PDO::FETCH_OBJ)) {
	$ins->execute([$row->date, $row->ip, $row->ua]);
}

$pdo2 = new PDO('sqlite:' . __DIR__ . '/storage/stats.sqlite');
$stm2 = $pdo2->prepare('SELECT * FROM "active"');
$stm2->execute();

while($row = $stm2->fetch(PDO::FETCH_OBJ)) {
	$ins->execute([$row->date, $row->ip, $row->ua]);
}

$stm2 = $pdo2->prepare('SELECT * FROM "downloads"');
$stm2->execute();

while($row = $stm2->fetch(PDO::FETCH_OBJ)) {
	$ins->execute([$row->date, $row->ip, $row->ua]);
}
