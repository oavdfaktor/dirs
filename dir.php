<?
	$dir_start = $_SERVER['DOCUMENT_ROOT'];
	function scandir_lvl($path, $lvl = 1) {
		$padding = 20;
		$pd = $padding * $lvl;
		$s = scandir($path);
		$arr_dir = array();
		$arr_files = array();
		foreach( $s as $item ) {
			if ( $item == '.' OR $item == '..' ) continue;
			if(is_dir($path.'/'.$item)){
				$arr_dir[] = $item;
			} else {
				$arr_files[] = $item;
			}
		}
		foreach ( $arr_dir as $dir ) {
			echo '<div style="padding: 5px; color: #0000aa; font-weight: bold; margin: 2px 0; padding-left: '.$pd.'px">'.$dir.'</div>';
			scandir_lvl( $path. '/'. $dir, ($lvl+1) );
		}
		foreach ( $arr_files as $file ) {
			echo '<div style="padding: 5px; margin: 2px 0;padding-left: '.$pd.'px">'.$file.'</div>';
		}
	}
	$s = scandir($dir_start);
	$arr_dir = array();
	$arr_files = array();
	foreach( $s as $item ) {
		if ( $item == '.' OR $item == '..' ) continue;
		
		if(is_dir($dir_start.'/'.$item)){
			$arr_dir[] = $item;
		} else {
			$arr_files[] = $item;
		}
	}
	foreach ( $arr_dir as $dir ) {
		echo '<div style="padding: 5px; color: #0000aa; font-weight: bold; margin: 2px 0;">'.$dir.'</div>';
		scandir_lvl( $dir_start . '/' .$dir );
	}
	foreach ( $arr_files as $file ) {
		echo '<div style="padding: 5px; margin: 2px 0;">'.$file.'</div>';
	}
?>
