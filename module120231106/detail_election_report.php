<?php include '../admin/includes/session_popup.php'; ?>
<?php include '../admin/includes/slugify.php'; ?>
<?php include '../admin/includes/header.php'; ?>

<head>
    <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
    <style>
        .navbar {
            overflow: hidden;
            background-color: #313091;
            opacity: 0.9;
            top: 0;

        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover,
        .dropdown1:hover .dropbtn {
            background-color: #ff851b;
        }
    </style>
</head>

<body>
    <div>
        <div class="">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 class="text-center">
                    Election Result Detail - All Shareholders
                </h1>
            </section>

            <div class="container-fluid">
                <div class="container ">
                    <div class="row">

                        <div class="col col-md-12">
                            <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
                        </div>

                        <div class="col-sm-12 text-right">
                            <button class="btn btn-primary" onclick="printReport('ElectionResult_Detail');">Print</button>
                            <button class="btn btn-primary" onclick="ExcelReport('Election_report_detail');">Excel</button>
                        </div>

                        <div class="col col-md-12 table-responsive">
                            <div id="print_content" class="table-responsive">

                                <table class="table table-bordered table-striped table-hover" id="Election_report_detail">
                                    <?php
                                    require "../module1/report.php";
                                    showElectionDetail_result();

                                    ?>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" onclick="printReport('ElectionResult_Detail');">Print</button>
                            <button class="btn btn-primary" onclick="ExcelReport('Election_report_detail');">Excel</button>
                        </div>

                    </div>
                    <!-- form content end -->
                    <hr style="border-top: 2px solid #ff5252;">
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function showReport(title) {

        var nationality = document.getElementById('nationality').value;

        document.getElementById('nationality_ad').value = nationality;
        document.getElementById('sort_ad').value = sort;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState = 4 && xhttp.status == 200)
                document.getElementById(title + "_report_div").innerHTML = xhttp.responseText;
        };
        xhttp.open("GET", "report.php?actionelcd=" + title, true); //"&start_date=" + start_date + "&end_date=" + end_date ,
        xhttp.send();
    }

    function printReport(title) {

        var page_content = document.body.innerHTML;

        var print_content = document.getElementById("print_content").innerHTML;

        print_content = "<div class='h3 text-left text-primary'>" + "Election Result - Detail " + " Report" + "<img id='myImg' src='../images/avatar.png' width='50' height='50' align='right'> " + "<br><h4><b>Report Date : </b><?= date('d-M-Y'); ?></h4>" + "</div><br>" + print_content;

        document.body.innerHTML = print_content;
        window.print();
        document.body.innerHTML = page_content;
    }
</script>

<script>
    function ExcelReport(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
        const d = new Date();
        let day1 = d.getDate();
        let month1 = d.getMonth() + 1;
        let year1 = d.getFullYear();

        var exte = day1 + '_' + month1 + '_' + year1;

        // Specify file name
        filename = filename ? filename + exte + '.xls' : 'ElectionResult_Detail' + exte + '.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }

    function PDFReport(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.pdf';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
        const d = new Date();
        let day1 = d.getDate();
        let month1 = d.getMonth() + 1;
        let year1 = d.getFullYear();

        var exte = day1 + '_' + month1 + '_' + year1;

        // Specify file name
        filename = filename ? filename + exte + '.pdf' : 'ElectionResult_Detail' + exte + '.pdf';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>