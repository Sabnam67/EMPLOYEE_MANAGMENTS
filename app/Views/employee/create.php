<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Add New Employee</h2>
    <form action="/employee/store" method="post" enctype="multipart/form-data">
        <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control"></div>
        <div class="mb-3"><label>Address</label><textarea name="address" class="form-control"></textarea></div>
        <div class="mb-3"><label>Designation</label><input type="text" name="designation" class="form-control"></div>
        <div class="mb-3"><label>Salary</label><input type="text" name="salary" class="form-control"></div>
        <div class="mb-3"><label>Picture</label><input type="file" name="picture" class="form-control"></div>
        <button class="btn btn-primary">Save</button>
    </form>
</body>
</html>
