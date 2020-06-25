<?php
include('../../config/session.php');
$q=1;
$n=1;
       $sql = "SELECT * FROM student_info";
      $retval = mysqli_query( $db, $sql );
      $sql2 = "SELECT * FROM student_attendence";
      $retval2 = mysqli_query( $db, $sql2 );
      $sql3 = "SELECT * FROM teacher_info";
      $retval3 = mysqli_query( $db, $sql3 );
      $sql4 = "SELECT * FROM teacher_attendence";
      $retval4 = mysqli_query( $db, $sql4 );
      $sql5 = "SELECT * FROM teacher_info where userName = '$login_session'";
      $retval5 = mysqli_query( $db, $sql5 );
      $row5 = mysqli_fetch_array($retval5,MYSQLI_ASSOC);  
      $image=$row5['profilePic'];
      $email=$row5['email'];
      $name=$row5['teacherName'];
      $sql6 = "SELECT * FROM class_info";
      $retval6 = mysqli_query( $db, $sql6 );
      $sql7 = "SELECT * FROM class_info";
      $retval7 = mysqli_query( $db, $sql7 );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin's Panel</title>
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
                <li>
                    <a href="admin_dashboard.php">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
                <li class="active">
                    <a href="administration.php">
                        <i class="fas fa-chart-pie"></i>
                        Administration
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
                    <!-- Stats -->
                    <div class="outer-w3-agile col-xl">
                        <h4 class="tittle-w3-agileits mb-4">Teacher's Info</h4>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Sr. no.</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            while($row3 = mysqli_fetch_assoc($retval3)){
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $q; ?></th>
                                    <td><?php echo "{$row3['tID']}" ?></td>
                                    <td ><?php echo "{$row3['teacherName']}" ?></td>
                                   <?php
                                   echo '<td ><a href="remove_teacher.php?id=' . $row3['tID'] . '">Remove</a></td>'
                                   ?>
                                </tr>
                                <?php
                                $q++;
                                    }
                            ?>
                            </tbody>
                        </table>
                        <button style="margin-left:45%;;" type="submit" name="enroll_teacher" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Enroll a new Teacher</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Enroll Teacher</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="add_teacher.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Enter Username" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control" placeholder="Enter Password" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="custom-select d-block w-100" name="role" id="role" required="">
                                            <option value="" >Choose...</option>
                                            <option value="Teacher" >Teacher</option>
                                            <option value="Admin" >Admin</option>
                                        </select>
                                        </div>
                                    <div class="form-group">
                                        <label>Profile pic</label>
                                        <input type="file" name="profile_pic" id="profile_pic" class="form-control" accept="image/*" required="">
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="enroll" class="btn btn-primary">Enroll</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </br>
                    <div class="row">
                    <div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
                        <h4 class="tittle-w3-agileits mb-4">Student's Info</h4>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Sr. no.</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">ClassID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            while($row = mysqli_fetch_assoc($retval)){
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $n; ?></th>
                                    <td><?php echo "{$row['sID']}" ?></td>
                                    <td><?php echo "{$row['classID']}" ?></td>
                                    <td ><?php echo "{$row['studentName']}" ?></td>
                                    <?php
                                    echo '<td ><a href="remove_student.php?id=' . $row['sID'] . '">Remove</a></td>'
                                    ?>
                                    </tr>
                                <?php
                                $n++;
                                    }
                            ?>
                            </tbody>
                        </table>
                        <button style="margin-left:45%;;" type="submit" name="enroll_student" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Enroll a new student</button>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="add_student.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Standard</label>
                                        <select class="custom-select d-block w-100" id="standard" name="standard" required="">
                                            <option value="" >Choose...</option>
                                            <?php
                                                while($row6 = mysqli_fetch_assoc($retval6)){
                                            ?>
                                            <option value="<?php echo "{$row6['standard']}" ?>"><?php echo "{$row6['standard']}" ?> </option>
                                                    <?php
                                                    }
                                                    
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Division</label>
                                        <select class="custom-select d-block w-100" id="division" name="division" required="">
                                            <option value="" >Choose...</option>
                                            <?php
                                                while($row7 = mysqli_fetch_assoc($retval7)){
                                            ?>
                                            <option value="<?php echo "{$row7['division']}" ?>"><?php echo "{$row7['division']}" ?> </option>
                                                    <?php
                                                    }
                                                    
                                                    ?>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="enroll" class="btn btn-primary">Enroll</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
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
    </script>>
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