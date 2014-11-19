<h1>My Favourite Cats</h1>
<ul>
<?php foreach($cats as $k => $v){
  echo '<li><img src="'.$v.'"></li>';
} 
?>
</ul>
<form action="/add" method="post" >
  <input type="text" name="url">
  <input type="submit" value="Add">
</form>
