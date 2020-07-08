<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>



<style>

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  background-color: #eee;
  font-family: 'helvetica neue', helvetica, arial, sans-serif;
  color: #222;
}

#form {
  max-width: 700px;
  padding: 2rem;
  box-sizing: border-box;
}

.form-field {
  display: flex;
  margin: 0 0 1rem 0;
}
label, input {
  width: 70%;
  padding: 0.5rem;
  box-sizing: border-box;
  justify-content: space-between;
  font-size: 1.1rem;
}
label {
  text-align: right;
  width: 30%;
}
input {
  border: 2px solid #aaa;
  border-radius: 2px;
}


</style>




<body>



<form method="post" action="<?php echo base_url(); ?>index/shorten_url" id="form" class="validate">
  <div class="form-field">
    <label for="full-name">URL : </label>
    <input type="text" name="url_value" id="url_value" placeholder="Enter link here" required />
  </div>
  
    
  <div class="form-field">
    <label for=""></label>
    <input type="submit" value="Shorten URL" name="url_shorten_submit" />
  </div>
</form>

<?php 

if(!empty($urls))
{
?>

<table border="1">
	
<tr>
	<th>No</th>
	<th>Url</th>
	<th>Shorten Url</th>
	<th>Hits</th>
	<th>Action</th>
</tr>

<?php
$i=1;
foreach($urls as $url)
{


?>
<tr>
	<td><?php echo $i++; ?></td>
<td><?php echo $url->url; ?></td>
<td><?php echo $url->short_code; ?></td>
<td><?php echo $url->hits; ?></td>
<td><a target="_blank" href="<?php echo base_url(); ?><?php echo $url->short_code; ?>">Go</a></td>


	</tr>
<?php
}
?>

</table>
<a href="<?php echo base_url(); ?>index/report">Url Visits in Hour</a>
<?php
}
?>



</body>
</html>