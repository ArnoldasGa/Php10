<html>
<head>    
    <style>        
        .even {
            border: solid 1px black;
            background-color: black;
            width: 100px;
            height: 100px;
        }

        .odd {
            border: solid 1px black;
            background-color: #FFF;
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <table>
        <tbody>

            <?php for ($a = 0; $a < 8; $a++) { ?>
            <tr>
                <?php for ($i = 0; $i < 4; $i++) { 
                    if ($a % 2 === 0){ ?>
                    <td class = 'even'></td>
                    <td class = 'odd'></td>
                <?php }else { ?>
                    <td class = 'odd'></td>
                    <td class = 'even'></td>
                <?php }} ?>
                <?php } ?>
            </tr>
        </tbody>
    </table>
</body>
</html>

<?php 
//  1. Sukurkite programą kuri išvestu šachmatų lentą (HTML) 