<?php // [Info.] Function prototypes
	
	///--------------------------------------------------
	/// \brief	Get root path
	/// \param	$nameRoot		|	Name of root directory
	/// \return		Root path
	///__________________________________________________
	if(!function_exists('get_rootPath'))
	{
		function get_rootPath($nameRoot)
		{
			$str = realpath('.');
			$arr = explode('\\', $str);
			$ct = count($arr);
			$i;
			
			for ($i = 0; $i < $ct; ++$i)
			{
				if ($arr[$i] == $nameRoot)
					break;
			}
			
			if ($i < $ct)
			{
				$arr = array_slice($arr, 0, $i);
				$str = implode('\\', $arr);
			}
			else // No corresponding root name found
			{
				return 'ERROR! Request wrong root name or directory does NOT exist';
			}
			
			return "$str" . '\\' . $nameRoot;
		}
	}

?>

<?php // [Info.] Require main page
	
	$root = get_rootPath('dormnet');
	
	require_once "$root" . '\index.php';
?>
