
<?php include('templates/serheader.php') ?>

  <div class="main" id="sernavgreeting">
      <div class="col-md-push-6 row">
        <h1 id="greeting" ><span id="greetingtime"></span>Administrator</h1>
      </div>
  </div>
 <div class="row" id="btnboxdiv">
        <div class="col-lg-12" id="btnbox">
          
            <a href="/codeigniter/index.php/Welcome/serinadash" class="navbutton  btn btn-sq-lg btn-danger " >
                <i class="fa  fa-address-card fa-5x" ></i><br/>
                Inactive  <br>Accounts
            </a>
            <a href="#" class=" btn btn-sq-lg btn-primary navbutton">
                <i class="fa fa-wrench fa-5x"></i><br/>
                Under <br>Construction
            </a>
            <a href="#" class=" btn btn-sq-lg btn-success navbutton">
                <i class="fa fa-coffee fa-5x"></i><br/>
                Under <br>Construction
            </a>
        </div>
  </div>

<script type='text/javascript' src="<?php echo base_url('assets/sernav.js');?>"></script> 

<?php include('templates/footer.php') ?>