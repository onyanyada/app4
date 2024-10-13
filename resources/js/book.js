$(".write-btn").click(function () {
    $(".left-area").show();
});

$(".write-close").click(function () {
    $(".left-area").css('display', 'none');
});

// 各 book-item をクリックしたときに、その詳細を表示
$(".book-open").click(function () {

    // クリックされた book-item 内の詳細を表示する
    $(this).siblings(".book-detail").show();
    $(this).siblings(".book-close").show();
    $(this).hide();
});

// 閉じるボタンをクリックしたら詳細を非表示
$(document).on("click", ".book-close", function (e) {
    $(this).siblings(".book-detail").hide();
    $(this).siblings(".book-open").show();  // 開くボタンを表示
    $(this).hide();
});