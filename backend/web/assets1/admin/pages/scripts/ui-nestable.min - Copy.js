var UINestable=function()
{var t=function(t){
        var e=t.length?t:$(t.target),a=e.data("output");
        window.JSON?a.val(window.JSON.stringify(e.nestable("serialize"))):a.val("JSON browser support required for this demo.")};
    return{init:function(){$("#nestable_list_1").nestable({group:1}).on("change",t),$("#nestable_list_2").nestable({group:1}).on("change",t),t($("#nestable_list_1").data("output",$("#nestable_list_1_output"))),t($("#nestable_list_2").data("output",$("#nestable_list_2_output"))),$("#nestable_list_menu").on("click",function(t){var e=$(t.target),a=e.data("action");"expand-all"===a&&$(".dd").nestable("expandAll"),"collapse-all"===a&&$(".dd").nestable("collapseAll")}),$("#nestable_list_3").nestable()}}}();
jQuery(document).ready(function(){UINestable.init()});