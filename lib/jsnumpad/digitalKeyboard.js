(function($) {
    $.fn.numKey = function(options) {
        var defaults = {
            limit: 100,
            disorder: false
        }
        var options = $.extend({}, defaults, options);
        var input = $(this);
        var nums = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        var txtName;
        /*
         if(options.disorder) {
         nums.sort(function() {
         return 0.5 - Math.random();
         });
         }
         */

        var html = '<div class="fuzy-numKey">' +
                '<label  id="gay" style="z-index:50000; color:#000000; height:80px;">fgfgfgfggfgfgf</label>' +
                '<div class="fuzy-numKey-active">﹀</div>' +
                '<table cellspacing="0" cellpadding="0">' +
                '<tr>' +
                '<td class="fuzy-numKey-lightgray fuzy-numKey-active" style="border-left:none;">' + nums[1] + '</td>' +
                '<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[2] + '</td>' +
                '<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[3] + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td class="fuzy-numKey-lightgray fuzy-numKey-active" style="border-left:none;">' + nums[4] + '</td>' +
                '<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[5] + '</td>' +
                '<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[6] + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td class="fuzy-numKey-lightgray fuzy-numKey-active" style="border-left:none;">' + nums[7] + '</td>' +
                '<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[8] + '</td>' +
                '<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[9] + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td class="fuzy-numKey-darkgray fuzy-numKey-active">Clear</td>' +
                '<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[0] + '</td>' +
                '<td class="fuzy-numKey-darkgray fuzy-numKey-active">&larr;</td>' +
                '</tr>' +
                '</table>' +
                '</div>';
        input.on("click", function() {
            alert(input.val());
            var number = input.val();
            setNumber(number);
            $(this).attr('readonly', 'readonly');
            $(".fuzy-numKey").remove();
            $('body').append(html);
            $(".fuzy-numKey").slideDown(100);
            $(".fuzy-numKey table tr td").on("click", function() {
                if (isNaN($(this).text())) {
                    if ($(this).text() == 'Clear') {
                        input.val(1);
                    } else {
                        input.val(input.val().substring(0, input.val().length - 1));
                        if (input.val().length < 1) {
                            input.val(1);
                        }
                    }
                } else {
                    input.val(input.val() + $(this).text());
                    if (input.val().length >= options.limit) {
                        input.val(input.val().substring(0, options.limit));
                        remove();
                    }

                    if (parseInt(input.val()) > parseInt(options.limit)) {
                        alert("สินค้ามีไม่พอกับจำนวนที่ท่านต้องการ " + "คงเหลือ " + options.limit + "ชิ้น");
                        input.val(1);
                        return false;
                    }
                }
            });
            $(".fuzy-numKey div").on("click", function() {
                //alert(input.val() + " " + options.limit);
                //input.val(1)
                if (input.val().length < 1) {
                    input.val(1);
                }
                remove();
            });
        });

        function remove() {
            $(".fuzy-numKey").slideUp(100, function() {
                $(".fuzy-numKey").remove();
            });
            input.removeAttr('readonly');
        }
    }
})(jQuery)


function setNumber(number) {
    //$("#gay").html("number");
    $("#gay").append("<p>123456</p>");
}