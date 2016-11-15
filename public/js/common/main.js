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
	};
	//onload
	$(function() {
		config();

		$('#gMenubar').click(function() {
    		$('#spMenu').fadeToggle();
		});

		$(window).load(function() {
			$("#loading").fadeOut();
		});

        $(function(){
            $('.form-bottom').click(function(){
                var form = $(this).parent();
                $(form).submit();
            });
        })

		$.ajax({
			type: 'GET',
			url: '/app/countCartContents',
			dataType: 'json',
			success: function (date) {
				if (date.count) {
					$('#cartCount').text(date.count).css('display','inline-block');
				}
			}
		});
	});
})(jQuery);
