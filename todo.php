<?php 


	// load file

	
	$a_file = file_get_contents('./todo.json');


	// decode to an array

	$a_content = json_decode($a_file);

	//var_dump($a_content);

?>


<!DOCTYPE html>
<html>
	<head>
 		<title> sample todo</title>
 		<link rel="stylesheet" type="text/css" href="layout.css">
 			
	</head>
	<body>
 		<div class="wrapper">
 			<h1>Todo app</h1>
 	
  	
				<form action="process.php" method="POST">
					<input type="text" placeholder="enter todo item" name="todo_item">
					<input type="submit" value="Add Item" name="add_item">

				</form>

						<br> <br> <br>
					<div class="todo-list">

						<br> 



						<table>

	
							<tr>
								<th>Task</th>
								<th>Date Added</th>
			
							</tr>
								<?php for($i=0;  $i<sizeof($a_content->items); $i++):
								//if ($a_content->items[$i]->status="open") { 
								?>

							<tr>
            					<td> <?php echo $a_content->items[$i]->title; ?> </td>
            					<td> <?php echo $a_content->items[$i]->date_created; ?> </td>
            
        					</tr>

       							<?php


        
								endfor; ?>
	
						</table>
					</div>

		</div>
	</body>
</html>