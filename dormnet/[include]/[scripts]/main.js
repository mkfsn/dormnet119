
//========== jQuery ==========

//{----- Global variables -----
	// If user has clicked textarea_typ16px
	var var_lastTextAreaClicked = false;
	// Preload images
	var var_preloadImages = [
		'/dormnet/[include]/[images]/banner.png',
		'/dormnet/[include]/[images]/content_bg.png',
		'/dormnet/[include]/[images]/navbar_bg.png'
	];
//}


//{----- Global functions -----
	var func_ini = function() {

	}

//}


//{----- Ini. func. -----
$(document).ready (
	function init() {
		func_ini();
	}
);
//}


//{----- Events -----

// \event	When document is ready
$(document).ready (
	function() {
		//--------------------------------------------------
		// \event	When clicks textarea (16px)
		// \brief	Select all text (Only first time)
		// \var		var_lastTextAreaClicked			|	Record if user has clicked textarea
		//__________________________________________________
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

// \event	For each image
$(var_preloadImages).each(function() {
	// Preload images
	var image = $('<img />').attr('src', this);
});

//}

