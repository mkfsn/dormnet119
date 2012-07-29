
<?php
	// [Info.] URL manipulation func.
	
	//\brief	Get parent directory of certained levels
	//\param	$url	|	Original URL
	//			$level	|	How many levels to get parent dir. (0 : Nothing changes)
	//\return	Result directory
	function get_parent_dir($url, $level)
	{
		for ( ; $level > 0; --$level)
		{
			$url = dirname($url);
		}
		
		return $url;
	}
?>

<?php
	// [Info.] Require index page
	
	$path = get_parent_dir(__FILE__, 2); // Path of home directory

	// Require main index file
	require "$path" . '/index.php';
?>
