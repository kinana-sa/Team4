<h1>Edit Family</h1>
<form method="post" action="family_update">
    <div>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?= $f->getFirstName() ?>">
    </div>
    <div>
        <label for="middle_name">Middle Name:</label>
        <input type="text" name="middle_name" value="<?= $f->getMiddleName() ?>">
    </div>
    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?= $f->getLastName() ?>">
    </div>
    <div>
        <label for="members">Members:</label>
        <input type="text" name="members"  value="<?= $f->getMembers() ?>">
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="<?= $f->getPhone() ?>">
    </div>
    <div>
        <label for="job_status">Job Status:</label>
        <input type="text" name="job_status" id="job_status" value="<?= $f->getJobStatus() ?>">
    </div>
    <div>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?= $f->getAddress() ?>">
    </div>
    <input type="hidden" name="id" value="<?= $f->getId() ?>">
    <input type="submit" value="Update">
</form>