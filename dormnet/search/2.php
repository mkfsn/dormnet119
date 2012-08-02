<?php // [Info.] Function prototypes

	//--------------------------------------------------
	// \brief	Get slash type (Slash or backslash)
	// \return		Either slash or backslash
	//__________________________________________________
	if ( !function_exists('get_typSlash'))
	{
		function get_typSlash()
		{
			$pos = strpos(realpath('.'), '/');
			
			if (false === $pos)
			{
				return '\\';
			}
			else
			{
				return '/';
			}
		}
	}

	///--------------------------------------------------
	/// \brief	Get root path
	/// \param	$nameRoot		|	Name of root directory
	/// \return		Root path
	///__________________________________________________
	if( !function_exists('get_rootPath'))
	{
		function get_rootPath($nameRoot)
		{
			$typSlash = get_typSlash();
			$str = realpath('.');
			$arr = explode("$typSlash", $str);
			$ct = count($arr);
			$i = array_search("$nameRoot", $arr);

			if (false !== $i)
			{
				$arr = array_slice($arr, 0, $i);
				$str = implode("$typSlash", $arr);
			}
			else // No corresponding root name found
			{
				return 'ERROR! Request wrong root name or directory does NOT exist (Path)';
			}
			
			return "$str" . "$typSlash" . $nameRoot;
		}
	}

?>

<?php // [Info.] Require main page

	$root = get_rootPath('dormnet');

	require_once "$root" . '/' . 'index.php';
?>
