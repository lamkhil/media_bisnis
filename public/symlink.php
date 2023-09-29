<?php
	//lokasi resources / storage
	$targetFolder = '/var/www/html/bisnis.sumu.or.id/bisnis_storage/storage/app/public/';
	//lokasi public_html / link shortcut
	$linkFolder = '/var/www/html/bisnis.sumu.or.id/public/storage/';
	symlink($targetFolder,$linkFolder);
	echo '<br>';
	echo readlink($linkFolder).' - '.$linkFolder;;
	echo 'Symlink Completed';
?>
