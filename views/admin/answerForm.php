<?php echo'

<div class="container" id="container">
	
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="well well-sm">
                <form method="post">
                <div class="row">
                    
                    <input type="hidden" class="form-control" id="feedbackId" name="feedbackId" value="',$feedbackId,'"/>
                    <input type="hidden" class="form-control" id="email" name="email" value="',$email,'"/>
                       
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="text">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="12" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success pull-right" id="sendAnswerButton">
                           Send Answer </button>
                             
                    </div>
                </div>
                </form>
            </div>
        </div>
     
    </div>
</div> '?>
