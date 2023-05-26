<h1>Edit User</h1>
<form method="post" action="update">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $user->getName() ?>">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= $user->getEmail() ?>">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="text" name="password" id="password" value="<?= $user->getPassword() ?>">
    </div>
    <input type="hidden" name="id" value="<?= $user->getId() ?>">
    <button>Update</button>
</form>