<?php echo'

<blockquote class="blockquote text-center">
	<h1> Feedbacks board</h1>
</blockquote>
<div class="row">
	<div class="col-md-8 offset-2">
		<table class="table table-striped">
			<thead>
			<tr>
				<th scope="col">Title</th>
				<th scope="col">Answered</th>
				<th scope="col">Rejected</th>
				<th scope="col">Answer</th>
			</tr>
			</thead>
			<tbody>';
			foreach ($feedbacks as $feedback) {echo"
				<tr>
					<td>  $feedback[title] </td>
					<td> "; if($feedback['status_id'] != 2){echo "No";} else {echo "Yes";} echo" </td>
					<td> ";if($feedback['status_id'] != 3){echo "No";} else {echo "Yes";}

				echo"
				</td>
					<td> <a class='showDetail' href=\"/answer/$feedback[id]\">Answer </a> </td>
				</tr>";
			}
			 echo'
			</tbody>
		</table>
		'.$pagination. '
	</div>
</div>

	';?>
