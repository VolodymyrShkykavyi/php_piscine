
function add_todo() {
    var res = prompt("Add new TO DO");
    var list = document.getElementById('ft_list');
    if (res) {
        var new_el = document.createElement('div');
        var text = document.createTextNode(res);
        new_el.appendChild(text);
        new_el.setAttribute('onclick', 'del_todo(this);');
        list.insertBefore(new_el, list.firstChild);
    }
    setCookie('todo_list', encodeURI(list.innerHTML));
    console.log(document.getElementById('ft_list').innerHTML);
}

function del_todo(elem) {
    if (confirm("delete \"" + elem.innerHTML + "\"")){
        elem.remove();
        var list = document.getElementById('ft_list');
        setCookie('todo_list', encodeURI(list.innerHTML));
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



function setCookie(name, value)
{
    var today = new Date();
    var expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000); // plus 30 days
    document.cookie=name + "=" + value + "; path=/; expires=" + expiry.toGMTString();
}

window.onload = function () {

    var data = getCookie('todo_list');
    if (data) {
        console.log(decodeURI(data));
        document.getElementById('ft_list').innerHTML = decodeURI(data);
    }
};
