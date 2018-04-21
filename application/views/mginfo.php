<?php require_once('templates/header.php') ?>
 

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="col-md-push-6 row">
    <h1 id="greeting" ><span id="greetingtime"></span>
      <span class='mgid mgcn' ></span>
    </h1>
    <h4>(Please use toggle button on computer mode and swipe on mobile mode)</h4> 
    </div>
  </div>
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
  <div class="col-sm-10 col-sm-offset-3 col-md-offset-2 main">
    <div class="table-responsive">
      <table class="table table-striped" id="table" style=" border-style:solid; border-width:2px;
      border-color: grey">
        <tr>
          <th>Account name</th>
          <th>Title</th>
          <th>Department</th>
          <th>Employee Type</th>
          <th>Description</th>
          <th>Last active days</th>
          <th>Detail</th>
          <th class="onlywebnt">YES/NO</th>
        </tr>
      </table>
    </div>
    <input type="submit" class="btn btn-success" id="submitbtn" value="Submit">
    </div>
    <div id="myModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
        </div>
        <div class="modal-body">
          <h2 id="statement"></h2>
          <ul id="cfmlist"></ul>
        </div>
        <div class="modal-footer">
          <input type="confirm" class="btn btn-warning" id="notsure" value="I am not sure"> 
          <input type="confirm" class="btn btn-success" id="confirm" >
            </div>
          </div>
        </div>
  <script type='text/javascript' src="<?php echo base_url('assets/info.js');?>"></script>
  <?php require_once('templates/footer.php') ?>