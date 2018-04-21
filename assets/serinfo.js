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

    Chart.defaults.global.animation.duration = 4000;

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

            var sm = 0;
            var mid = 0;
            var lg = 0;
            var slg = 0;
            var count = 0;
            $.each(data, function(key, value) {
                var now = Date.now() / 1000;
                var lastdate = value.LastLogon;
                var winSecs = lastdate / 10000000;
                var unixTimestamp = winSecs - 11644473600;
                var days = (now - unixTimestamp) / 60 / 60 / 24;
                days = Math.round(days);

                count++
                if (days < 365) {
                    sm++;
                } else if (days >= 365 && days < 1095) {
                    mid++;
                } else if (days >= 1095 && days < 1825) {
                    lg++;
                } else if (days >= 1825) {
                    slg++;
                }
            });

            dayspd = [sm, mid, lg, slg];

            $('#serTotal').html(count);

            var ctx = document.getElementById("chart-area").getContext('2d');

            var myChart = new Chart(ctx, {
                
                type: 'pie',
                data: {
                    labels: ["Less than one year", "One to two years",
                        "Three to four years", "Five years and more"
                    ],
                    datasets: [{
                        data: dayspd,
                        backgroundColor: [
                            "#e67676",
                            "#ffbc2c",
                            "#41c5d3",
                            "#7692e4",
                        ],
                    }]
                },
                options: {
                    animationSteps: 2000,
                    legend: { display: false },
                    responsive: true,
                    title: {
                        display: true,
                        text: '# at Defferent Time Period'
                    },
                }
            });

            $('#table').DataTable({
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
                        title: "Last Logon Date(Timestamp)"
                    },
                    {
                        title: "Last Logon Date"
                    },
                    {
                        title: "DN"
                    }
                ]
            })
        }
    });

    $.ajax({
        type: "GET",
        url: "/codeigniter/index.php/getinfo/topdptmt",
        data: "",
        dataType: "json",

        success: function(data) {

            label = data.map(function(row) {
                return [row['Department']]
            })


            num = data.map(function(row) {
                return [row['COUNT(*)']];
            })

            var ctx = document.getElementById("dptchart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        data: num,
                        backgroundColor: [
                            "#F58025",
                            "#4D4D4D",
                            "#5DA5DA",
                            "#60BD68",
                            "#F17CB0",
                            "#B2912F",
                            "#B276B2",
                            "#DECF3F",
                            "#F15854",
                            "#F38C67",
                        ],
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: { display: false },
                    title: {
                        display: true,
                        text: '# at Different Departments'
                    }
                }
            });
        }
    });

    $.ajax({
        type: "GET",
        url: "/codeigniter/index.php/getinfo/toptype",
        data: "",
        dataType: "json",

        success: function(data) {

            label = data.map(function(row) {
                return [row['EmployeeType']]
            })

            num = data.map(function(row) {
                return [row['COUNT(*)']]
            })

            var ctx = document.getElementById("typechart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        data: num,
                        backgroundColor: [
                            "#F58025",
                            "#4D4D4D",
                            "#5DA5DA",
                            "#60BD68",
                            "#F17CB0",
                            "#B2912F",
                            "#B276B2",
                            "#DECF3F",
                            "#F15854",
                            "#F38C67"
                        ],
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: { display: false },
                    title: {
                        display: true,
                        text: '# as Different Employee Type'
                    }
                }
            });
        }
    });
});