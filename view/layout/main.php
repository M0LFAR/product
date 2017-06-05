
<!DOCTYPE html>
<html lang="ua">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mysql</title>

    <!-- Bootstrap Core CSS -->
    <link href="/web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/web/css/main.css">
    <!-- MetisMenu CSS -->
    <link href="/web/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="/web/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="/web/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/web/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/web/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="/web/vendor/jquery/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
</head>

<body>
<div id="wrapper">

    <?=require_once (ROOT.'/view/widget/nav_bar.php');?>

    <?php $this->getView($view['nameView'], $view['pathView'],$model);?>

</div>
<script type="text/javascript">
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer",
            {
                title: {
                    text: "Email Analysis"
                },
                animationEnabled: true,
                axisX:{
                    interval: 3
                    // labelAngle : 30,
                    // valueFormatString: "HHmm'hrs'"

                },
                axisY: {
                    title: "Number of Messages"
                },
                legend: {
                    verticalAlign: "bottom",
                    horizontalAlign: "center"
                },

                data: [{
                    name: "received",
                    showInLegend: true,
                    legendMarkerType: "square",
                    type: "area",
                    color: "rgba(40,175,101,0.6)",
                    markerSize: 0,

                    dataPoints: [
                        {x:new Date(2013,0,1,00,00) ,label: "midnight", y: 7  },
                        {x:new Date(2013,0,1,01,00) , y: 8},
                        {x:new Date(2013,0,1,02,00) , y: 5},
                        {x:new Date(2013,0,1,03,00) , y: 7},
                        {x:new Date(2013,0,1,04,00) , y: 6},
                        {x:new Date(2013,0,1,05,00) , y: 8},
                        {x:new Date(2013,0,1,06,00) , y: 12},
                        {x:new Date(2013,0,1,07,00) , y: 24},
                        {x:new Date(2013,0,1,08,00) , y: 36},
                        {x:new Date(2013,0,1,09,00) , y: 35},
                        {x:new Date(2013,0,1,10,00) , y: 37},
                        {x:new Date(2013,0,1,11,00) , y: 29},
                        {x:new Date(2013,0,1,12,00) , y: 34, label: "noon" },
                        {x:new Date(2013,0,1,13,00) , y: 38},
                        {x:new Date(2013,0,1,14,00) , y: 23},
                        {x:new Date(2013,0,1,15,00) , y: 31},
                        {x:new Date(2013,0,1,16,00) , y: 34},
                        {x:new Date(2013,0,1,17,00) , y: 29},
                        {x:new Date(2013,0,1,18,00) , y: 14},
                        {x:new Date(2013,0,1,19,00) , y: 12},
                        {x:new Date(2013,0,1,20,00) , y: 10},
                        {x:new Date(2013,0,1,21,00) , y: 8},
                        {x:new Date(2013,0,1,22,00) , y: 13},
                        {x:new Date(2013,0,1,23,00) , y: 11}
                    ]
                },
                    {
                        name: "sent",
                        showInLegend: true,
                        legendMarkerType: "square",
                        type: "area",
                        color: "rgba(0,75,141,0.7)",
                        markerSize: 0,
                        label: "",
                        dataPoints: [

                            {x:new Date(2013,0,1,00,00) , label: "midnight", y: 12  },
                            {x:new Date(2013,0,1,01,00) , y: 10},
                            {x:new Date(2013,0,1,02,00) , y: 3},
                            {x:new Date(2013,0,1,03,00) , y: 5},
                            {x:new Date(2013,0,1,04,00) , y: 2},
                            {x:new Date(2013,0,1,05,00) , y: 1},
                            {x:new Date(2013,0,1,06,00) , y: 3},
                            {x:new Date(2013,0,1,07,00) , y: 6},
                            {x:new Date(2013,0,1,08,00) , y: 14},
                            {x:new Date(2013,0,1,09,00) , y: 15},
                            {x:new Date(2013,0,1,10,00) , y: 21},
                            {x:new Date(2013,0,1,11,00) , y: 24},
                            {x:new Date(2013,0,1,12,00) , y: 28, label: "noon" },
                            {x:new Date(2013,0,1,13,00) , y: 26},
                            {x:new Date(2013,0,1,14,00) , y: 17},
                            {x:new Date(2013,0,1,15,00) , y: 23},
                            {x:new Date(2013,0,1,16,00) , y: 28},
                            {x:new Date(2013,0,1,17,00) , y: 22},
                            {x:new Date(2013,0,1,18,00) , y: 10},
                            {x:new Date(2013,0,1,19,00) , y: 9},
                            {x:new Date(2013,0,1,20,00) , y: 6},
                            {x:new Date(2013,0,1,21,00) , y: 4},
                            {x:new Date(2013,0,1,22,00) , y: 12},
                            {x:new Date(2013,0,1,23,00) , y: 14}
                        ]
                    }
                ]
            });

        chart.render();
    }
</script>
<script type="text/javascript" src="/assets/script/canvasjs.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/web/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/web/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="/web/vendor/datatables/js/jquery.dataTables.js"></script>
<script src="/web/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="/web/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/web/dist/js/sb-admin-2.js"></script>



<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>
