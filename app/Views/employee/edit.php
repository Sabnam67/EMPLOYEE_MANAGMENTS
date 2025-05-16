<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Edit Employee</h2>
    <form action="/employee/update/<?= $employee['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" value="<?= $employee['name'] ?>"></div>
        <div class="mb-3"><label>Address</label><textarea name="address" class="form-control"><?= $employee['address'] ?></textarea></div>
        <div class="mb-3"><label>Designation</label><input type="text" name="designation" class="form-control" value="<?= $employee['designation'] ?>"></div>
        <div class="mb-3"><label>Salary</label><input type="text" name="salary" class="form-control" value="<?= $employee['salary'] ?>"></div>
        <div class="mb-3"><label>Picture</label><input type="file" name="picture" class="form-control"></div>
        <?php if ($employee['picture']): ?>
            <img src="/uploads/<?= $employee['picture'] ?>" width="80">
        <?php endif; ?>
        <br><br>
        <button class="btn btn-success">Update</button>
    </form>
</body>
</html>
