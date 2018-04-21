$(document).ready(function() {

  $.ajax({        
    type: "GET",                              
    url: "/codeigniter/index.php/getinfo/serinfo",             
    data: "",
  dataType: "json",

success: function (data){
  
  var ser_info = '';
  var counts = 0;
  $.each(data, function(key,value){

    if (value.LastLogon != 0){
      var now = Date.now()/1000;
      var lastdate = value.LastLogon;
      var winSecs = lastdate / 10000000; 
      var unixTimestamp = winSecs - 11644473600; 
      var days = (now - unixTimestamp)/60/60/24;
      var days = Math.round(days) ;

  function humanise (diff) {

  var str = '';
  var values = [[' year', 365], [' month', 30], [' day', 1]];
  for (var i=0;i<values.length;i++) {
    var amount = Math.floor(diff / values[i][1]);
    if (amount >= 1) {
      str += amount + values[i][0] + (amount > 1 ? 's' : '') + ' ';
      diff -= amount * values[i][1];
    }
  }
  return str;
}
    var agodates = humanise(days)+' ago';
}

    else {
      var days = 'unknow';
    }
      var btnid = 'btn' + key;
      var clpid = 'clpid' + key;
      var trid = 'tr' + key;

      if(value.PhoneNumber == 0){
        value.PhoneNumber = 'None';
      }

      ser_info += '<tr id="'+trid+'" >';
      ser_info += '<td class="ru_cn" >'+value.cn+'</td>'
      ser_info += '<td class="Title">'+value.Title+'</td>'
      ser_info += '<td>'+value.Department+'</td>'
      ser_info += '<td>'+value.EmployeeType+'</td>'
      ser_info += '<td>'+value.Description+'</td>'
      ser_info += '<td>'+agodates+'</td>'
      ser_info += '<td><button id="'+btnid+'" data-toggle="collapse" data-target="#'+clpid+
                 '"><i class="fa fa-search" aria-hidden="true"></i></button></td>';
      ser_info += '</tr>';      
      ser_info += '<tr class="collapse " id="'+clpid+'" role="dialog">';
      ser_info += '<td colspan="2">'+'Email: '+value.Email+'</td>'
      ser_info += '<td colspan="2">'+'Phone Number: '+value.PhoneNumber+'</td>';
      ser_info += '<td colspan="3">'+'DN: '+value.dn+'</td></tr>'
      counts++;

    
})
    counts="Total number: "+counts;
    $('#table').append(ser_info);
    $('#counts').html(counts);

}
})
  });
  








