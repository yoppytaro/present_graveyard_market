/* global $ */
$(function() {
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
        item_name = $('#serch_name').val()
        category = $('#category').val()

        data = {
            'item_name' : $('#serch_name').val(),
            'category' : $('#category').val()
        }

        result = await ajaxSend(data, 'post', `/search/`);
        resultJson = JSON.parse(result[1])
        if (!result[0]) {
            return    
        }

        console.log();

        $('.items').empty();

        if (!resultJson.length) {
            $('.items').append('<h3>データなし！！</h3>')
            return
        }
        console.log(resultJson);

        resultJson.forEach(item  => {
            appendHtml = `
            <div>
                名前：${ item.name }
                説明：${ item.description }
                価格：${ item.price }
                カテゴリー：${ item.category }
                <a href="/item/${item.id}">
                    <img src="/storage/${item.image.match(/([^/]*)\./)[1]}" style="height: 100px" >
                </a>
                <i data-item_id=${item.id} data-liked_id='${item.isLikeBy}' class="like_action fas fa-thumbs-up { $item->isLikeBy !== null ? 'liked' : ''}}" ></i>
            </div>
            `
            $('.items').append(appendHtml)
        });

        return
        
    })

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
                resolve([false,jqXHR.status]);
            });
        });
    }
});