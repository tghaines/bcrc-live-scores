<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2025 Saturdays Calendar</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>2025 Saturdays Calendar</h1>
    <div id="calendarContainer">
        <?php
        $year = 2025;
        $months = ["January", "February", "March", "April", "May", "June",
                   "July", "August", "September", "October", "November", "December"];

        foreach ($months as $index => $month) {
            echo "<div class='month'><h2>$month $year</h2><div class='calendar'>";
            
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $index + 1, $year);
            
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = "$year-" . str_pad($index + 1, 2, '0', STR_PAD_LEFT) . "-" . str_pad($day, 2, '0', STR_PAD_LEFT);
                $filename = "json_files/$date.json";

                if (date('N', strtotime($date)) == 6) { // 6 = Saturday
                    echo "<div class='day'>";
                    if (file_exists($filename)) {
                        echo "<a href='$filename' class='active'>$date</a>";
                    } else {
                        echo "<a href='#' class='missing'>$date</a>";
                    }
                    echo "</div>";
                }
            }
            echo "</div></div>";
        }
        ?>
    </div>

</body>
</html>