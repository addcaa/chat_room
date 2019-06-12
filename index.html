<style>
.bra{
    border:1px;
    border-style:solid;
    height: 400px;
    width: 400px;
};
.a{
    margin:0 auto
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>聊天室</title>
</head>
<body>
    <div class="bra">
        <p id="p"></p>
    </div>
    <div class="a">
        <input type="text" id="text">
        <input type="submit" id="sub" value="发送">
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
   var ws = new WebSocket("ws://character.com:9502");
    ws.onopen=function(){
        $(function(){
        $("#sub").click(function(){
            var text=$("#text").val();
            var data={
                type:"message",
                text:text,
                id:111,
                data:Date.now()
            }
            ws.send(JSON.stringify(data));
        })
    })
    }

    ws.onmessage=function(d){
        var str = d.data;
        var data=JSON.parse(str);

        $("#p").append(data.text).append('<br>');
    }
</script>
