<?php 

//form handling
//check if submit button was clicked


if(isset($_POST["add_item"])){
	//runs this block
	$file= file_get_contents("./todo.json");
	$json_content= json_decode($file);
	$todoItem = $_POST["todo_item"];
	//sizeof checks for the size of an array


	$itemExist== false;
	for($i=0; $i< count($json_content->items); $i++){
		if($json_content->items[$i]->title==$todoItem){
			//item exist dont save return
			$itemExist= true;
			break;
			header("Location: todo.php?err=item_exist");
		}

	}
		if($itemExist == false){
		//item dosent exist in item array lets add it
			array_push($json_content->items, [
				"title"=>$todoItem,
				"date_created"=>date("Y-m-d"),
				"status"=>"open"
			]);

			//update and save file
			file_put_contents("./todo.json", json_encode($json_content));
			
			
			header("location:todo.php?err=none");
			echo "<script> alert('item added succesfullly') </script>";
		}

	else{
		header("location:todo.php?err=item_exist");
		return;
	}
}


 ?>