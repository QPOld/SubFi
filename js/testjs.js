function run() {
    document.write('SubFi Game')
    var canvas = document.createElement("canvas");
    var ctx = canvas.getContext("2d");
    var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    canvas.width = width
    canvas.height = height
    ctx.fillStyle="#FF0000";
    ctx.fillRect(20,20,150,100);
    document.body.appendChild(canvas);
    
    } 
