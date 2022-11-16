<?php 
// 2. Suformuokite lentele(HTML) 10 x 10 , kurioje butu atvaizduota susikertančių skaičių daugyba:


// 0	| 1	    | 2	    | 3	    | 4	    | 5	    | 6	    | 7	    | 8
// 1	| 1.000	| 0.500	| 0.333	| 0.250	| 0.200	| 0.167	| 0.143	| 0.125
// 2	| 2.000	| 1.000	| 0.667	| 0.500	| 0.400	| 0.333	| 0.286	| 0.250
// 3	| 3.000	| 1.500	| 1.000	| 0.750	| 0.600	| 0.500	| 0.429	| 0.375
// 4	| 4.000	| 2.000	| 1.333	| 1.000	| 0.800	| 0.667	| 0.571	| 0.500
// 5	| 5.000	| 2.500	| 1.667	| 1.250	| 1.000	| 0.833	| 0.714	| 0.625
// 6	| 6.000	| 3.000	| 2.000	| 1.500	| 1.200	| 1.000	| 0.857	| 0.750
// 7	| 7.000	| 3.500	| 2.333	| 1.750	| 1.400	| 1.167	| 1.000	| 0.875
// 8	| 8.000	| 4.000	| 2.667	| 2.000	| 1.600	| 1.333	| 1.143	| 1.000 

$ilgis = 8;
$plotis = 8;
if (isset($_GET['ilgis']) && trim($_GET['ilgis']) != '' && isset($_GET['plotis']) != '' && trim($_GET['plotis']) != '') {
    $ilgis = $_GET['ilgis'];
    $plotis = $_GET['plotis'];
}

?>

<html>
    <head>
        <style>
            td {
                text-align: right;
                width: 50px;
            }
            .core {
                background-color: lightblue;
                border: 1px solid;
            }
        </style>
    </head>
    <body>
        <table>
           <tbody>
            <tr>
                <?php for ($i = 0; $i <= $ilgis; $i++) {?>
                    <td class = 'core'>
                        <?= $i ?>
                        <?= $i != $ilgis ? "|" : "" ?>
                    </td>
                <?php } ?>
            </tr>
            <?php for($a = 1; $a <= $plotis; $a++) { ?>
                <tr>
                    <td class = 'core'>
                        <?= $a ?> |
                    </td>
                    <?php for ($b = 1; $b <= $ilgis; $b++) {
                        $divide = number_format($a / $b, 3, '.', ''); ?>
                            <td>
                                <?= $divide ?>
                                <?= $b != $ilgis ? "|" : "" ?>
                            </td>
                    <?php }} ?>
                </tr>
           </tbody> 
        </table>
        <form method="get">
            <label for="ilgis">Ilgis:</label><br>
            <input type="number" name="ilgis" value = <?= $_GET['ilgis']?>><br>
            <label for="plotis">Plotis:</label><br>
            <input type="number" name="plotis" value = <?= $_GET['plotis']?>><br>
            <input type="submit">
        </form>
    </body>
</html>