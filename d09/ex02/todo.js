function add_todo() {
    var res = prompt("Add new TO DO");
    if (res) {
        var list = document.getElementById('ft_list');
        var new_el = document.createElement('div');
        var text = document.createTextNode(res);
        new_el.appendChild(text);
        new_el.setAttribute('onclick', "del_todo(this);");
        list.insertBefore(new_el, list.firstChild);
        document.cookie = "list=1";
    }
    console.log(document.cookie);
}

function del_todo(elem) {
    if (confirm("delete \"" + elem.innerHTML + "\"")){
        elem.remove();
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

window.onload = function () {
    var div = getCookie('list');
  //  document.appendChild(div);
};