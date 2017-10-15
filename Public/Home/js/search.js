/**
 * Created by Administrator on 16-1-31.
 */
$(function(){
    $("#do").on("click",function(){
        var word = $("#word").val();
        window.location.href = "/index.php?s=/Home/article/search/"+word;
    });
})