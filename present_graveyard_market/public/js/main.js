/* global $ */
$(function() {
    $('.like_action').on('click', function() {
        let item_id = $(this).data('item_id');
        let liked_id = $(this).data('liked_id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: `/likes`,
            data: {
                'item_id': item_id,
                'liked_id': liked_id
            },
        }).done((res)=>{
            console.log(res);
            $(this).toggleClass('liked');
        }).fail(function (data, xhr, err) {
            console.log(err);
            console.log(xhr);
        });
    })
});