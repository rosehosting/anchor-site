/**
 *   Typer
 */
var typer = document.querySelector('[data-typer]');
var body = document.body;
var oldClass = body.className;

if(typer) {
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
	}, 75);
};

var dropdown = document.querySelector('.dropdown a');
var targetClass = 'open';

if(dropdown) {
	dropdown.onclick = function(e) {
		e.preventDefault();

		this.className = (this.className == targetClass ? '' : targetClass);
	};

	document.onclick = function(e) {
		if(e.target != dropdown) {
			dropdown.className = '';
		}
	};
};

var cycle = document.querySelectorAll('.cycle *');
var len = 0;

if(len = cycle.length) {
	var current = 0;
	var setActive = function(el) {
		var active = document.querySelector('.cycle .active');
		if(active) active.className = '';

		el.className = 'active';
	};

	setActive(cycle[current]);

	setInterval(function() {
		current++;
		if(current == len) {
			current = 0;
		}

		setActive(cycle[current]);

	}, 3000);
}

var active = document.querySelector('.sidebar .active');

if(active) {
	var ul = active.parentNode;
	var heading = ul.previousSibling.previousSibling;

	heading.className = 'is-active';
}