
$().ready(function () {
    $.ajax(
        {
            url : "http://localhost/datapemda",
            type : "GET",
            success : function (data){


            },
            error : function (data) {
                console.log('err')
            }
        }
    )
})