<!DOCTYPE html>
<html>
<head>
<title>
Sample
</title>
<script type="text/javascript">
function fun1(argument=null) {
    alert("onblur event");

}
function fun2(argument=null) {
    alert("onclick");

}
function fun3(argument=null) {
    alert("onkeyup");

}
function fun4(argument=null) {
    alert("onkeydown");

}
function fun5(argument=null) {
    alert("onkeypress");

}
</script>
</head>
<body>
<form>
Type something<input type="text" name="name" onblur="fun1()"><br>
button<input type="button" name="name" value="click" onclick="fun2()"><br>
Type <input type="text" name="name" onkeyup="fun3()"><br>
Type <input type="text" name="name" onkeydown="fun4()"><br>
Type <input type="text" name="name" onkeypress="fun5()"><br>
</form>
</body>
</html>

