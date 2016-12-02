<?php
//echo "Hola ". $nombre;


if (empty($users)){
	echo "Sin conzactos";
} else {

	foreach ($users as $user) {
		echo $user->name;
	}

	echo count($users)." Conatctos";
}
?>