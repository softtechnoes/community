var Datepicker = (function () {

    // Variables

    var $datepicker = $('.datepicker');


    // Methods

    function init($this) {
        var options = {
            format: "dd/mm/yyyy",
            disableTouchKeyboard: true,
            autoclose: false,
        };

        $this.datepicker(options);
    }

    // Events

    if ($datepicker.length) {
        $datepicker.each(function () {
            init($(this));
        });
    }

})();

$('.remove-user').click(function () {
    let user_id = $(this).attr('user-id');
    console.log('check user id', user_id);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this User record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then(function (e) {
        if (e === true) {
            $.ajax({
                type: 'GET',
                url: "/remove_user/" + user_id,
                dataType: 'JSON',
                success: function (results) {
                    let delete_user = results.user_record;
                    console.log('check user record', delete_user);
                    if (delete_user) {
                        swal("Poof! User records has been deleted!", {
                            icon: "success",
                        });
                        $("#user_id_"+ delete_user.id).remove();
                    } else {
                        swal("Your Is not found!");
                    }
                }
            });
        } else {
            swal("User data is safe!");
        }

    }, function (dismiss) {
        return false;
    })

});


//members delete

$('.remove-member').click(function () {
    let user_id = $(this).attr('user-id');
    console.log('check member id', user_id);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this User record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then(function (e) {
        if (e === true) {
            $.ajax({
                type: 'GET',
                url: "/remove_member/" + user_id,
                dataType: 'JSON',
                success: function (results) {
                    let member_delete = results.member_delete;
                    if (member_delete) {
                        swal("Poof! Member records has been deleted!", {
                            icon: "success",
                        });
                        $("#member_id_" + member_delete.id).remove();
                    } else {
                        swal("Your Is not found!");
                    }
                }
            });
        } else {
            swal("User data is safe!");
        }

    }, function (dismiss) {
        return false;
    })

});

$('.category_delete').click(function () {
    let category_id = $(this).attr('category-id');
    // console.log('check user id', user_id);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this categories record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then(function (e) {
        if (e === true) {
            $.ajax({
                type: 'GET',
                url: "/remove_categories/" + category_id,
                dataType: 'JSON',
                success: function (results) {
                    let remove_categories = results.remove_categories;
                    // console.log('check user record', remove_categories);
                    if (remove_categories) {
                        swal("Poof! Categories records has been deleted!", {
                            icon: "success",
                        });
                        $("#categorie_" + remove_categories.id).remove();
                    } else {
                        swal("Your Is not found!");
                    }
                }
            });
        } else {
            swal("Categories data is safe!");
        }

    }, function (dismiss) {
        return false;
    })

});


//categories data submit 

// $('#contactForm').on('submit',function(event){

// }

$('#categoriesform1').on('submit', function (event) {
    event.preventDefault();
    let categories_name = $('#categories_name').val();
    let categories_image = $('#categories_image').val();

    $.ajax({
        url: "/categories",
        type: "POST",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            categories_name: categories_name,
            categories_image: categories_image,
        },
        success: function (response) {
            console.log(response);
        },
    });
});


//subcategories image show

$('.image-show').click(function () {

    let id = $(this).attr('img-id');
    if (id) {
        $.ajax({
            url: '/show_image/' + id,
            type: 'GET',
            success: function (response) {
                console.log('image response', response.get_image);
                if (response.get_image) {
                    var x = response.get_image;
                    console.log('image is ', x.image);
                    $('.modal-title').html('<h5>' + 'Sub_Categories Image' + ' - ' + x.subcategory_name + '</h5>');
                    $(".modal-body").html('<img src="/admin/subcategories/' + x.subcategory_image + '" width="470px" height="230px">');
                }
            }
        });
    };
});


//sub categories delete

$('.subcategory_delete').click(function () {
    let subcategory_id = $(this).attr('subcategory-id');
    // console.log('check user id', user_id);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Sub Category record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then(function (e) {
        if (e === true) {
            $.ajax({
                type: 'GET',
                url: "/remove_subcategories/" + subcategory_id,
                dataType: 'JSON',
                success: function (results) {
                    let subcategories = results.subcategories;
                    if (subcategories) {
                        swal("Poof! Sub Categories records has been deleted!", {
                            icon: "success",
                        });
                        $("#subcategories_" + subcategories.id).remove();
                    } else {
                        swal("Your Is not found!");
                    }
                }
            });
        } else {
            swal("Sub Categories data is safe!");
        }

    }, function (dismiss) {
        return false;
    })
});


$('.news_remove').click(function () {
    let news_id = $(this).attr('news-id');
    // console.log('check user id', user_id);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this News record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then(function (e) {
        if (e === true) {
            $.ajax({
                type: 'GET',
                url: "/news_remove/" + news_id,
                dataType: 'JSON',
                success: function (results) {
                    let news = results.news;
                    if (news) {
                        swal("Poof! News records has been deleted!", {
                            icon: "success",
                        });
                        $("#news_id" + news.id).remove();
                    } else {
                        swal("Your Is not found!");
                    }
                }
            });
        } else {
            swal("Sub Categories data is safe!");
        }

    }, function (dismiss) {
        return false;
    })
});


// New image show 

$('.New-image').click(function () {

    let id = $(this).attr('img-id');
    if (id) {
        $.ajax({
            url: '/news_image/' + id,
            type: 'GET',
            success: function (response) {
                console.log('image response', response.get_image);
                if (response.get_image) {
                    var x = response.get_image;
                    console.log('image is ', x.image);
                    $('.modal-title').html('<h5>'  + x.title + '</h5>');
                    $(".modal-body").html('<img src="/admin/news/' + x.image + '" width="470px" height="230px">');
                }
            }
        });
    };
});




//event remove 

$('.event-remove').click(function () {
    let event_id = $(this).attr('event-id');
    console.log('check user id', event_id);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this User record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then(function (e) {
        if (e === true) {
            $.ajax({
                type: 'GET',
                url: "/remove_event/" + event_id,
                dataType: 'JSON',
                success: function (results) {
                    let event = results.event;
                    console.log('check user record', event);
                    if (event) {
                        swal("Poof! User records has been deleted!", {
                            icon: "success",
                        });
                        $("#event_"+ event.id).remove();
                    } else {
                        swal("Your Is not found!");
                    }
                }
            });
        } else {
            swal("User data is safe!");
        }

    }, function (dismiss) {
        return false;
    })

});


$('.event-image').click(function () {
    let id = $(this).attr('img-id');
    if (id) {
        $.ajax({
            url: '/news_image/' + id,
            type: 'GET',
            success: function (response) {
                console.log('image response', response.event_image);
                if (response.event_image) {
                    var x = response.event_image;
                    console.log('image is ', x.image);
                    $('.modal-title').html('<h5>' + 'Event - '  + x.name + '</h5>');
                    $(".modal-body").html('<img src="/admin/event/' + x.image + '" width="470px" height="230px">');
                }
            }
        });
    };
});