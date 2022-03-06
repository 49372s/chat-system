const form = document.getElementById('chat-box');
let old_msg = "";

const send = new Audio('/config/sound/send.mp3');
const sony = new Audio('/config/sound/sony.mp3');

form.onsubmit = function (e) {
    e.preventDefault();
    $.post("/config/api/post.php", {"msg":form.msg.value},
        function (data) {
            console.log(data);
            form.msg.value = "";
            reloadMsg();
            old_msg = document.getElementById('chat').innerHTML;
            send.play();
        }
    );
}

function reloadMsg(){
    $.post("/config/api/load.php", {"size": 0},
        function(data){
            document.getElementById('chat').innerHTML = data;
        })
}

function updateActivity(){
    $.post("/config/database/update.php", {"size": 0},
        function(data){
            document.getElementById('cpu').innerText = (data*100)+"%";
        })
}

function chkOnline(){
    $.post("/config/api/online.php", {"size": 0},
        function(data){
            document.getElementById('online').innerHTML = data;
        })
}

function update(){
    reloadMsg();
    updateActivity();
    chkOnline();
}

window.onload = function(){
    update();
    old_msg = document.getElementById('chat').innerHTML;
}

let sec = 6;

setInterval(function () {
    sec--;
    document.getElementById('next-up').innerHTML = sec;
    if(sec<4){
        document.getElementById('next-up').innerHTML = '<span style="color: red;">'+sec+'</span>';
    }
    if(sec==1){
        sec = 6;
    }
},1000)

setInterval(function(){
    update();
    if(document.getElementById('chat').innerHTML!=old_msg){
      sony.play();
    }
    old_msg = document.getElementById('chat').innerHTML;
},5000);

function insertUrl(){
    let url = window.prompt("移動先のURL","http://");
    if(url==null){
        window.alert("キャンセルされました。");
        return 0;
    }
    let name = window.prompt("リンクの名前");
    if(name==null){
        window.alert("キャンセルされました。");
        return 0;
    }
    form.msg.value = form.msg.value + '<a href="'+url+'">'+name+'</a>';
    form.msg.focus();
}

function insertBr(){
    form.msg.value = form.msg.value + '<br>';
    form.msg.focus();
}