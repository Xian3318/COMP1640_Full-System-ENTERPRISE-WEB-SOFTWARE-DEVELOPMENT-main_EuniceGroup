<?php
	session_start();
	include('conn.php');
?>

<?php
		$output = '';
		if (isset($_POST["export_excel"]))
		{
			$sql = "SELECT idea.ideaTitle, idea.ideaText, idea.postDate, idea.postTime, comment.commentText, comment.commentDate, comment.commentTime FROM idea JOIN managedata ON idea.ideaID = managedata.ideaID JOIN comment ON comment.commentID = managedata.commentID  ";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result)>0)
			{
				$output .= '
				<table class ="table" bordered="1">
				<tr>
                    <th>Idea Description</th>
					<th>Post Date</th>
					<th>Post Time</th>
					<th>Comments</th>
					<th>Comment Date</th>
					<th>Comment Time</th>
				</tr>
				';
				while($row = mysqli_fetch_array($result))
				{
					$output .= '
						<tr>
						<td> '.$row["ideaTitle"].'</td>
						<td> '.$row["ideaText"].'</td>
						<td> '.$row["postDate"].'</td>
						<td> '.$row["postTime"].'</td>
						<td> '.$row["commentText"].'</td>
						<td> '.$row["commentDate"].'</td>
						<td> '.$row["commentTime"].'</td>
						
						</tr>
					';
				}
				$output .= '</table>';
				header("Content-Type: application/xls");
				header("Content-Disposition: attachment; filename=download.xls");
				echo $output;
				}
			}


?>