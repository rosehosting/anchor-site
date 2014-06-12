/**
 *   Typer
 */
var typer = document.querySelector('[data-typer]');
var body = document.body;
var oldClass = body.className;

if(typer.nodeType) {
	var typerText = typer.textContent;
	var typedText = '';
	
	body.className += ' typing';
	
	var typerInterval = setInterval(function() {
		var len = typedText.length;
		
		typer.innerHTML = typedText = typerText.substr(0, len + 1);
		
		if(len + 5 >= typerText.length) {
			body.className = oldClass;
		}
		
		if(typedText == typerText) {
			clearInterval(typerInterval);
		}
	}, 100);
}