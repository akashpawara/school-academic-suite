<?php
include('../../config/session.php');
$q=1;
       $sql = "SELECT * FROM student_info";
      $retval = mysqli_query( $db, $sql );
      $sql2 = "SELECT * FROM student_attendence";
      $retval2 = mysqli_query( $db, $sql2 );
      $sql3 = "SELECT * FROM teacher_info where access='Teacher'";
      $retval3 = mysqli_query( $db, $sql3 );
      $sql4 = "SELECT * FROM teacher_attendence";
      $retval4 = mysqli_query( $db, $sql4 );
      $sql5 = "SELECT * FROM student_marks";
      $retval5 = mysqli_query( $db, $sql5 );
      $sql6 = "SELECT * FROM teacher_info where userName = '$login_session'";
      $retval6 = mysqli_query( $db, $sql6 );
      $row6 = mysqli_fetch_array($retval6,MYSQLI_ASSOC);  
      $image=$row6['profilePic'];
      $email=$row6['email'];
      $name=$row6['teacherName'];
      $sql7 = "SELECT * FROM teacher_info where access='Teacher'";
      $retval7 = mysqli_query( $db, $sql7 );
      $sql8 = "SELECT * FROM institute_teacher_details";
      $retval8 = mysqli_query( $db, $sql8 );
      $sql9 = "SELECT * FROM institute_student_attendance";
      $retval9 = mysqli_query( $db, $sql9 );
      $sql10 = "SELECT * FROM institute_student_marks";
      $retval10 = mysqli_query( $db, $sql10 );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Addmin's Panel</title>
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
        <nav id="sidebar">
            <div class="sidebar-header">
                <h1>
                    <a href="teachers_panel.html">Admin's Panel</a>
                </h1>
                <span>M</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="admin_dashboard.php">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="administration.php">
                        <i class="fas fa-chart-pie"></i>
                        Administration
                    </a>  
            </ul>
        </nav>
        <div id="content">
            <!-- top-bar -->
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
                <form action="push_attendance.php" method="POST">        
                <h4 class="tittle-w3-agileits mb-4">Teacher's Attendence</h4>
                <label for="country">Select Teacher</label>
                <select class="custom-select d-block w-100" id="country" name="teacherName" required="">
                        <option value="" >Choose...</option>
                            <?php
                                while($row3 = mysqli_fetch_assoc($retval3)){
                            ?>
                        <option value="<?php echo "{$row3['teacherName']}" ?>"><?php echo "{$row3['teacherName']}" ?> </option>
                            <?php
                                }
                            ?>
                </select>
                            </br>
                            <label for="country">Present/Absent</label>
                            <select class="custom-select d-block w-100" id="country" name="isPresent" required="">
                                <option value="">Choose...</option>
                                <option value="1">Present</option>
                                <option value="0">Absent</option>
                            </select>
                            <br>
                <button type="submit" name="push_attendance" class="btn btn-primary">Submit</button>
                            </form>
            </div>
                            </br>
                    <div class="outer-w3-agile col-xl">
                        <h4 class="tittle-w3-agileits mb-4">Attendance Analysis</h4>
                            <form action="#" method="post">
                                <div class="form-group row"  >
                                    <dl>
                                        <dt>
                                            Teacher's Attendence Analysis
                                        </dt>
                                        <?php
                                        while($row8 = mysqli_fetch_assoc($retval8)){

                                                ?>
                                        <dd class="percentage percentage-<?php 
                                        if($row8['tIsPresent']==0)
                                        {
                                            echo "50";
                                        }
                                        else
                                        {
                                            echo "100";
                                        } 
                                        ?>">
                                        <span class="text9">
                                            <?php echo "{$row8['teacherName']}" ?>
                                            : 
                                            <?php echo "{$row8['tIsPresent']}" ?>
                                            
                                        </span>
                                        </dd>
                                    <?php } ?>
                                    </dl>
                                    <dl>
                                        <dt>
                                            Student's Attendence Analysis
                                        </dt>
                                        
                                        <?php
                                        while($row9 = mysqli_fetch_assoc($retval9)){

                                                ?>
                                        <dd class="percentage percentage-<?php 
                                        if($row9['sIsPresent']==0)
                                        {
                                            echo "50";
                                        }
                                        else
                                        {
                                            echo "100";
                                        } 
                                        ?> ">
                                        <span class="text9">
                                            <?php echo "{$row9['studentName']}" ?>
                                            : 
                                            <?php echo "{$row9['sIsPresent']}" ?>
                                            
                                        </span>
                                        </dd>
                                    <?php } ?>
                                    </dl>
                                    <dl>
                                        <dt>
                                            Student's Marks Analysis
                                        </dt>
                                        <?php
                                        while($row10 = mysqli_fetch_assoc($retval10)){

                                                ?>
                                        <label><?php echo "{$row10['studentName']}" ?></label>
                                        <dd class="percentage percentage-<?php 
                                        echo "{$row10['english']}" 
                                        ?> ">
                                        <span class="text9">
                                            English
                                        </span>
                                        </dd>
                                        <dd class="percentage percentage-<?php 
                                        echo "{$row10['maths']}" 
                                        ?> ">
                                        <span class="text9">
                                            Mathematics
                                        </span>
                                        </dd>
                                        <dd class="percentage percentage-<?php 
                                        echo "{$row10['sciencee']}" 
                                        ?> ">
                                        <span class="text9">
                                            Science
                                        </span>
                                        </dd>
                                    <?php } ?>
                                    </dl>
                                    </select>
                                                </br>
                                                <button type="submit" name="show_teacher_analysis" class="btn btn-primary">Submit</button>
                                                </form>          
                                </div>
                            </br>   
                            </br>
                    </div>
                    </div>
                </br>          
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
    <script src="../../assets/js/rumcaJS.js"></script>
    <script src="../../assets/js/example.js"></script>
    <script src="../../assets/js/moment.min.js"></script>
    <script src="../../assets/js/pignose.calender.js"></script>
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