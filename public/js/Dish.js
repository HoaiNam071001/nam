function Addtocart(dishname){
    $.ajax({
        url:"index.php?controller=Menu&action=StoreDish",
        method: "POST",
        data:{
            "Iddish": dishname
        },
        success:function(data){
            $("span[name=dish-in-cart]").html(data);
        }
    });
    
}


