<?php

/**
 * 指定したTSVファイルからデータを読み込み、
 * rmr_single用のデータをインデックスする関数です。
 * 
 * @param type $url rmr_single用のHTTP GETのURL
 * @param type $api_key ユーザに発行されているapi key
 * @param type $file_path TSV形式の質問、回答ペアデータファイル
 */
function feed_rmr_single_data($url, $api_key, $file_path = "rmr_single_post.txt") {
    $contents = file_get_contents($file_path);
    $lines = explode("\n", $contents);
    foreach ($lines as $line) {
        $split = explode("\t", $line);
        if (count($split) == 2) {
            $question = $split[0];
            $answer = $split[1];
            post_rmr_single($url, $api_key, $question, $answer);
        }
    }
}

/**
 * 指定したインプットファイルから、質問を読み込み
 * それによって、得られる回答候補を、マッチ率の高い順に
 * 網羅する関数です。
 * 
 * @param type $url rmr_single用のHTTP GETのURL
 * @param type $api_key ユーザに発行されているapi key
 * @param type $input_file_path 一行ごとに質問を記載したテキストファイル
 * @param type $output_file_path 質問と、解答候補一覧を示す結果ファイル
 */
function get_rmr_single_results($url, $api_key, $input_file_path = "./rmr_single_get.txt", $output_file_path = "./results.txt") {
    $contents = file_get_contents($input_file_path);
    $lines = explode("\n", $contents);
    $qa_count = 0;
    $a_count = 0;

    $answers = "";

    foreach ($lines as $line) {
        if ($line != "") {
            $qa_count++;
            $question = $line;
            $answers .= "質問" . $qa_count . ":" . $question . "\n";
            $answers .= "=== 回答候補 ===" . "\n";

            $results = get_rmr_single($url, $api_key, $question);

            if (count($results) > 0) {
                $order = 0;
                foreach ($results as $result) {
                    $order++;

                    $answers .= $order . " " . $result['answer'] . "\n";
                }
            } else {
                $answers .= "該当回答候補無し" . "\n";
            }

            $answers .= "\n";
        }
    }

    file_put_contents($output_file_path, $answers);
}

function post_rmr_single($url, $api_key, $question, $answer) {
    $data = array('api_key' => $api_key, 'question' => $question, 'answer' => $answer);
    $results = json_decode(http_post($url, $data), true);
    return $results;
}

function get_rmr_single($url, $api_key, $question) {
    $data = array('api_key' => $api_key, 'question' => $question);
    $results = json_decode(http_get($url, $data), true);
    return $results;
}

function http_get($url, $data) {
    $params = "";
    foreach ($data as $k => $v) {
        $params .= $k . '=' . urlencode($v) . '&';
    }
    $url = $url . "?" . $params;
    $url = rtrim($url, '&');

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
    ));
    $contents = curl_exec($ch);
    return $contents;
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

## Main method to call the tutorial script.
$options = getopt('m:a:i:o:');
if (array_key_exists('m', $options)) {
    $mode = $options['m'];
}

if (array_key_exists('a', $options)) {
    $api_key = $options['a'];
}

if (array_key_exists('i', $options)) {
    $input_file = $options['i'];
}

if (array_key_exists('o', $options)) {
    $output_file = $options['o'];
}

if (empty($mode)) {
    die("modeをgetまたは、postで指定して下さい。");
}

if (empty($api_key)) {
    die("api_keyを指定して下さい。");
}

$url = 'https://adg.alt.ai:443/api/rmr_single';

if ($mode == 'get') {
    if (empty($input_file)) {
        get_rmr_single_results($url, $api_key);
    } else {
        if (empty($output_file)) {
            get_rmr_single_results($url, $api_key, $input_file);
        } else {
            get_rmr_single_results($url, $api_key, $input_file, $output_file);
        }
    }
} elseif ($mode == 'post') {
    if (empty($input_file)) {
        feed_rmr_single_data($url, $api_key);
    } else {
        feed_rmr_single_data($url, $api_key, $input_file);
    }
} else {
    die("modeはgetまたは、postで指定して下さい");
}
