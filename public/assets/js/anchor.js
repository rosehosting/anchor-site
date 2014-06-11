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
		typedText = typerText.substr(0, typedText.length + 1);
		
		typer.innerHTML = typedText;
		
		console.log(typedText, typerText);
		
		if(typedText == typerText) {
			body.className = oldClass;
			clearInterval(typerInterval);
		}
	}, 100);
}