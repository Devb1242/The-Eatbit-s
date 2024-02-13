function check() {

	var pas = document.getElementById('pas').value;
	var cnpas = document.getElementById('cnpas').value;

	if (pas != cnpas) {
		document.getElementById('cnpas').setCustomValidity("Not Matched");
	}
	else {
		document.getElementById('cnpas').setCustomValidity("");
	}
}


function triggerClick() {
	document.querySelector('#profileimg').click();

}

function displayimg(e) {
	if (e.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			document.querySelector('#placeholderimg').setAttribute('src', e.target.result);
		}
		reader.readAsDataURL(e.files[0]);
	}
}


