<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Employee List</h2>
    <a href="/employee/create" class="btn btn-success mb-3">Add New</a>
    <a href="/logout" class="btn btn-danger mb-3 float-end">Logout</a>
    <table class="table table-bordered">
        <tr>
            <th>Picture</th>
            <th>Name</th>
            <th>Address</th>
            <th>Designation</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($employees as $row): ?>
        <tr>
            <td>
                <?php if ($row['picture']): ?>
                    <img src="/uploads/<?= $row['picture'] ?>" width="50">
                <?php endif; ?>
            </td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['designation'] ?></td>
            <td><?= $row['salary'] ?></td>
            <td>
                <a href="/employee/edit/<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/employee/delete/<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this employee?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
