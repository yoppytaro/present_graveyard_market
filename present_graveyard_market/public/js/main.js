/* global $ */
$(function() {
    $(document).ready(function() {
        paginathing()
    })

    function paginathing () {
        $('.pagination-container').remove();
        $('.items').paginathing({
            perPage: 10,
            prevText:'<i class="fas fa-angle-left"></i>',
            nextText:'<i class="fas fa-angle-right"></i>',
            activeClass: 'navi-active',
            firstText: '<i class="fas fa-angle-double-left"></i>', 
            lastText: '<i class="fas fa-angle-double-right"></i>', 
        })
    }

    $('.like_action').on('click',async function() {
        let item_id = $(this).data('item_id');
        let liked_id = $(this).data('liked_id');

        data = {
            'item_id': item_id,
            'liked_id': liked_id
        };

        result = await ajaxSend(data, 'POST', '/likes');
        
        if (!result[0]) {
            return
        }
        
        $(this).toggleClass('liked');

        return
        
    })

    $('#serch').on('click',async function() {
        $('.error').remove();
        $('.success').remove();

        item_name = $('#serch_name').val()
        category = Number($('#category').val())

        data = {
            'item_name' : item_name,
        }

        if (category !== 0) {
            data['category'] = category
        }

        result = await ajaxSend(data, 'POST', `/search/`);
        if (!result[0]) {
            flashMessage('error', result[1])
            return
        }
        resultJson = JSON.parse(result[1])

        $('.items').empty();

        if (!resultJson.length) {
            $('.items').append('<h3>データなし！！</h3>')
            return
        }

        resultJson.forEach(item  => {
            appendHtml = `
            <div class='item'>
                名前：${ item.name }
                説明：${ item.description }
                価格：${ item.price }
                カテゴリー：${ item.category }
                <a href="/item/${item.id}">
                    <img src="/storage/${item.image.split('/')[1]}" style="height: 100px" >
                </a>
                <i data-item_id=${item.id} data-liked_id='${item.isLikeBy}' class="like_action fas fa-thumbs-up { $item->isLikeBy !== null ? 'liked' : ''}}" ></i>
            </div>
            `
            $('.items').append(appendHtml)
        });

        paginathing()

        return
        
    })

    function flashMessage(messageType, messages) {
        if (messageType === 'success') {
            for(let message of messages) {
                $('.wrapper').prepend(`<div class='success'>${message}</div>`)
            }
            return
        }
        for(let message of messages) {
            $('.wrapper').prepend(`<div class='error'>${message}</div>`)
        }
    }

    function ajaxSend(data, methodType, url) {
        return new Promise((resolve) => {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: methodType,
                url: url,
                dataType: "json",
                data: data,
            }).done((res)=>{
                resolve([true,res]);
            }).fail(function (jqXHR, textStatus) {
                // httpステータス
                console.log(jqXHR.status);
                // エラー情報
                console.log(textStatus);
                errors = []
                for(let key in jqXHR.responseJSON.errors) {
                    let responseError = jqXHR.responseJSON.errors[key];
                    errors.push(responseError[0])
                }
                resolve([false,errors]);
            });
        });
    }
});