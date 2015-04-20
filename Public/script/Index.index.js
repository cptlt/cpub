var h = document.getElementsByTagName("h4");
for (var i=0; i < h.length; i++) {
	
	h[i].onclick = function(e) {
		var current = e.currentTarget;
		var next = current.nextSibling
		var bool = next.className.indexOf("hide");
		if (bool > 0) {
			
			var show = next.className.replace(/hide/,"show");
			next.className = show;
		} else {
			
			var hide = next.className.replace(/show/,"hide");
			next.className = hide;
		}
	}
}


var defaul = document.getElementById("dropdownMenu1");
var dropdown = document.getElementById("dropdown");
var dropwownMenu = document.getElementById("dropdown-menu");
var a = dropwownMenu.getElementsByTagName("a");
dropdown.onclick = function() {
	var className = dropwownMenu.className;
	var bool = className.indexOf("hide");
	if(bool > 0) {
		dropwownMenu.className = className.replace(/hide/,"show");
	} else {
		dropwownMenu.className = className.replace(/show/,"hide");
	}
}
for (var i = 0;i < a.length; i++) {
	a[i].onclick = function(e) {
		defaul.firstChild.data = e.currentTarget.innerHTML;
	}
}

