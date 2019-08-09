<?php echo'
<div class="container" id="container">


<div class="row">
	<div class="col-md-8 offset-2">
	<h3>Filters</h3>
<div class="input-group mb-3">
 <label for="statusFilter" class="col-form-label">Status:</label><br>
   <select class="custom-select" id="statusFilter">
    <option value="" selected>Choose feedback status...</option>';
foreach ($feedbackStatuses as $feedbackStatus) {
   echo" <option value=\"$feedbackStatus[id]\">$feedbackStatus[name]</option>";
}
  echo '  </select>
</div>

<div class="input-group mb-3">
 <label for="typeFilter" class="col-form-label">Type:</label><br>
   <select class="custom-select" id="typeFilter">
    <option value=""  selected>Choose feedback type...</option>';
foreach ($feedbackTypes as $feedbackType) {
   echo" <option value=\"$feedbackType[id]\">$feedbackType[name]</option>";
}
  echo '  </select>
</div>

</div>
</div>
<div id ="feedbackBoard">
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
					<td> "; if($feedback['status_id'] != 3){echo "No";} else {echo "Yes";}

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

</div>
</div>	';?>
