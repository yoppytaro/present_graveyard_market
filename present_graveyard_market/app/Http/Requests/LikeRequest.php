<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LikeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'item_id' => ['required', 'exists:items,id']
        ];
    }

    public function messages()
    {
        return [
            'item_id.required' => 'idは必ず指定してください。',
            'item_id.exists' => '選択されたidは正しくありません。',
        ];
    }

    //validationでエラーがでた時にjsonで返す。
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            //エラー番号
            'status' => 400, 
            // バリデーションエラー格納
            'errors' => $validator->errors(),
        ],400); //実際に送られるresponse codeが400番　これが無いと、jsonでエラーメッセージは返ってくるけど送れらてくるのは200番のstatusOKとくる。

        //例外を知らせる。
        //throw new 例外クラス名（例外message）
        throw new HttpResponseException($response);
    }
}
