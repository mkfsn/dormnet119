
//========== jQuery ==========

//{----- Global variables -----
	var var_lastTextAreaClicked = false;
	
//}


//{----- Global functions -----
	var func_ini = function() {

	}

//}



$(document).ready (
	// Ini. func.
	function init() {
		func_ini();
	}
);

$(document).ready (
	function() {
		$("div.textarea_typ16px textarea").click (
			function() {
				if ( !var_lastTextAreaClicked) // If first clicked -> select all
				{
					$(this).select();
					var_lastTextAreaClicked = true;
				}
			}
		);
	}
);
