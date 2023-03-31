<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <script src="app.js" defer></script>
    <title>Nástěnka</title>
</head>

<body>
<div class="topnav">
        <div class="topnav-centered">
            <a class="active" href="/index.php">Sticky Notes</a>
            <a href="/stats.php">Statistics</a>
        </div>
        

</div>

<button class="button" onclick="openForm()">+</button>
<ul>
  <li>
    <a href="#">
      <p>Title #1</p>
      <p>Text Content #1</p>
    </a>
  </li>
  <li>
    <a href="#">
      <p>Title #2</p>
      <p>Text Content #2</p>
    </a>
  </li>
  <li>
    <a href="#">
      <p>Title #1</p>
      <p>Text Content #1</p>
    </a>
  </li>
  <li>
    <a href="#">
      <p>Title #2</p>
      <p>Text Content #2</p>
    </a>
  </li>
    <li>
    <a href="#">
      <p>Title #1</p>
      <p>Text Content #1</p>
    </a>
  </li>
  <li>
    <a href="#">
      <p>Title #2</p>
      <p>Text Content #2</p>
    </a>
  </li>


</ul>    
    <form class="form" action="/action_page.php" id=myForm>
        <div class=sticky-note>
            <button class=close onclick="closeForm()">x</button>
            <textarea class="text" rows="14" cols="10" wrap="soft" maxlength="120"
                style="overflow:hidden; resize:none;"></textarea>
            <textarea class="sign" rows="3" cols="10" wrap="soft" maxlength="20"
                style="overflow:hidden; resize:none;"></textarea>
            <button class="button2">Submit</button>
        </div>

    </form>
    <form class="form" action="/action_page.php" id=myForm1>
        <div class=sticky-note>
            <textarea class="text" rows="14" cols="10" wrap="soft" maxlength="120"
                style="overflow:hidden; resize:none;"></textarea>
            <textarea class="sign" rows="3" cols="10" wrap="soft" maxlength="20"
                style="overflow:hidden; resize:none;"></textarea>
            <input class="button2" value="Submit">
        </div>

    </form>

    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        } function editForm() {
            document.getElementById("myForm1").style.display = "block";
        } function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }


    </script>
</body>

</html>