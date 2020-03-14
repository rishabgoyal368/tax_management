function getDataByType(url, val, appendText) {
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
                    $('#textboxSelect').prev().prev().val($(this).data('docid'))
                    $('#textboxSelect').css('display', 'none')

                });
            } else {
                // If no data found
                $('.recentSearchDrop').css('display', 'none')
            }
            console.log(data.length)
        },
        error: function(err) {}
    });
}
$(document).ready(function() {

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

});