var h = document.getElementsByTagName("h4");
var externalFrame = document.getElementById("external-frame");
for (var i=0; i < h.length; i++) {
	h[i].onclick = function(e) {
		var current = e.currentTarget;
		var next = current.nextSibling
		next = next.nextSibling;
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

//自适应Ifram高度
function setIframeHeight(iframe) {
	if (iframe) {
		var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
		if (iframeWin.document.body) {
			iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
		}
	}
};
window.onload = function () {
	setIframeHeight(externalFrame);
};

//更改IFrame的src
function nodeChilds(node){
	var childs = [];
    for(var nextNode = node.firstChild;nextNode;nextNode = nextNode.nextSibling){
        if(nextNode.nodeType == 1){
            childs.push(nextNode);
        }
    }
    return childs;
}
var menuChilds = nodeChilds(document.getElementById("menu"));
var contentChilds = nodeChilds(document.getElementById("content"));
var vipChilds = nodeChilds(document.getElementById("vip"));
vipChilds[0].onclick = function() {
	externalFrame.src = "../User/index.html";
}
vipChilds[1].onclick = function() {
	externalFrame.src = "../User/add.html";
}
vipChilds[1].onclick = function() {
	externalFrame.src = "../User/add.html";
}
vipChilds[2].onclick = function() {
	externalFrame.src = "../User/edit.html";
}
