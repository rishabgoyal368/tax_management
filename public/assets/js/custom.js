function getDataByType(url, val, appendText) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'JSON',
        data: { 'name': val },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(data) {
            // console.log(data)
            if (data.length > 0) {
                $(appendText).next('ul').empty()
                var optionsAsString = "";
                $(appendText).next('ul').css('display', 'block')
                $(data).each(function(index, value) {
                    $(value).each(function(i, j) {
                        optionsAsString += '<li class="selectDocId" data-docId="' + j.id + '">' + j.title + '</li>'
                    })
                })
                $(appendText).next('ul').append(optionsAsString);
                $('.selectDocId').click(function() {
                    appendText.value = $(this).text();
                    $(appendText).prev().val($(this).data('docid'))
                    $(appendText).next('ul').css('display', 'none')
                });
            } else {
                // If no data found
                $(appendText).next('ul').css('display', 'none')
            }
        },
        error: function(err) {}
    });
}

function importData(url, type) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'JSON',
        data: { 'type': type },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(data) {
            console.log(data)

        },
        error: function(err) {}
    });
}

function commonDelete(url, id, back_url) {
    $('#loader-wrapper').css('display', 'block')
    $.ajax({
        url: url,
        type: 'DELETE',
        dataType: 'JSON',
        data: { 'id': id },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(data) {
            console.log(data);
            $('#loader-wrapper').css('display', 'none')
            if (data['error']) {
                $('.deleteError').text(data['error']).addClass('alert alert-danger')
            }
            if (data['success']) {
                $('.deleteError').text(data['success']).addClass('alert alert-success')
                setTimeout(function() { location.href = back_url }, 500);
            }
        },
        error: function(err) {
            alert('Something went wrong')
        }
    });
}
$(document).ready(function() {
    // ===================> designation <=====================//
    $('.designationGet').keyup(function() {
        if ($(this).val().length > 2) {
            var searchValue = $(this).val();
            var url = $(this).data('url');
            var appendText = this;
            getDataByType(url, searchValue, appendText)
        }
        if ($('.designationGet').val().length < 2) {
            $('.recentSearchDrop').css('display', 'none')
            var select = $(this).data('select');
            $('#' + select).prev().prev().val('')
        }
    });

    //========================= JOB LISTING WEBSITE <===================//
    $('.sortCick').click(function() {
        var name = $(this).data('name')
        var value = $(this).data('value')
        var id = $(this).data('id')
        var submit = $(this).data('submit')
        $('#' + id).val(value).attr('name', name)
        $('#' + submit).trigger('click')
    });


    //================ COMMON FUNCTION <==================
    $('.common_delete').click(function() {
        $('.deleteList').attr('data-url', $(this).data('url')).attr('data-id', $(this).data('id')).attr('data-back_url', $(this).data('back_url'))
    });

    $(document).on('click', '.deleteList', function() {
        var url = $(this).data('url');
        var id = $(this).data('id');
        var backUrl = $(this).data('back_url');
        $(this).attr('disabled', true)
        commonDelete(url, id, backUrl)

    });

    $('.commonCustomSelect').keyup(function() {
        if ($(this).val().length > 2) {
            var searchValue = $(this).val();
            var url = $(this).data('url');
            var appendText = this;
            getDataByType(url, searchValue, appendText)
        }
        if ($('.commonCustomSelect').val().length < 2) {
            $('.recentSearchDrop').css('display', 'none')
            var select = $(this).data('select');
            $('#' + select).prev().prev().val('')
        }
    });

    // Import Document
    $('#importData').click(function() {
        var url = $(this).data('url')
        var modal_name = $(this).data('model_name')
        var type = $(this).data('type')
        $('#import_data_modal_type').val(type)
        $('#import_data_modal_form').attr('action', url)
        $('#import_data_modal_head').text(modal_name)
    });

    // Submit import data form
    $("#import_data_modal_form").submit(function(e) {
        var form = $(this);
        var url = form.attr('action');
        var total_file = document.getElementById("import").files[0];
        var formData = new FormData();
        formData.append('import', total_file);
        formData.append('type', $('#import_data_modal_type').val());
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(data) {
                console.log(data)
            }
        });
    });

});