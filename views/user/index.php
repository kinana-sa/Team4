<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Users</h1>

<a href = "/task2/create">Create User</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td> <?php echo $user->getId(); ?> </td>
            <td> <?php echo $user->getName(); ?> </td>
            <td> <?php echo $user->getEmail(); ?> </td>
            <td> <?php //echo $user->getType(); ?> </td>
            <td> 
                <form method="post" action="edit?id=<?= $user->getId()?>">
                    <input type="hidden" name="id" value="<?= $user->getId() ?>">
                    <input type = "submit" value ="edit">
                </form>

                <form method="post" action="delete">
                    <input type="hidden" name="id" value="<?= $user->getId() ?>">   
                    <input type = "submit" value ="delete">
                </form>
            </td>
        </tr>

        <?php endforeach ?>

    </tbody>
    </table>
</body>
</html>