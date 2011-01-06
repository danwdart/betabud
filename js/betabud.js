$('document').ready(function(){

var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var clicking = false;

$('#canvas').mousedown(function(e){
	x = e.pageX - $("#canvas").offset().left;
	y = e.pageY - $("#canvas").offset().top;
	context.moveTo(x,y);
	clicking=true;
});
$('#canvas').mouseup(function(){
	clicking=false;
	});
$('#canvas').mousemove(function(e){
	x = e.pageX - $("#canvas").offset().left;
    y = e.pageY - $("#canvas").offset().top;
	if(clicking)
	{
		$('#a').html(x+" "+y);
		context.lineTo(x,y);
		context.stroke();
	}
});

});
