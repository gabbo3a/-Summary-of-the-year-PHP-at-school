<!DOCTYPE html>
<meta http-equiv="refresh" content="1">

<head>
    <!-- Charset and viewport  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link exterbal css-->
    <link rel="stylesheet" href="./style.css">

    <title>Request Date</title>
</head>
<body>

    
        <!-- <div class="father"> -->
        <?php 
            //Hard code data
            $weekSet = array("Lunedi", "Martedi", "Mercoledi", "Giovedi", "Venerdi", "Sabato", "Domenica");
            $monthsSet = array("Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giunio", "Luglio", "Agosto", "Setterbre", "Ottobre", "Novenmbre", "Dicembre");

            $dayStamp = 1;
            $mounthStamp= 1;
        ?>   
        <div>
            <!-- Date Card -->
            <div class="calendar-day">

                <!-- Print Months -->
                <div class="month">
                    <?php echo $monthsSet[date("n")-1]; ?>
                </div>

                <!-- Print Day -->
                <div class="day">
                    <div class="number-day">
                        <?php echo date("j"); ?>
                    </div>
                    <div class="literals-day">
                        <?php echo $weekSet[date("w")-1]; ?>
                    </div>
                </div>

            </div>

            <!-- Time Card -->
            <div class="time">
                <?php echo  date("H:i:s"); ?>
            </div>
       <!--  </div> -->
        <!-- <button>Update date attivare il refrafh ayto</button> --->
        
    </div>
    <script src="./js/script.js"></script>
</body>
</html>