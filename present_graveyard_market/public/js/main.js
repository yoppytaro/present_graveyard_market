/* global $ */
$(function() {
    /* ページを読み込んだ際にページネーションを実行 */
    $(document).ready(function() {
        paginathing()
    })

    /* お気に入り */
    $(document).on('click', '.like_action', async function() {
        $('.error').remove()
        $('.success').remove()
        let item_id = $(this).data('item_id')

        data = {
            'item_id': item_id
        }

        result = await ajaxSend(data, 'POST', '/likes')
        
        // エラー処理
        if (!result[0]) {
            flashMessage('error', result[1])
            return
        }
        
        resultJson = JSON.parse(result[1])

        // お気に入り登録
        if (resultJson) {
            $(this).addClass('liked')
            flashMessage('success', ['お気に入りに登録しました'])
            return
        }

        // お気に入り取り消し
        $(this).removeClass('liked')
        flashMessage('success', ['お気に入りを取り消しました'])
        return
    })

    /* 商品検索 */
    $('#serch').on('click',async function() {
        $('.error').remove()
        $('.success').remove()

        item_name = $('#serch_name').val()
        category = Number($('#category').val())

        data = {
            'item_name' : item_name,
        }

        if (category !== 0) {
            data['category'] = category
        }

        result = await ajaxSend(data, 'POST', `/search/`)
        if (!result[0]) {
            flashMessage('error', result[1])
            return
        }
        resultJson = JSON.parse(result[1])

        $('.items').empty()

        // データなし
        if (!resultJson.length) {
            $('.items').append('<h3>データなし！！</h3>')
            return
        }

        // 検索結果を一覧に表示
        resultJson.forEach(item => {
            appendHtml = `
            <div class='item'>
                <div class="item_name">
                    ${ item.name }
                </div>
                <a href="/item/${item.id}">
                    <img class="item_img" src="/storage/${item.image.split('/')[1]}">
                </a>
                <i data-item_id=${item.id} class="like_action fas fa-thumbs-up ${item.isLikeBy ? 'liked': ''}"></i>
            </div>
            `
            $('.items').append(appendHtml)
        })

        // ページネーション
        paginathing()
        return
    })

    /* 関数リスト
    --------------------------------
    */

    /* ページネーション */
    function paginathing () {
        $('.pagination-container').remove()
        $('.items').paginathing({
            perPage: 10,
            prevText:'<i class="fas fa-angle-left"></i>',
            nextText:'<i class="fas fa-angle-right"></i>',
            activeClass: 'navi-active',
            firstText: '<i class="fas fa-angle-double-left"></i>', 
            lastText: '<i class="fas fa-angle-double-right"></i>', 
        })
    } 

    /* フラッシュメッセージ */
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

    /* リクエスト送信 */
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
                resolve([true,res])
            }).fail(function (jqXHR, textStatus) {
                // httpステータス
                console.log(jqXHR.status)
                // エラー情報
                console.log(textStatus)
                errors = []
                for(let key in jqXHR.responseJSON.errors) {
                    let responseError = jqXHR.responseJSON.errors[key]
                    errors.push(responseError[0])
                }
                resolve([false,errors])
            })
        })
    }
})