<!DOCTYPE html>
<meta http-equiv="refresh" content="1">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">  <!-- Link exterbal css -->
    <title>Clock</title>
</head>
<html>
<body>
    <?php 
        //Hard code data
        $weekSet = array("Domenica", "Lunedi", "Martedi", "Mercoledi", "Giovedi", "Venerdi", "Sabato");
        $monthsSet = array("Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giunio", "Luglio", "Agosto", "Setterbre", "Ottobre", "Novenmbre", "Dicembre");
    ?>   

    <!-- Date Card -->
    <div class="calendar-day">
        <div class="month"> <!-- Print Months -->
            <?php echo $monthsSet[date("n")-1]; ?>
        </div>
        <div class="day"> <!-- Print Day -->
            <div class="number-day">
                <?php echo date("j"); ?>
            </div>
            <div class="literals-day">
                <?php echo $weekSet[date("w")]; ?>
            </div>
        </div>
        <div class="time"> <!-- Time Card -->
            <?php echo date("H:i:s"); ?>
        </div>
    </div>
    
    <script src="./js/script.js"></script>
</body>
</html>