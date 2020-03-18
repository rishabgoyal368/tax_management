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

function showpassword(url,data,back_url)
    {
        
              $.ajax({
                url: url,
                type: 'POST',
                data: data,
                 headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success:function(data){
                  if (data['error']) {
                $('.passwordError').text(data['error']).addClass('alert alert-danger')
                }
                if (data['success']) {
                $('.passwordError').text(data['success']).addClass('alert alert-success')
                $('.hidepassword').css('display', 'block');
                $("#formpassword").replaceWith($('#formpassword', data));
                // $('#password').modal.location.reload(true);
                $("#formpassword")[0].reset();
                // $('#password').modal('hide');

                }
                },
              }); 
    };
   

$(document).ready(function() {
    // ===================> designation <=====================//
    $('.designationGet').keyup(function() {
        if ($(this).val().length > 2) {
            var searchValue = $(this).val();
            var url = $(this).data('url');
            // var select = $(this).data('select');
            // $('#' + select).prev().prev().val('')
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

    $('.showPasswordModal').click(function(){
    var url = $(this).data('url')
    var backUrl = $(this).data('back_url')
    $('.AuthenticateAdmin').attr('url',url).attr('data-back_url',backUrl)
    });

    $('.AuthenticateAdmin').click(function(){
      var  url = $(this).data('url')
      var  backUrl = $(this).data('back_url')
    var data = $('#formpassword').serialize();
    showpassword(url,data,backUrl)
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
            // var select = $(this).data('select');
            // $('#' + select).prev().prev().val('')
            var appendText = this;
            getDataByType(url, searchValue, appendText)
        }
        if ($('.commonCustomSelect').val().length < 2) {
            $('.recentSearchDrop').css('display', 'none')
            var select = $(this).data('select');
            $('#' + select).prev().prev().val('')
        }
    });

});