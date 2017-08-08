<?php
if(is_uploaded_file($_FILES['file']['tmp_name'])){
    if(!file_exists('img')){
        mkdir('img');
    }
    $file='img/'.basename($_FILES['file']['name']);
    if(move_uploaded_file($_FILES['file']['tmp_name'], $file)){
        echo '<h1>',$file, 'のアップロードに成功</h1>';
        echo '<h2>以下変換した文章</h2>';
    } else{
        echo 'アップロードに失敗しました。';
    }
} else{
    echo 'ファイルを選択してください。';
}
        // APIキー
        $apiKey = "AIzaSyDJqBzqbDaBUyEuAcIvLLbB-tGTUydiOwk";

        // 画像ファイル名
        $imageNm = $file ;

        // リクエスト用json作成
        $json = json_encode(array(
                "requests" => array(
                        array(
                                "image" => array(
                                        "content" => base64_encode(file_get_contents($imageNm)),
                                ),
                                "features" => array(
                                        array(
                                                "type" => "TEXT_DETECTION",
                                                "maxResults" => 10,
                                        ),
                                ),
                        ),
                ),
        ));

        // 各種オプションを設定
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://vision.googleapis.com/v1/images:annotate?key=" . $apiKey); // Google Cloud Vision APIのURLを設定
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // curl_execの結果を文字列で取得
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // サーバ証明書の検証を行わない
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST"); // POSTでリクエストする
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); // 送信するHTTPヘッダーの設定
        curl_setopt($curl, CURLOPT_TIMEOUT, 15); // タイムアウト時間の設定（秒）
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json); // 送信するjsonデータを設定

        // curl実行
        $res = curl_exec($curl);
        $data = json_decode($res, true);
        curl_close($curl);


        // 結果を表示
        print $data["responses"][0]["fullTextAnnotation"]["text"];
        echo '<br><br><a href="http://dvlp.work/php/ocr-input.php">入力ページに戻る</a>';
?>