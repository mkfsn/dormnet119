
// For background, using HTML5

var canvas = document.getElementsByTagName('canvas')[0],
	ctx = null,
	grad = null,
	body = document.getElementsByTagName('body')[0],
	height = 300,
	color1 = '#BBBDCC',
	color2 = '#2E2F33'
	;

if (canvas.getContext('2d')) 
{
	ctx = canvas.getContext('2d');

	body.onmousemove = function (event) {
	grad = ctx.createLinearGradient(0, 0, 0, height);
	grad.addColorStop(0, color1);
	grad.addColorStop(1, color2);
	ctx.restore();
	ctx.fillStyle = grad;
	ctx.fillRect(0, 0, height, height);
	ctx.save();
	};
}

