jQuery.cookie = function(name, value, options) {
                if(typeof value != "undefined") {
                    options = options || {};
                    if(value === null) {
                        value = '';
                        options.expires = -1;
                    }
                    var expires = '';
                    if(options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
                        var date;
                        if(typeof options.expires == 'number') {
                             date = new Date();
                            var totalTime = 24 * 3600;
                            var hour = date.getHours();
                            var minutes = date.getMinutes();
                            var seconds = date.getSeconds();
                            var pastTime = 3600 * hour + 60 * minutes + seconds;
                            var leftTime = totalTime - pastTime;
                            date.setTime(date.getTime() + (options.expires * leftTime * 1000));
                        } else {
                            date = options.expires;
                        }
                        expires = '; expires=' + date.toUTCString();
                    }
                    var path = options.path ? '; path=' + (options.path) : '';
                    var domain = options.domain ? '; domain=' + (options.domain) : '';
                    var secure = options.secure ? '; secure' : '';
                    document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
                } else {
                    var cookieValue = null;
                    if(document.cookie && document.cookie != '') {
                        var cookies = document.cookie.split(';');
                        for(var i = 0; i < cookies.length; i++) {
                            var cookie = jQuery.trim(cookies[i]);
                            if(cookie.substring(0, name.length + 1) == (name + '=')) {
                                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                                break;
                            }
                        }
                    }
                    return cookieValue;
                }
            };
            $(function() {
                var COOKIE_NAME = "tsxcc";
                if($.cookie(COOKIE_NAME)) { //有隐藏弹窗
                    $(".layer").hide();
                    $("#globalAd").hide();
                } else {   //没有的话就显示
                    var pttH = $(window).height();
                    var pttW = $(window).width();
                    $(".layer").show();
                    $("#globalAd").css({
                        'top': pttH / 2 - $("#globalAd").height() / 2,
                        'left': pttW / 2 - $("#globalAd").width() / 2
                    });
                    $("#globalAd").slideDown(300, function() {
                       // setTimeout("closeGloableAd()", '300000');
                    });
                    
                }
            });
 
            function closeGlobalAd() {

                var COOKIE_NAME = "tsxcc";
            	$.cookie(COOKIE_NAME, "tsxcc", {
                        path: '/',
                        expires: 1 //cookie保存时间
                    });
                $('#globalAd').hide();
                $('.layer').hide();
 
            }
 
            function redirectUrlToActive() {
                $('#globalAd').hide();
                $('.layer').hide();
            }