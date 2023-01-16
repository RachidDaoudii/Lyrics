$(document).ready(function(){
    $("#saveCategory").click(function(){
        var name = $("#category").val();
        $.post("./include/handlers/categoriesHandler.php",
        {
            category:name,
        },function(data){
        })
    });

    $.post("./include/handlers/categoriesHandler.php",
    {
        getCategories:true,
    },function(data){
        data = JSON.parse(data);
        let tbody = document.querySelector("#tbody");
        for (let i = 0; i < data.length; i++) {
            tbody.innerHTML+=`<tr>
                <th scope="row">${i+1}</th>
                <td>${data[i]['name']}</td>
                <td>
                <button type="button" class="btn btn-warning btn-floating" data-mdb-toggle="modal" data-mdb-target="#myModal">
                <i class="fas fa-cog"></i>
                </button>
                </td>
            </tr>`;
        }
    })
});