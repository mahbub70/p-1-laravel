$(window).on("resize",function(n){i()});$(document).ready(function(){i(),$(".basic-select2").select2()});function i(){let n=$(".header-mini"),e=0;$.each($("header.header"),function(o,a){e+=$(a).outerHeight()}),$(window).width()>=768?$(".header-nav").next().css("padding-top",`${e}px`):e=n.outerHeight();let t=$(".header-mini").outerHeight();$(".header-nav").css("top",`${t}px`),$(".header-nav").next().css("padding-top",`${e}px`)}$(document).on("click",".mobile-menu-btn",function(){$(".header-nav").toggleClass("active");let n=0;$(".header-nav").hasClass("active")?n=0:n=400,setTimeout(()=>{$(".header-nav").toggleClass(["invisible opacity-0"])},n)});let s=$(".password-eye-btn");$.each(s,function(n,e){$(e).siblings("input").length>0&&$(e).on("click",function(){let t=$(e).find("i");$(e).siblings("input").attr("type")=="password"?($(e).siblings("input").attr("type","text"),$(t).removeClass("fa fa-eye-slash").addClass("fa fa-eye")):($(e).siblings("input").attr("type","password"),$(t).removeClass("fa fa-eye").addClass("fa fa-eye-slash"))})});window.getDistrictsOnDivision=function(n,e){if(e==null||e=="")return!1;$.post(n,{division:e},function(t){}).done(function(t){console.log(t)}).fail(function(t){})};
