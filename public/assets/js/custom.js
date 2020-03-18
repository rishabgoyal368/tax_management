function getDataByType(url, val, appendText) {
    console.log(appendText)
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'JSON',
        data: { 'name': val },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(data) {
            if (data.length > 0) {
                $('#textboxSelect li').remove()
                var optionsAsString = "";
                $('#textboxSelect').css('display', 'block')
                $(data).each(function(index, value) {
                    $(value).each(function(i, j) {
                        optionsAsString += '<li class="selectDocId" data-docId="' + j.id + '">' + j.title + '</li>'
                    })
                })
                $('#textboxSelect').append(optionsAsString);
                $('.selectDocId').click(function() {
                    // click on dropdown
                    var valInput = $(this).text();
                    appendText.value = $(this).text();
                    // $('#textboxSelect').prev().prev().val($(this).data('docid'))
                    $('#textboxSelect').css('display', 'none')

                });
            } else {
                // If no data found
                $('.recentSearchDrop').css('display', 'none')
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
                setTimeout(function() { location.href = back_url }, 2000);

            }
        },
        error: function(err) {
            // alert('Something went wrong')
        }
    });
}
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
$('.sortCick').click(function(){
var name = $(this).data('name')
var value = $(this).data('value')
var id = $(this).data('id')
var submit = $(this).data('submit')
$('#'+id).val(value).attr('name',name)
$('#'+submit).trigger('click')
});

$('.sortplateform').click(function(){
var name = $(this).data('name')
var value = $(this).data('value')
var id = $(this).data('id')
var submit = $(this).data('submit')
$('#'+id).val(value).attr('name',name)
$('#'+submit).trigger('click')
});

$('.sortemail').click(function(){
    var name = $(this).data('name');
    var value = $(this).data('value');
    var id = $(this).data('id');
    var submit = $(this).data('submit');
    $('#'+id).val(value).attr('name',name)
    $('#'+submit).trigger('click');

    //console.log(name);
});

$('.sortstatus').click(function(){
    var name = $(this).data('name');
    var value = $(this).data('value');
    var id = $(this).data('id');
    var submit = $(this).data('submit');
    $('#'+id).val(value).attr('name',name)
    $('#'+submit).trigger('click');

});

$('.sortlink').click(function(){
    var name = $(this).data('name');
    console.log(name);
    var value = $(this).data('value');
    var id = $(this).data('id');
    var submit = $(this).data('submit');
    $('#'+id).val(value).attr('name',name)
    $('#'+submit).trigger('click');

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