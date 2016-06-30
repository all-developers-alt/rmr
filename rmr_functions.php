<?php

/**
 * rmr_singleにインデックスされた特定の質問、回答ペアを
 * IDを指定して削除する事が可能です。
 * 
 * @param type $api_key 発行されたapi_key
 * @param type $id 質問、回答ペアのID
 * @return type 削除された質問、回答ペアのIDを配列で取得
 */
function delete_rmr_single($api_key, $id) {
    $data = array('api_key' => $api_key, 'id' => $id);
    $url = 'http://dev.alt.ai:80/api/rmr_single';
    $results = json_decode(http_delete($url, $data), true);
    return $results;
}

/**
 * rmr_singleのインデックスに、
 * 質問、回答ペアを登録する事が可能です。
 * 
 * @param type $api_key 発行されたapi_key
 * @param type $question 質問
 * @param type $answer 回答
 * @return type 登録された質問、回答ペアのIDを配列で取得
 */
function post_rmr_single($api_key, $question, $answer) {
    $data = array('api_key' => $api_key, 'question' => $question, 'answer' => $answer);
    $url = 'http://dev.alt.ai:80/api/rmr_single';
    $results = json_decode(http_post($url, $data), true);
    return $results;
}

/**
 * rmr_singleのインデックスに格納されている
 * 質問、回答ペアを入手された質問に関連が高いものから
 * 順番に配列として取得します。
 * 
 * @param type $api_key 発行されたapi_key
 * @param type $question 質問
 * @return type 質問、回答ペアの情報を配列で取得
 */
function get_rmr_single($api_key, $question) {
    $data = array('api_key' => $api_key, 'question' => $question);
    $url = 'http://dev.alt.ai:80/api/rmr_single';
    $results = json_decode(http_get($url, $data), true);
    return $results;
}

/**
 * rmr_singleのインデックスに格納されている
 * 質問、回答ペアを全て取得する事が可能です。
 * 
 * @param type $api_key 発行されたapi_key
 * @return type 全ての質問、回答ペアの情報を配列で取得
 */
function get_all_rmr_single($api_key) {
    $data = array('api_key' => $api_key);
    $url = 'http://dev.alt.ai:80/api/rmr_single/all';
    $results = json_decode(http_get($url, $data), true);
    return $results;
}

/**
 * rmr_singleのインデックスに格納されている
 * 質問、回答ペアを全て削除する事が可能です。
 * 
 * @param type $api_key 発行されたapi_key
 * @return type 全ての質問、回答ペアの削除情報を配列で取得
 */
function delete_all_rmr_single($api_key) {
    $data = array('api_key' => $api_key);
    $url = 'http://dev.alt.ai:80/api/rmr_single/all';
    $results = json_decode(http_delete($url, $data), true);
    return $results;
}

/**
 * rmr_continuousへ、質問、回答ペアを
 * インデックスする事が可能です。
 * 
 * @param type $api_key 発行されたapi_key
 * @param type $question 質問
 * @param type $answer 回答
 * @param type $memory_label 一連の会話を表すmemory_label
 * @return type 登録された質問、回答ペアのID、context_idを配列で取得
 */
function post_rmr_continuous($api_key, $question, $answer, $memory_label) {
    $data = array('api_key' => $api_key, 'question' => $question, 'answer' => $answer, 'memory_label' => $memory_label);
    $url = 'http://dev.alt.ai:80/api/rmr_continuous';
    $results = json_decode(http_post($url, $data), true);
    return $results;
}

/**
 * rmr_continuousへインデックスされている質問、回答ペアを
 * 質問、$memory_labelを指定する事により
 * 関連度の高い順に取得する事が可能です。
 * 
 * @param type $api_key 発行されたapi_key
 * @param type $question 質問
 * @param type $memory_label 一連の会話を表すmemory_label
 * @param type $session_id 継続会話のセッションIDを指定（指定が無い場合、内部で自動生成される）
 * @return type 継続会話の質問、回答ペア情報を配列で取得
 */
function get_rmr_continuous($api_key, $question, $context_id, $session_id = null) {
    $data = array('api_key' => $api_key, 'question' => $question, 'memory_label' => $memory_label, 'session_id' => $session_id);
    $url = 'http://dev.alt.ai:80/api/rmr_continuous';
    $results = json_decode(http_get($url, $data), true);
    return $results;
}

/**
 * rmr_continuousのインデックスに格納されている
 * 質問、回答ペアを全て取得する事が可能です。
 * 
 * @param type $api_key 発行されたapi_key
 * @return type 全ての質問、回答ペアの情報を配列で取得
 */
function get_all_rmr_continuous($api_key) {
    $data = array('api_key' => $api_key);
    $url = 'http://dev.alt.ai:80/api/rmr_continuous';
    $results = json_decode(http_get($url, $data), true);
    return $results;
}

/**
 * rmr_continuousのインデックスに格納されている
 * 質問、回答ペアを全て削除する事が可能です。
 * 
 * @param type $api_key 発行されたapi_key
 * @return type 全ての質問、回答ペアの削除情報を配列で取得
 */
function delete_all_rmr_continuous($api_key) {
    $data = array('api_key' => $api_key);
    $url = 'http://dev.alt.ai:80/api/rmr_continuous';
    $results = json_decode(http_delete($url, $data), true);
    return $results;
}

/**
 * rmrに登録されている同義語一覧を単語を
 * 入力する事により取得します。
 * ・api_keyが空の場合はユーザ全体で使用されている同義語一覧
 * ・api_keyが指定されている場合は、ユーザが定義した同義語一覧
 * が取得可能です。
 * 
 * @param type $word 取得したい同義語一覧に対する単語
 * @param type $api_key 発行されたapi_key
 * @return type 同義語の一覧情報を配列で取得
 */
function get_synonyms($word, $api_key = null) {
    $data = array('api_key' => $api_key, 'word' => $word);
    $url = 'http://dev.alt.ai:80/api/synonyms';
    $results = json_decode(http_get($url, $data), true);
    return $results;
}

/**
 * rmrにユーザ独自の同義語ペアを登録する事が可能です。
 * 同義語は複合語で無い事が条件で、同義語の登録状態は
 * APIの呼び出し後に確認できます。
 * 
 * @param type $api_key 発行されたapi_key
 * @param type $word1 単語１
 * @param type $word2 単語２
 * @return type 同義語ペアの登録状況を示す情報を配列で取得
 */
function post_synonyms($api_key, $word1, $word2) {
    $data = array('api_key' => $api_key, 'word1' => $word1, 'word2' => $word2);
    $url = 'http://dev.alt.ai:80/api/synonyms';
    $results = json_decode(http_post($url, $data), true);
    return $results;
}

/**
 * ユーザが定義した全ての同義語ペアを取得します。
 * 
 * @param type $api_key 発行されたapi_key
 * @return type ユーザが定義した全ての同義語ペアを配列で取得
 */
function get_all_synonyms($api_key) {
    $data = array('api_key' => $api_key);
    $url = 'http://dev.alt.ai:80/api/synonyms';
    $results = json_decode(http_get($url, $data), true);
    return $results;
}

/**
 * ユーザが定義した全ての同義語ペアを削除可能です。
 * 
 * @param type $api_key 発行されたapi_key
 * @return type ユーザが定義した全ての同義語ペアの削除状況を配列で取得
 */
function delete_all_synonyms($api_key) {
    $data = array('api_key' => $api_key);
    $url = 'http://dev.alt.ai:80/api/synonyms';
    $results = json_decode(http_delete($url, $data), true);
    return $results;
}

/**
 * ユーザが独自定義した同義語ペアを削除する事が可能です。
 * 
 * @param type $api_key 発行されたapi_key
 * @param type $word1 単語１
 * @param type $word2 単語２
 * @return type 同義語ペアの削除状況の情報を配列で取得
 */
function delete_synonyms($api_key, $word1, $word2) {
    $data = array('api_key' => $api_key, 'word1' => $word1, 'word2' => $word2);
    $url = 'http://dev.alt.ai:80/api/synonyms';
    $results = json_decode(http_delete($url, $data), true);
    return $results;
}

function http_post($url, $data) {
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($data, '', '&'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
    ));
    $contents = curl_exec($ch);
    return $contents;
}

function http_put($url, $data) {
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query($data, '', '&'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
    ));
    $contents = curl_exec($ch);
    return $contents;
}

function http_delete($url, $data) {
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_POSTFIELDS => http_build_query($data, '', '&'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
    ));
    $contents = curl_exec($ch);
    if (!$contents) {
        return curl_error($ch);
    }
    return $contents;
}
