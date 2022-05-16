<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th,td{
            border: 1px solid;
        }
    </style>
</head>
<body>
    <table >
        <thead>
         <th>Product name</th>
         <th>Price</th>
         <th>Stock</th>
        </thead>
        <tbody>
         <?php foreach($data->result() as $rows){?>
         <tr>
           <td><?=$rows->pname?></td>
           <td><?=$rows->price?></td>
           <td><?=$rows->stock?></td>
         </tr>
         <?php } ?>
        </tbody>
    </table>
</body>
</html>