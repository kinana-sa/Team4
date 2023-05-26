<h1>Families</h1>

<nav>
        <ul>
            <li><a href= "/task2/family_create">Create Family</a></li>
            
        </ul>
    </nav>
    <form action="search" method="post">
         Search By Address:<input type="text" name="search">
         <input type="submit" value="Search">
</form>

<table>
    <thead>
        <tr>
            <th>FirstName</th>
            <th>MiddleName</th>
            <th>LastName</th>
            <th>Address</th>
            <th>JobStatus</th>
            <th>Members</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($families as $family): ?>
            <tr>
                <td><?= $family->getFirstName() ?></td>
                <td><?= $family->getMiddleName() ?></td>
                <td><?= $family->getLastName() ?></td>
                <td><?= $family->getAddress() ?></td>
                <td><?= $family->getJobStatus() ?></td>
                <td><?= $family->getMembers() ?></td>
                <td><?= $family->getPhone() ?></td>
                <td>
                    <form method="post" action="family_edit" >
                        <input type="hidden" name="id" value="<?= $family->getId() ?>">
                    <input type="submit" value="Edit">
                    </form>
                    <form method="post" action="family_delete">
                    <input type="hidden" name="id" value="<?= $family->getId() ?>">
                    <input type="submit" value="Delete">
                    </form>
            </td>
        
            </tr>
        <?php endforeach ?>
    </tbody>
</table>