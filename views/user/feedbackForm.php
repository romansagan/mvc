<?php echo'

<div class="container" id="container">
	
    <div class="row">
        <div class="col-sm-8 col-lg-8 offset-2">
            <h1 class="h1">
                Feedback us </h1>
        </div>
	</div>
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="well well-sm">
                <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                User Name</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter name" required="required" maxlength="45"/>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="type">
                                Type</label>
                            <select id="type" name="type" class="form-control" required="required">';
foreach ($feedbackTypes as $type) {
	echo " <option value=".$type['id']. ">". $type['name']."</option>";
}

echo '    </select>
                        </div>
                        <div class="form-group">
                            <label for="title">
                                Title</label>
                            <input type="text" class="form-control" name ="title" id="title" placeholder="Enter title" required="required" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="text">
                                Text</label>
                            <textarea name="text" id="text" class="form-control" rows="12" cols="25" required="required"
                                placeholder="Text"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="sendFeedbackButton">
                            Send Feedback</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
     
    </div>
</div> '?>
