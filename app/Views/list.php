<!DOCTYPE html>
<html lang="en">
<head>
<title>CRUD Jquery Ajax</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js   "></script>

</head>
<body>
    <div class="container"><br/><br/>
        <div class="row">
            <div class="col-lg-10">
                <h2> CodeIgniter CRUD test</h2>
            </div>
            <div class="col-lg-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add New Student
                </button>
            </div>
        </div>
        <table class="table table-bordered table-striped" id="studentTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($students_detail as $row){
            ?>
            <tr id="<?php echo $row ['id'];?>">
                <td><?php echo $row ['id']; ?></td>
                <td><?php echo $row ['first_name']; ?></td>
                <td><?php echo $row ['last_name']; ?></td>
                <td><?php echo $row ['address']; ?></td>
                <td>
                    <a data-id="<?php echo $row ['id']; ?>" class="btn btn-primary btnEdit">Edit</a>
                    <a data-id="<?php echo $row ['id']; ?>" class="btn btn-danger btnDelete">Delete</a>
                    <a data-id="<?php echo $row ['id']; ?>" class="btn btn-success btnView">View Grades</a>

                </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addStudent" name="addStudent" action="<?php echo site_url('student/store');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtFirstName">First Name:</label>
                        <input type="text" class="form-control" id="txtFirstName" placeholder="Enter First Name" name="txtFirstName">
                    </div>
                    <div class="form-group">
                        <label for="txtLastName">Last Name:</label>
                        <input type="text" class="form-control" id="txtLastName" placeholder="Enter Last Name" name="txtLastName">
                    </div>
                    <div class="form-group">
                        <label for="txtAddress">Address:</label>
                        <input type="text" class="form-control" id="txtAddress" placeholder="Enter Address" name="txtAddress">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
                </div>
        </div>
</div>

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Update Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateStudent" name="updateStudent" action="<?php echo site_url('student/update');?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="hdnStudentId" id="hdnStudentId"/>
                    <div class="form-group">
                        <label for="txtFirstName">First Name:</label>
                        <input type="text" class="form-control" id="txtFirstName" placeholder="Enter First Name" name="txtFirstName">
                    </div>
                    <div class="form-group">
                        <label for="txtLastName">Last Name:</label>
                        <input type="text" class="form-control" id="txtLastName" placeholder="Enter Last Name" name="txtLastName">
                    </div>
                    <div class="form-group">
                        <label for="txtAddress">Address:</label>
                        <textarea class="form-control" id="txtAddress" name="txtAddress" rows="10" placeholder="Enter Address"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div style="display:block;">
                            <h5 class="modal-title" id="ModalLabel">Student Grades</h5><br>
                            <div class="nameStudent" style="margin-top:-10px;">Name: </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-striped" id="viewTable">
                            <thead>
                                <tr>
                                    <th>Grade ID</th>
                                    <th>Subject</th>
                                    <th>Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</div>

<script>
    $(document).ready(function() {
        $('#studentTable').DataTable();

        $("#addStudent").validate({
            rules: {
                txtFirstName: "required",
                txtLastName: "required",
                txtAddress: "required"
            },
            messages: {
            },

            submitHandler: function(form) {
            var form_action = $("#addStudent").attr("action");
            $.ajax({
                data: $('#addStudent').serialize(),
                url: form_action,
                type: "POST",
                dataType: 'json',
                success: function (res) {
                    var student = '<tr id="'+res.data.id+'">';
                    student += '<td>' + res.data.id + '</td>';
                    student += '<td>' + res.data.first_name + '</td>';
                    student += '<td>' + res.data.last_name + '</td>';
                    student += '<td>' + res.data.address + '</td>';
                    student += '<td><a data-id="' + res.data.id + '" class="btn btn-primary btnEdit">Edit</a>  <a data-id="' + res.data.id + '" class="btn btn-danger btnDelete">Delete</a> <a data-id="' + res.data.id + '" class="btn btn-success btnView">View Grades</a> </td>';
                    student += '</tr>';            
                    $('#studentTable tbody').prepend(student);
                    $('#addStudent')[0].reset();
                    $('#addModal').modal('hide');
                },
                    error: function (data) {
                }
                });
            }
        });

            $('body').on('click', '.btnEdit', function () {
                var student_id = $(this).attr('data-id');
                console.log(student_id);
                $.ajax({
                    url: 'student/edit/'+student_id,
                    type: "GET",
                    dataType: 'json',
                    success: function (res) {
                        $('#updateModal').modal('show');
                        $('#updateStudent #hdnStudentId').val(res.data.id); 
                        $('#updateStudent #txtFirstName').val(res.data.first_name);
                        $('#updateStudent #txtLastName').val(res.data.last_name);
                        $('#updateStudent #txtAddress').val(res.data.address);
                },
                error: function (xhr, status, error) {
            console.log('Error:', xhr, status, error);
                }
            });
        });

        $("updateStudent").validate({
            rules: {
            txtFirstName: "required",
                txtLastName: "required",
                txtAddress: "required"
            },  
            messages: {
            },
        });

        
        $('body').on('click', '.btnView', function () {
    var student_id = $(this).attr('data-id');
    $.ajax({
        url: 'student/view/' + student_id,
        type: "GET",
        dataType: 'json',
        success: function (res) {
            if (res.status && typeof res.data === 'object') {
                // Display the student's full name
                var fullName = 'Student: ' + res.data.first_name + ' ' + res.data.last_name;
                $('.nameStudent').text(fullName);

                // Show the modal
                $('#viewModal').modal('show');

                // Fetch grade details using gradeId
                $.ajax({
                    url: 'grade/view/' + student_id,
                    type: "GET",
                    dataType: 'json',
                    success: function (gradeRes) {
                        if (gradeRes.status && typeof gradeRes.data === 'object') {
                            // Clear the previous content
                            $('#viewTable tbody').empty();

                            // Create a single row for the student data
                            var student = '<tr>';
                            student += '<td>' + gradeRes.data.gradeId + '</td>';
                            student += '<td>' + gradeRes.data.grade + '</td>';
                            student += '<td>' + gradeRes.data.subject + '</td>';
                            student += '</tr>';

                            // Append the student data to the table body
                            $('#viewTable tbody').append(student);
                        } else {
                            // Handle invalid or empty data
                            console.error("Invalid or empty grade data received.");
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error("Error fetching grade data:", xhr, status, error);
                    }
                });
            } else {
                // Handle invalid or empty student data
                console.error("Invalid or empty student data received.");
            }
        },
        error: function (xhr, status, error) {
            // Handle error
            console.error("Error fetching student data:", xhr, status, error);
        }
    });
});

    
    });

    $("#updateStudent").validate({
        rules: {
            txtFirstName: "required",
            txtLastName: "required",
            txtAddress: "required"
        },
            messages: {
        },
        submitHandler: function(form) {
            var form_action = $("#updateStudent").attr("action");
            $.ajax({
                data: $('#updateStudent').serialize(),
                url: form_action,
                type: "POST",
                dataType: 'json',
                success: function (res) {
                    // Update student data in the table
                    var studentRow = '<td>' + res.data.id + '</td>';
                    studentRow += '<td>' + res.data.first_name + '</td>';
                    studentRow += '<td>' + res.data.last_name + '</td>';
                    studentRow += '<td>' + res.data.address + '</td>';
                    studentRow += '<td><a data-id="' + res.data.id + '" class="btn btn-primary btnEdit">Edit</a>  <a data-id="' + res.data.id + '" class="btn btn-danger btnDelete">Delete</a> <a data-id="' + res.data.id + '" class="btn btn-success btnView">View Grades</a> </td>';
                    
                    $('#studentTable tbody #'+ res.data.id).html(studentRow);
                    $('#updateStudent')[0].reset();
                    $('#updateModal').modal('hide');
                },
                    error: function (data) {
                }
            });
        }
    }); 

    $('body').on('click', '.btnDelete', function () {
        var student_id = $(this).attr('data-id');
        $.get('student/delete/'+student_id, function (data) {
            $('#studentTable tbody #'+ student_id).remove();
        })
    });  
</script>

</body>
</html>