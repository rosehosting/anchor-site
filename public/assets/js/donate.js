var Donate = function(pkey, button, input) {
	var amount;

	var serialize = function(obj) {
		var str = [];

		for(var p in obj) {
			if(obj.hasOwnProperty(p)) {
				str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
			}
		}

		return str.join("&");
	};

	var xhr = function(uri, data, callback) {
		var request = new XMLHttpRequest();
		request.open('POST', uri, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		request.onload = function() {
			if(200 == request.status) {
				callback(JSON.parse(request.responseText));
			}
		}
		request.send(serialize(data));
	};

	var donated = function(response) {
		if (_gs != 'undefined') {		
			_gs('transaction', 'donation', {
				track: true
			}, [
				{
					name: 'donation',
					price: amount
				}
			]);
		}
	};

	var handler = StripeCheckout.configure({
		'key': pkey,
		'image': '/assets/img/logo-128.png',
		'token': function(token, args) {
			xhr('/donate', {'token': token.id, 'amount': amount, 'email': token.email}, donated);
		}
	});

	button.addEventListener('click', function(e) {
		amount = parseInt(input.value, 10) * 100; // in cents

		handler.open({
			'name': 'Anchor CMS',
			'description': 'Donation',
			'amount': amount
		});

		e.preventDefault();

		if (_gs != 'undefined') {		
			_gs('event', 'Donate clicked');
		}
	});
};