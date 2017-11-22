
<?php 
$conn = mysqli_connect('localhost','root','','pagination');
$t = mysqli_query($conn,'SELECT * FROM pagination ');
$total = mysqli_num_rows($t);

$start = 0;
$limit = 10;

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$start = ($id-1)*$limit;
}
else
{
	$id = 1; 
}

$page = ceil($total/$limit);
$query = mysqli_query($conn,"SELECT * FROM pagination LIMIT $start, $limit");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- bootstrap cdn links -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<!--end Bootstrap cdn links-->
	<title>Pagination</title>
</head>
<body>
<div class="container">
	<h2>table</h2>
	<p>the table bordered class adds border on all sides of the table and cells</p>
	
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($ft = mysqli_fetch_array($query)) {?>
			<tr>
				<td><?php echo $ft['0']; ?></td>
				<td><?php echo $ft['1']; ?></td>
			</tr>
			<?php  } ?>
		</tbody>
	</table>

	<!-- pagination html code start -->
	
  <ul class="pagination">
  	<?php if($id > 1){ ?>
    <li class="page-item">
      <a class="page-link" href="?id=<?php echo ($id-1); ?>">Previous</a>
    </li>
    <?php } ?>
    
    <!--how many page making total data field-->
    <?php for($i=1; $i <= $page;$i++){ ?>
    <li class="page-item"><a class="page-link" href="?id=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php } ?>

	<?php if($id != $page){ ?>
    <li class="page-item">
      <a class="page-link" href="?id=<?php echo ($id+1); ?>">Next</a>
    </li>
    <?php } ?>
  </ul>
    
<!--end pagination html code start -->

</div>

</body>
</html>