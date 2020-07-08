<a href="<?php echo base_url(); ?>">Home</a>

<?php 

if(!empty($report))
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
foreach($report as $url)
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
<?php
}
?>