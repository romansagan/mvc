<?php echo '
<div class="row" id="menu">
    <div class="col-md-8 offset-2">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="javascript:void(0)" id="home">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)"';if($_SESSION['usertype'] == self::ADMIN_USER_TYPE_ID){echo 'id="feedbacks"';} else{echo 'id="feedback"';}    echo'>Feedback</a>
                    </li>
                    <li class="nav-item navbar-right">
                        <a class="nav-link " href="javascript:void(0)" id="signout">Sign out</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>';
?>
