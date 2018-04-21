$(document).ready(function() {

    var mg_cn = '';

    $.ajax({
        type: "GET",
        url: "/codeigniter/index.php/getinfo/mginfo",
        data: "",
        dataType: "json",

        success: function(data) {
            mg_cn = data['mg_cn'];
            var Title = data['Title'];
            var Lastmodify = data['Lastmodify'];
            var subnum = data['subcount'];
            var mg_days = data['sincelastlogin'] / 60 / 60 / 24
            var mg_days = Math.round(mg_days);

            var d = new Date();
            var hour = d.getHours();
            if (hour >= 6 && hour <= 12) {
                greetingtime = 'Good Morning,';
            } else if (hour >= 13 && hour <= 17) {
                greetingtime = 'Good Afternooon,';
            } else if (hour >= 18 && hour <= 23) {
                greetingtime = 'Good Evening,';
            } else {
                greetingtime = "Wow, you're working really hard";
            }

            $('#greetingtime').html(greetingtime);
            $('.mgcn').html(mg_cn);
            $('#Lastmodify').html(mg_days);
            $('#subnum').html(subnum);

            var lvlicon = '';
            var ctnum = data['subcount'];

            if (ctnum >= 0 && ctnum <= 2) {
                lvlicon = '<i class="fa fa-battery-empty" aria-hidden="true" style="font-size:180%;"></i>';
            } else if (ctnum >= 3 && ctnum <= 5) {
                lvlicon = '<i class="fa fa-battery-half" aria-hidden="true" style="font-size:180%;"></i>';
            } else if (ctnum >= 6 && ctnum <= 10) {
                lvlicon = '<i class="fa fa-battery-full" aria-hidden="true" style="font-size:180%;"></i>';
            } else {
                lvlicon = '<i class="fa fa-bolt" aria-hidden="true" style="font-size:180%;"></i>';
            }
            $('#currentlvl').html(lvlicon);
        },
    });

    $.ajax({
        type: "GET",
        url: "/codeigniter/index.php/getinfo/score",
        data: "",
        dataType: "json",

        success: function(data) {
            var login_times = data['login_times'];
            $('#score').append(login_times);
        }
    });

    $.ajax({
        type: "GET",
        url: "/codeigniter/index.php/getinfo/drinfo",
        data: "",
        dataType: "json",

        success: function(data) {
            var ru_info = '';
            var ru_detail = '';
            var list = '';

            $.each(data, function(key, value) {

                if (value.LastLogon != 0) {
                    var now = Date.now() / 1000;
                    var lastdate = value.LastLogon;
                    var winSecs = lastdate / 10000000;
                    var unixTimestamp = winSecs - 11644473600;
                    var days = (now - unixTimestamp) / 60 / 60 / 24;
                    var days = Math.round(days) + ' days ago';
                } else {
                    var days = 'unknow';
                }
                var btnid = 'btn' + key;
                var clpid = 'clpid' + key;
                var trid = 'tr' + key;
                var toggleid = 'toggleid' + key;

                if (value.PhoneNumber == 0) {
                    value.PhoneNumber = 'None';
                }
                ru_info += '<tr id="' + trid + '" >';
                ru_info += '<td class="ru_cn" >' + value.ru_cn + '</td>'
                ru_info += '<td class="Title">' + value.Title + '</td>'
                ru_info += '<td>' + value.Department + '</td>'
                ru_info += '<td>' + value.EmployeeType + '</td>'
                ru_info += '<td>' + value.Description + '</td>'
                ru_info += '<td>' + days + '</td>'
                ru_info += '<td><button id="' + btnid + '" data-toggle="collapse" data-target="#' + clpid +
                    '"><i class="fa fa-search" aria-hidden="true"></i></button></td>'
                ru_info += '<td class="onlywebnt"><input class="togglebtn"  id="' + toggleid + '" checked type="checkbox" data-onstyle="danger"></td>'
                ru_info += '</tr>';
                ru_info += '<tr class="collapse " id="' + clpid + '">';
                ru_info += '<td colspan="3">' + 'Email: ' + value.Email + '</td>'
                ru_info += '<td colspan="5">' + 'Phone Number: ' + value.PhoneNumber + '</td></tr>'

                $(function desicion() {
                    $("#" + toggleid).bootstrapToggle({
                        on: 'Remove',
                        off: 'Keep',
                    });

                    $("#" + toggleid).change(function() {
                        if ($(this).prop('checked') == true) {
                            document.getElementById(trid).checked = true
                            document.getElementById(trid).style.background = "#FFD2C8";

                        }
                        if ($(this).prop('checked') == false) {
                            document.getElementById(trid).style.background = "#C8FFCA";
                        }
                    });

                    var is_mobile = false;
                    if ($('.onlywebnt').css('display') == 'none') {
                        is_mobile = true;
                    }
                    if (is_mobile == true) {
                        $("#" + toggleid).css('display', 'none');

                        $("#" + trid).swipe({
                            allowPageScroll: "vertical"
                        });

                        $("#" + trid).swipe({
                            swipe: function(event, direction, distance, duration,
                                fingerCount, fingerData) {

                                if (direction == "left") {

                                    $("#" + toggleid).bootstrapToggle('off');
                                    document.getElementById(trid).style.background = "#C8FFCA";
                                }
                                if (direction == "right") {

                                    $("#" + toggleid).bootstrapToggle('on');
                                    document.getElementById(trid).style.background = "#FFD2C8";
                                }

                                if (direction === 'up' || direction === 'down') {
                                    return false;
                                }

                                console.log(direction);
                            }
                        });
                    }
                });
            });

            $('#table').append(ru_info);
        }
    });

    var modal = document.getElementById('myModal');
    var btn = document.getElementById("submitbtn");
    var span = document.getElementsByClassName("close")[0];
    var cfmbtn = document.getElementById("confirm");
    var okbtn = document.getElementById("okbtn");
    var nosure = document.getElementById("notsure");
    var jsonObj = '';

    btn.onclick = function() {
        modal.style.display = "block";
        var result = $('.togglebtn:checked').closest('tr').children('td:first-child');

        if (result.val() !== undefined) {
            document.getElementById("statement").innerHTML = "Are you sure you want to remove the accounts?";
            cfmbtn.value = "I'm sure";
            cfmbtn.style.display = "inline";
            nosure.style.display = "inline";
            result.each(function(index) {
                jsonObj = $(this).html();
                listObj = '<li>' + jsonObj + '</li>';
                $('#cfmlist').append(listObj);
            })

            cfmbtn.onclick = function() {
                modal.style.display = "none";
                var result = $('.togglebtn:checked').closest('tr').children('td:first-child');
                result.each(function() {
                    var jsonObj = '{"cn" :' + '"' + $(this).html() + '"' + '}';
                    var obj = $.parseJSON(jsonObj);

                    console.log(obj);

                    modal.style.display = "none";
                    $('#cfmlist').html("");
                });

                modal.style.display = "block";
                document.getElementById("statement").innerHTML = "Your request have been sent";
                nosure.style.display = "none";
                cfmbtn.style.display = "none";

                let objcn = {
                    "user": mg_cn
                };
                var nmg_cn = mg_cn;

                $.ajax({
                    type: "POST",
                    url: "/codeigniter/index.php/welcome/smtcount",
                    cache: false,
                    data: objcn,
                    dataType: "json",

                    success: function(data) {},

                });
            }

        } else {
            cfmbtn.style.display = "inline";
            nosure.style.display = "none";
            document.getElementById("statement").innerHTML = "Thank you for checking the list";
            document.getElementById("confirm").value = "Okay :)";
            cfmbtn.onclick = function() {
                modal.style.display = "none";
                $('#cfmlist').html("");

                let objcn = {
                    "user": mg_cn
                };

                var nmg_cn = mg_cn;

                $.ajax({
                    type: "POST",
                    url: "/codeigniter/index.php/welcome/smtcount",
                    cache: false,
                    data: objcn,
                    dataType: "json",

                    success: function(data) {},
                });
            }
        }
    }

    span.onclick = function() {
        modal.style.display = "none";
        $('#cfmlist').html("");
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            $('#cfmlist').html("");
        }
    }

    nosure.onclick = function() {
        modal.style.display = "none";
        $('#cfmlist').html("");
    }
});