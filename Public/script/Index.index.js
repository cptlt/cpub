var h = document.getElementsByTagName("h4");
for (var i=0; i < h.length; i++) {
	
	h[i].onclick = function(e) {
		
		var next = e.currentTarget.nextSibling
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
