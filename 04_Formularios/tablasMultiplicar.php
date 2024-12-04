<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0 auto;
            text-align: center;
            display: flex;
            flex-flow: row wrap;
            justify-content: space-between;
        }
        table{
            background-color: aqua;
            border: 1px solid black;
            box-shadow: 2px 2px 8px blue;
            padding: auto;
            margin: 10px;
            width: 18%;
        }
    </style>
</head>
<body>
    <?php
    $res = 0;
    for ($i=1; $i <= 10; $i++) { ?>
    <table>
        <thead>
            <tr>
                <th>Tabla del <?php echo $i ?></th>
            </tr>
        </thead>
        <tbody> 
    <?php
        for ($j=1; $j <= 10; $j++) { 
            $res = $i * $j;
            ?>
            <tr>
                <td>
                    <?php echo "$i x $j = $res"; ?>
                </td>
            </tr>
        <?php 
        } 
        ?>
        </tbody>
    </table>
    <?php
    }
    ?>
</body>
</html>