<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: Logout.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>添削支援システム</title>
    <link rel="stylesheet" href="css/jquery-ui-1.8.16.custom.css" />
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
    <script src="js/jquery.1.6.4.min.js"></script>
    <script src="js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="./dist/fabric.js"></script>
    <script type="text/javascript" src="./dist/fabric.min.js"></script>
</head>

<body>
    <!--タイトルとファイル選択-->
    <div class="title">
        <div class="title_container">
            <div style="width:500px; float: left;">
                <h1 id="title" style="display:inline;">添削支援システム</h1>
            </div>
            <div style="float: right;">
                <!--ローカル画像ファイルの選択-->
                <form>
                    <input type="file" id="file" value="selectImage" accept="image/*">
                </form>
            </div>
        </div>
    </div>
    <div style="clear:left;"></div>

    <p>ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さん</p>

    <ul>
        <li><a href="Logout.php">ログアウト</a></li>
    </ul>

    <!--ボタンエリア-->
    <div class="button_container" style="float: left;">
        <input id="select" type="image" src="img/select.png" class="btn-box select" title="選択">
        <input id="draw" type="image" src="img/draw.png" class="btn-box aaa" title="フリーハンド">

        <input id="textbox" type="image" src="img/textbox.png" class="btn_box margin" title="テキストボックス">
        <input id="circle" type="image" src="img/circle.png" class="btn_box aaa" title="円">
        <input id="line" type="image" src="img/line.png" class="btn_box aaa" title="直線">

        <input id="draw_save" type="image" src="img/draw_save.png" class="btn_box margin" title="保存履歴に表示">
        <input id="canvas_save" type="image" src="img/canvas_save.png" class="btn_box aaa" title="キャンバスの保存">

        <input id="draw_dlt" type="image" src="img/draw_dlt.png" class="btn_box margin" title="削除">
        <input id="history_dlt" type="image" src="img/history_dlt.png" class="btn_box aaa" title="保存履歴の削除">
        <input id="canvas_dlt" type="image" src="img/canvas_dlt.png" class="btn_box aaa" title="キャンバスクリア">

        <li class="setColor btn_box red margin" style="background-color:#ed514e;"></li>
        <li class="setColor btn_box aaa" style="background-color:#0066CC;"></li>
        <li class="setColor btn_box_black aaa" style="background-color:black;"></li>
        <a id="download_link"></a>
    </div>

    <!--描画キャンパス-->
    <div style="float:left;">
        <canvas id="canvas" width="800" height="600"></canvas>
    </div>

    <!--保存履歴-->
    <div class="history_container" style="float: left;">
        <p id="title_tmpList">保存履歴</p>
        <div class="hr"></div>

        <div id="my_tmp" style="width: 190px; float: left;">
            <p class="subtitle_tmpList">自分の保存履歴</p>
            <div class="hr2"></div>
            <div data-simplebar id="my_viewpanel">
                <div id="my_tmpList">
                </div>
            </div>
        </div>

        <div style="width: 137px; float: right;">
            <p class="subtitle_tmpList">他教員の保存履歴</p>
            <div class="hr2"></div>
            <div data-simplebar id="other_viewpanel">
                <div id="other_tmpList">
                </div>
            </div>
        </div>
    </div>
    <div style="clear:left;"></div>

    <script src="./script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>
</body>

</html>
