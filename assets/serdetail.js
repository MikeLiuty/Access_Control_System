function humanise(diff) {

    var str = '';
    var values = [
        [' year', 365],
        [' month', 30],
        [' day', 1]
    ];
    for (var i = 0; i < values.length; i++) {
        var amount = Math.floor(diff / values[i][1]);
        if (amount >= 1) {
            str += amount + values[i][0] + (amount > 1 ? 's' : '') + ' ';
            diff -= amount * values[i][1];
        }
    }
    return str;
}

$(document).ready(function() {

    var d = new Date();
    var hour = d.getHours();
    if (hour >= 6 && hour <= 12) {
        greetingtime = 'Good Morning, ';
    } else if (hour >= 13 && hour <= 17) {
        greetingtime = 'Good Afternooon, ';
    } else if (hour >= 18 && hour <= 23) {
        greetingtime = 'Good Evening, ';
    } else {
        greetingtime = "Wow, you're working really hard, ";
    }

    $('#greetingtime').html(greetingtime);

    $.ajax({
        type: "GET",
        url: "/codeigniter/index.php/getinfo/serinfo",
        data: "",
        dataType: "json",

        success: function(data) {

            info = data.map(function(row) {
                var now = Date.now() / 1000;
                var lastdate = row.LastLogon;
                var winSecs = lastdate / 10000000;
                var unixTimestamp = winSecs - 11644473600;
                var days = (now - unixTimestamp) / 60 / 60 / 24;
                days = Math.round(days);

                return [
                    row['cn'],
                    row['Title'],
                    row['Department'],
                    row['EmployeeType'],
                    row['Description'],
                    row['LastLogon'],
                    humanise(days) + ' ago',
                    row['dn']
                ]

            })

            $('#serdata_table').DataTable({
                data: info,
                columns: [{
                        title: "CN"
                    },
                    {
                        title: "Title"
                    },
                    {
                        title: "Department"
                    },
                    {
                        title: "Employee Type"
                    },
                    {
                        title: "Description"
                    },
                    {
                        title: "Last Logon Date(Timestamp)",
                        "visible": false
                    },
                    {
                        title: "Last Logon Date",
                        "iDataSort": 5, "aTargets": [ 0 ]
                    },
                    {
                        title: "DN"
                    }
                ]
            })
        }
    });
});