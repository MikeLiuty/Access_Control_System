<?php include('templates/serheader.php') ?>

<div class="main" id="divtable">
    <a class="btn btn-success " id="backbtn" href="/codeigniter/index.php/Welcome/serinadash"> <span>Back to Dashboard</span> </a>
    <div class="table-responsive">
        <table class="table table-striped" id="serdata_table">
        </table>
    </div>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <h2 id="statement"></h2>
            <ul id="cfmlist">
            </ul>
        </div>
    </div>
</div>

<script type='text/javascript' src="<?php echo base_url('assets/serdetail.js');?>"></script>

<?php include('templates/footer.php') ?>