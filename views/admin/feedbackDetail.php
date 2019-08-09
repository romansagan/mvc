<?php echo '

<div class="container" id="container">
	
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="well well-sm">
                <form method="post">
                <div class="row">
                    <div class="col-md-6">
                    <input type="hidden" class="form-control" id="feedbackId" name="feedbackId" value="', $feedbackDetail['id'], '"/>
                        <div class="form-group">
                            <label for="username">
                                User Name</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter name"  value="', $feedbackDetail['username'], '"/>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="', $feedbackDetail['email'], '" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Type</label>
                            <input type="text" id="type" name="type" class="form-control" value="', $feedbackDetail['type'], '">';

echo '    
                        </div>
                        <div class="form-group">
                            <label for="title">
                                Title</label>
                            <input type="text" class="form-control" name ="title" id="title" placeholder="Enter title" value="', $feedbackDetail['title'], '" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="text">
                                Message</label>
                            <textarea name="text" id="text" class="form-control" rows="12" cols="25" required="required"
                                placeholder="Text">', $feedbackDetail['text'], '</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">';
if ($feedbackDetail['status_id'] == 1 ) {
	echo '<button type="button" class="btn btn-success pull-right" id="answerButton">
	Answer Feedback</button>';
	echo '<button type="button" class="btn btn-primary pull-left" id="rejectButton">
	Reject Feedback</button>';
}

echo '            
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div> ' ?>
