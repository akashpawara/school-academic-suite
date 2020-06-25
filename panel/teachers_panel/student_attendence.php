<?php
include('../../config/session.php');
$q=1;
       $sql = "SELECT * FROM class_info";
      $retval = mysqli_query( $db, $sql );
      $sql2 = "SELECT * FROM class_info";
      $retval2 = mysqli_query( $db, $sql2 );
      $sql5 = "SELECT * FROM teacher_info where userName = '$login_session'";
      $retval5 = mysqli_query( $db, $sql5 );
      $row5 = mysqli_fetch_array($retval5,MYSQLI_ASSOC);  
      $image=$row5['profilePic'];
      $email=$row5['email'];
      $name=$row5['teacherName'];
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teacher's Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="../../assets/css/bar.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/pignose.calender.css" />
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="../../assets/css/style4.css">
    <link href="../../assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<body>
    <div class="se-pre-con"></div>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h1>
                    <a href="teachers_panel.html">Teacher's Panel</a>
                </h1>
                <span>M</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="student_attendence.php">
                        <i class="fas fa-th-large"></i>
                        Attendence
                    </a>
                </li>
                <li>
                    <a href="student_marks.php">
                        <i class="fas fa-chart-pie"></i>
                        Marks
                    </a>
                </li>
                <li>
                    <a href="student_analysis.php">
                        <i class="fas fa-th"></i>
                        Analysis
                    </a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <nav class="navbar navbar-default mb-xl-5 mb-4">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <ul class="top-icons-agileits-w3layouts float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="far fa-user"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile d-flex mr-o">
                                    <div class="profile-l align-self-center">
                                        <img src="<?php echo $image; ?>" class="img-fluid mb-3" alt="Responsive image">
                                    </div>
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits"><?php echo $name; ?></h3>
                                        <a href=""><?php echo $email; ?></a>
                                    </div>
                                </div>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-user mr-3"></i>My Profile</h4>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../config/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="outer-w3-agile col-xl">
                        <h4 class="tittle-w3-agileits mb-4">Select Class</h4>
                            <form action="#" method="post">
                                <div class="form-group row"  >
                                    <label for="country">Class</label>
                                        <select class="custom-select d-block w-100" name="standard" id="standard" required="">
                                            <option value="" >Choose...</option>
                                            <?php
                                                while($row = mysqli_fetch_assoc($retval)){
                                            ?>
                                            <option value="<?php echo "{$row['standard']}" ?>"><?php echo "{$row['standard']}" ?> </option>
                                                    <?php
                                                    }
                                                    
                                                    ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid Class.
                                    </div>
                                </div>
                            </br>
                                <div class="form-group row">
                                    <label for="country">Division</label>
                                        <select class="custom-select d-block w-100" name="division" id="division" required="">
                                            <option value="">Choose...</option>
                                            <?php
                                                while($row2 = mysqli_fetch_assoc($retval2)){
                                            ?>
                                            <option value="<?php echo "{$row2['division']}" ?>"> <?php echo "{$row2['division']}" ?> </option>
                                            <?php
                                                    }
                                                    
                                                    ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid Division.
                                    </div>
                                </div>
                            </br>
                            </br>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="pushAttendence" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                    </div>
                </br>
                    <div class="row">
                    <div class="outer-w3-agile col-xl">
                        <form action="push_attendence.php" method="POST">
                        <h4 class="tittle-w3-agileits mb-4">Student Attendence</h4>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Sr. no.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Present</th>
                                    <th scope="col">Absent</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($_POST['pushAttendence']))
                            {
                            $standard=$_POST['standard'];
                            $division=$_POST['division'];
                            $sql4 = "SELECT * FROM class_info where standard='$standard' and division='$division'";
                            $retval4 = mysqli_query( $db, $sql4 );
                            $row4 = mysqli_fetch_array($retval4,MYSQLI_ASSOC);
                            $classID=$row4['classID'];
                            $sql3 = "SELECT * FROM student_info where classID='$classID'";
                            $retval3 = mysqli_query( $db, $sql3 );
                            
                            while($row3 = mysqli_fetch_assoc($retval3)){
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $q; ?></th>
                                    <td><?php echo "{$row3['studentName']}" ?></td>
                                    <td style="padding-left: 10%;"><input class="form-check-input" type="radio" name="is[<?php echo "{$row3['sID']}" ?>]" id="is<?php echo "{$row3['sID']}" ?>" value="1" checked="" ></td>
                                    <td style="padding-left: 10%;"><input class="form-check-input" type="radio" name="is[<?php echo "{$row3['sID']}" ?>]" id="is<?php echo "{$row3['sID']}" ?>" value="0" ></td>
                                </tr>
                                <?php
                                $q++;
                                    }
                            ?>
                            </tbody>
                        </table>
                        <button style="margin-left:45%;;" type="submit" name="push_attendence" class="btn btn-primary">Submit</button>
                                </form>
                    </div>
                    <?php
                                }
                    ?>
                </div>
            </div>
    <script src='../../assets/js/jquery-2.2.3.min.js'></script>
    <script src="../../assets/js/modernizr.js"></script>
    <script>
        $(window).load(function () {
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script src="../../assets/js/SimpleChart.js"></script>
    <script>
        var graphdata4 = {
            linecolor: "Random",
            title: "Thursday",
            values: [{
                    X: "6",
                    Y: 300.00
                },
                {
                    X: "7",
                    Y: 101.98
                },
                {
                    X: "8",
                    Y: 140.00
                },
                {
                    X: "9",
                    Y: 340.00
                },
                {
                    X: "10",
                    Y: 470.25
                },
                {
                    X: "11",
                    Y: 180.56
                },
                {
                    X: "12",
                    Y: 680.57
                },
                {
                    X: "13",
                    Y: 740.00
                },
                {
                    X: "14",
                    Y: 800.89
                },
                {
                    X: "15",
                    Y: 420.57
                },
                {
                    X: "16",
                    Y: 980.24
                },
                {
                    X: "17",
                    Y: 1080.00
                },
                {
                    X: "18",
                    Y: 140.24
                },
                {
                    X: "19",
                    Y: 140.58
                },
                {
                    X: "20",
                    Y: 110.54
                },
                {
                    X: "21",
                    Y: 480.00
                },
                {
                    X: "22",
                    Y: 580.00
                },
                {
                    X: "23",
                    Y: 340.89
                },
                {
                    X: "0",
                    Y: 100.26
                },
                {
                    X: "1",
                    Y: 1480.89
                },
                {
                    X: "2",
                    Y: 1380.87
                },
                {
                    X: "3",
                    Y: 1640.00
                },
                {
                    X: "4",
                    Y: 1700.00
                }
            ]
        };
        $(function () {
            $("#Hybridgraph").SimpleChart({
                ChartType: "Hybrid",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: false,
                data: [graphdata4],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
        });
    </script>
    <script src="../js/rumcaJS.js"></script>
    <script src="../js/example.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/pignose.calender.js"></script>
    <script>
        $(function () {
            $('.calender').pignoseCalender({
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '.');
                }
            });
            $('.multi-select-calender').pignoseCalender({
                multiple: true,
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '~' +
                        (date[1] === null ? 'null' : date[1].format('YYYY-MM-DD')) +
                        '.');
                }
            });
        });
    </script>
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/simplyCountdown.js"></script>
    <link href="../../assets/css/simplyCountdown.css" rel='stylesheet' type='text/css' />
    <script>
        var d = new Date();
        simplyCountdown('simply-countdown-custom', {
            year: d.getFullYear(),
            month: d.getMonth() + 2,
            day: 25
        });
    </script>
    <script src='../../assets/js/amcharts.js'></script>
    <script>
        var chart;
        var legend;
        var chartData = [{
                country: "Lithuania",
                value: 260
            },
            {
                country: "Ireland",
                value: 201
            },
            {
                country: "Germany",
                value: 65
            },
            {
                country: "Australia",
                value: 39
            },
            {
                country: "UK",
                value: 19
            },
            {
                country: "Latvia",
                value: 10
            }
        ];
        AmCharts.ready(function () {
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "country";
            chart.valueField = "value";
            chart.outlineColor = "";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;
            chart.depth3D = 20;
            chart.angle = 30;
            chart.write("chartdiv");
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>