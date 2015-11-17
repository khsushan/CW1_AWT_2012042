<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sergey Pozhilov (GetTemplate.com)">

    <title>Check your knowledge and have fun</title>

    <link rel="shortcut icon" href="../../assets/images/gt_favicon.png">

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">

    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="../../assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>

<body class="home" onload="getSessionTime()">
<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top headroom">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.html"><img src="../../assets/images/quiz.png"> QUIZ TIME</a>

        </div>
    </div>
</div>
<!-- /.navbar -->

<!-- Header -->
<header id="head">
    <div class="container">
        <!-- Category View -->
        <?php if (isset($category) && !isset($results)) { ?>
            <form name="userinput" action="getQuestionFromCategory" method="post">
                <br><br><br>

                <h1>Select a quiz category according to your area of interest</h1>
                <div class="btn-group">
                    <div class="col-lg-6"><h5>Category : </h5></div>
                    <div class="col-lg-6">
                    <select id="category_name" name="category_name" class="dropdown btn-group">
                        <?php for($i =0 ; $i < count($category); $i++){ ?>
                                <option value="<?php echo $category[$i]["category_name"] ?>">
                                    <?php echo $category[$i]["category_name"] ?></option>
                        <?php } ?>
                    </select>
                    </div>
                </div>
                <br>
                <p>
                    <button type="submit" class="btn btn-default btn-lg"
                            role="button" id="go_btn" name="go_btn"
                            value="go_btn">GO
                    </button>
                </p>
            </form>
            <!-- end of category view-->
            <?php
        } else if (isset($question)) {
        ?>
        <!-- Question view -->
        <form name="userinput" action="getNextQuestions" method="post">
            <div id="remain_question_timer">
                <div class="col-lg-6"><h3>QUESTION <?php echo $question[0]["question_number"] ?>/10</h3></div>
                <div class="col-lg-6"><h3 align="left" id="timer">00.00</h3></div>
            </div>
            <div class="col-lg-12">
                <!-- Question View -->
                <h3><?php echo $question[0]["question_number"] . " . " . $question[0]["question_value"] ?></h3>
                <?php
                $answers = $question[0]["answers"];
                for ($i = 0; $i < count($answers); $i++) {
                    $answer = $answers[$i]["answer_value"];
                    ?>
                    <h4>
                        <input type="radio" name="answer" value="<?php echo $answer ?>"/>
                        <?php echo $answer ?></br>
                    </h4>
                    <?php
                }
                if (isset($error)) {
                    ?>
                    <h3 style="color:#FF0000">Please answer the question and click next</h3>
                <?php } ?>
                <p>
                    <button type="submit" class="btn btn-default btn-lg"
                            id="next" name="next_btn" onclick="stopCount()" value="next_btn">
                        Next
                    </button>
                </p>
        </form>
    </div>
    <!-- End Question view -->
    <?php
    } else if (isset($results)) { ?>
        <!--Score View Page -->
        <form name="userinput" action="index" method="get">

            <h1>Your Score is <?php echo $results["score"] ?>%</h1>

            <p>
                <button type="submit" class="btn btn-default btn-lg"
                        id="try_again_btn" name="try_again_btn" value="try_again_btn">
                    Try Again
                </button>
            </p>
            <!--                <h1 align="Right" id="timeText">Total time for quiz :</h1>-->

            <h1 align="Right" id="timer">00.00</h1>
        </form>
    <?php } ?>
    <!--end of score view-->
    <input type="hidden" id="time_store"/>

    </div>

</header>
<!-- /Header -->

<footer id="footer" class="top-space navbar-fixed-bottom">
    <div class="footer2">
        <div class="container">
            <div class="row">

                <div class="col-md-6 widget">
                    <div class="widget-body">
                        <p class="simplenav">
                            <a href="#">Home</a> |
                            <a href="about.html">About</a> |
                        </p>
                    </div>
                </div>

                <div class="col-md-6 widget">
                    <div class="widget-body">
                        <p class="text-right">
                            Copyright &copy; 2015, Sachith Ushan
                        </p>
                    </div>
                </div>

            </div>
            <!-- /row of widgets -->
        </div>
    </div>
</footer>

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="../../assets/js/timehandle.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="../../assets/js/headroom.min.js"></script>
<script src="../../assets/js/headroom.min.js"></script>
</body>
</html> 