var login = document.getElementById('login');
var pass = document.getElementById('password');
var IdDomisep = document.getElementById('IdDomisep');

login.addEventListener('blur', function () {
	var inputVal = this.value;

		if (inputVal) {
		this.classList.add('isNotEmpty');
		} else {
		this.classList.remove('isNotEmpty');
		}
	});


pass.addEventListener('blur', function () {
	var inputVal = this.value;

		if (inputVal) {
		this.classList.add('isNotEmpty');
		} else {
		this.classList.remove('isNotEmpty');
		}
	});

IdDomisep.addEventListener('blur', function () {
	var inputVal = this.value;

		if (inputVal) {
		this.classList.add('isNotEmpty');
		} else {
		this.classList.remove('isNotEmpty');
		}
	});