/**
 * @name main.js
 * @fileOverview
 * @version 1.0
 * @description
 * <p>(c) FOURDIGIT Inc. Licensed <a href="http://ja.wikipedia.org/wiki/GNU_General_Public_License">GNU General Public License</a>.</p>
 */
//他ライブラリと共存する場合、下の一行削除($無効化)
//jQuery.noConflict();
(function($){
	var config = function () {
	//easyOverのターゲット設定
		$("img.ahover, .ahoverArea img").easyOver();
	//Flash
		//$("object, embed").enableFlash();
	//ポップアップリンクに置換
		$(".commonPop").easyPop();
	//他ドメインリンク時にpageTracker有効化
		//$("a,area").blankLogToGoogle();
	//アンカーリンクをスムージング
		$("a[href^=#]").smoothScroll();
	//対象の要素をスクロールに追従するようにする
		//$("#fixBox").fixPosition("stopperID","normal");
	}
	//onload
	$(function() {
		config();
		switch (jQuery("body").attr("id")) {
			case "pageID":
				//eachPageFunction
			break;
			case "pageID":
				//eachPageFunction
			break;
		}

		// ページトップボタン表示処理
		var $pagetop = $('#pagetop');
		// ページトップボタンを非表示にする
		$pagetop.hide();
		$(window).on('scroll', function() {
			// スクロールしたらボタン表示
			if ($(this).scrollTop() > 100) {
				$pagetop.fadeIn();
			} else {
				$pagetop.fadeOut();
			}
		});

		// ヘッダー追従
		var $header = $('#gHeader'),
		    headerHeight = -1,
		    timer = false;
		$(window).on('load scroll', function() {
			if ($(this).scrollTop() > headerHeight) {
				$header.stop().addClass('is-fixed').animate({'top': 0});
			} else if ($(this).scrollTop() <= 0) {
				$header.stop().removeClass('is-fixed').removeAttr('style');
			}
		});

		$('#gMenubar').click(function() {
    		$('#spMenu').fadeToggle();
		});

		$(window).load(function() {
			$("#loading").fadeOut();
		});
	});
})(jQuery);
