<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to admin page</title>
</head>
<body>
  <h1>admin saerch </h1>
<p>Start typing a name in the input field below:</p>
<p>Suggestions: <span id="txtHint"></span></p>
<form>
First name: <input type="text" onkeyup="showHint(this.value)">
</form>
<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  xmlhttp.open("GET", "getadminName.php?q=" + str);
  xmlhttp.send();
  }
}
</script>
    
</body>
</html>