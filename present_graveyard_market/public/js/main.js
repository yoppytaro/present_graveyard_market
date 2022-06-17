/* global $ */
$(function() {
    $('.like').on('click', function() {
        let id = $('.like').data()['id'];
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: `/likes`,
            data: {
                'id': id
            },
        }).done(function(data) {
            
        });
    })
});