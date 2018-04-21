<?php require_once('templates/header.php') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <div id="scoreboard">
                    <h2 style=" padding-left: 4px;">Score Board</h2>
                    <ul class="list-group" id="scoreside">
                        <li class="list-group-item">Login Times
                            <span class="badge" id="score"></span>
                        </li>
                        <li class="list-group-item">Submit Times
                            <span class="badge" id="subnum"></span>
                        </li>
                        <li class="list-group-item">Days Since Last Login
                            <span class="badge" id="Lastmodify"></span>
                        </li>

                        <li class="list-group-item">Current Level
                            <span class="badge" id="currentlvl"></span>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <form class="form-horizontal ">
        <fieldset>
            <legend class="mgcn" style="font-size: 200%;"></legend>
            <div class="col-md-10 row">

                <div class="col-md-10">
                    <div class="col-md-3 mgarr">
                        <label class="mgprofile">Name: </label>
                    </div>
                    <div class="col-md-8">
                        <label class="mgcn"></label>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="col-md-3 mgarr">
                        <label class="mgprofile">Title: </label>
                    </div>
                    <div class="col-md-8">
                        <label class="Title"></label>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="col-md-3 mgarr">
                        <label class="mgprofile">Department: </label>
                    </div>
                    <div class="col-md-8">
                        <label class="Department"></label>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="col-md-3 mgarr">
                        <label class="mgprofile">Description: </label>
                    </div>
                    <div class="col-md-8">
                        <label class="Description"></label>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="col-md-3 mgarr">
                        <label class="mgprofile">Employee Type: </label>
                    </div>
                    <div class="col-md-8">
                        <label class="EmployeeType"></label>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="col-md-3 mgarr">
                        <label class="mgprofile">Email: </label>
                    </div>
                    <div class="col-md-8">
                        <label class="Email" style="overflow-wrap: break-word"></label>
                    </div>
                </div>
    </form>

    </div>
    <div class="col-md-2" style="display: inline; float: right;">
        <img src="http://websamplenow.com/30/userprofile/images/avatar.jpg" class="img-responsive img-thumbnail ">
    </div>
    </fieldset>

    <script type='text/javascript' src="<?php echo base_url('assets/mgprofile.js');?>"></script>
    <?php require_once('templates/footer.php') ?>