$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "/codeigniter/index.php/getinfo/mginfo",
        data: "",
        dataType: "json",

        success: function(data) {
            var mg_cn = data['mg_cn'];
            var Title = data['Title'];
            var Department = data['Department'];
            var Description = data['Description'];
            var EmployeeType = data['EmployeeType'];
            var Email = data['Email'];
            var PhoneNumber = data['PhoneNumber'];
            var Lastmodify = data['Lastmodify'];
            var mg_days = data['sincelastlogin'] / 60 / 60 / 24
            var subnum = data['subcount'];
            var mg_days = Math.round(mg_days);
            $('.mgcn').html(mg_cn);
            $('#Lastmodify').html(mg_days);  

            $('.Title').html(Title); 
            $('.Department').html(Department); 
            $('.Description').html(Description); 
            $('.EmployeeType').html(EmployeeType); 
            $('.Email').html(Email); 
            $('.PhoneNumber').html(PhoneNumber);    
            $('#subnum').html(subnum);    
        }
    });

        $.ajax({
        type: "GET",
        url: "/codeigniter/index.php/getinfo/score",
        data: "",
        dataType: "json",

        success: function(data) {
            var login_times = data['login_times'];
            $('#score').append(login_times);
           var lvlicon ='';
           
        if (data['login_times'] >=0&&data['login_times']<=2){
            lvlicon = '<i class="fa fa-battery-empty" aria-hidden="true" style="font-size:180%;"></i>';
           }
           
        else if (data['login_times'] >=3&&data['login_times']<=5){
            lvlicon = '<i class="fa fa-battery-half" aria-hidden="true" style="font-size:180%;"></i>';
           }
           
        else if (data['login_times'] >=6&&data['login_times']<=10){
            lvlicon = '<i class="fa fa-battery-full" aria-hidden="true" style="font-size:180%;"></i>';
           }
           
        else {
            lvlicon = '<i class="fa fa-bolt" aria-hidden="true" style="font-size:180%;"></i>';
           }
             $('#currentlvl').html(lvlicon);
        }
    });
    });