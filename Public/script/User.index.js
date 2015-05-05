//获取子元素节点
function nodeChilds(node){
	var childs = [];
    for(var nextNode = node.firstChild;nextNode;nextNode = nextNode.nextSibling){
        if(nextNode.nodeType == 1){
            childs.push(nextNode);
        }
    }
    return childs;
}

//修改下拉文字内容
var dropdownMenu = document.getElementById("dropdown-menu");
var dropdownMenuChilds = nodeChilds(dropdownMenu);
var dropdownMenu1 = document.getElementById("dropdownMenu1");
for (var i = 0;i < dropdownMenuChilds.length;i++) {
	dropdownMenuChilds[i].onclick = function(num) {
		return function() {
			dropdownMenu1.innerHTML = dropdownMenuChilds[num].firstChild.innerHTML+' <span class="caret"></span>';
		}
	}(i)
}
//添加按钮功能  添加，删除 帮助按钮
var addBtn = document.getElementById("add");
var deleteBtn = document.getElementById("delete");
addBtn.onclick = function() {
	this.href = "add.html";
}
deleteBtn.onclick = function() {
	this.href = "edit.html";
}




