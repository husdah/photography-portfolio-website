$(document).ready(function () {

    $(document).on('click','.delete_project_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "code.php",
                    data: {
                        'project_id': id,
                        'delete_project_btn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "Project deleted Successfully!", "success");
                            $('#projects_table').load(location.href + " #projects_table");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
          });
    });

    $(document).on('click','.delete_category_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "code.php",
                    data: {
                        'category_id': id,
                        'delete_category_btn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "Category deleted Successfully!", "success");
                            $('#categories_table').load(location.href + " #categories_table");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
          });
    });

    $(document).on('click','.update_order_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();
        var order = $(this).closest('#projects_table').find('#'+id).val();

        swal({
            title: "Are you sure?",
            text: "Project order will be changed!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "code.php",
                    data: {
                        'project_id': id,
                        'order': order,
                        'update_order_btn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "Project order updated Successfully!", "success");
                            $('#projects_table').load(location.href + " #projects_table");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }else if(response == 501){
                            swal("Warning!", "Project Order can't be empty!", "warning");
                        }
                    }
                });
            }
          });
    });


    $(document).on('change','.catSelect', function (e) {
        e.preventDefault();

        var id = $(this).val();
        var type = $('input[name="type"]:checked').val();

        $.ajax({
            method:"POST",
            url: "code.php",
            data: {
                'category_id': id,
                'type': type,
                'catSelect': true
            },
            success: function(response){
                if(response == 500){
                    swal("Error!", "Something Went Wrong!", "error");                 
                }else{
                    let order = parseInt(response) + 1;
                    document.getElementById('projectOrder').value = order;
                }
            }
        });
    });

    $(document).on('change','.radioButton', function (e) {
        e.preventDefault();

        var id = $(this).closest('#addProjectForm').find('.catSelect').val();
        var type = $('input[name="type"]:checked').val();

        $.ajax({
            method:"POST",
            url: "code.php",
            data: {
                'category_id': id,
                'type': type,
                'radioButton': true
            },
            success: function(response){
                if(response == 500){
                    swal("Error!", "Something Went Wrong!", "error");                 
                }else{
                    let order = parseInt(response) + 1;
                    document.getElementById('projectOrder').value = order;
                }
            }
        });
    });
    
});