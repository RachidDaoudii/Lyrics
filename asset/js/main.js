// getCategories
function getCategories() {
    $.post("./include/handlers/categoriesHandler.php",
    {
        getCategories:true,
    },function(data){
        data = JSON.parse(data);
        var tbody = document.querySelector("#tbody");
        // var $select = $('#category');
        // $select.html('');
        for (let i = 0; i < data.length; i++) {
            tbody.innerHTML+=`<tr id="${data[i]['id']}">
                <th scope="row">${i+1}</th>
                <td>${data[i]['name']}</td>
                <td>
                <button type="button" class="btn btn-warning btn-floating return" onclick="returnInfoCategory(${data[i]['id']},displayBtn())" data-mdb-toggle="modal" data-mdb-target="#myModal">
                <i class="fas fa-cog"></i>
                </button>
                </td>
            </tr>`;
            // $select.append('<option>' + data[i]['name'] + '</option>');
            // $('#category').append($('<option>', {
            //     value: data[i]['id'],
            //     text: data[i]['name']
            // }));
        }
    })
}

// saveCategory
function saveCategory() {
    $("#saveCategory").click(function(){
        var array = []
        var name = document.querySelectorAll("#category");
        name.forEach((element => array.push(element.value)))
        $.post("./include/handlers/categoriesHandler.php",
        {
            category:array
        })
    });
}

// getArtistes
function getArtistes() {
    $.post("./include/handlers/artistesHandler.php",
    {
        getArtistes:true,
    },function(data){
        data = JSON.parse(data);
        var Artistes = document.querySelector("#Artistes");
        // var 
        for (let i = 0; i < data.length; i++) {
            Artistes.innerHTML+=`
            <div class="col-xl-4 col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img
                                src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle"
                            />
                            <div class="ms-3" id="${data[i]['id']}">
                                <p class="fw-bold mb-1">${data[i]['name']}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-warning btn-floating" onclick="returnInfoArtist(${data[i]['id']},displayBtn())" data-mdb-toggle="modal" data-mdb-target="#myModal">
                                <i class="fas fa-cog"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>`;
        }
    })
}

//saveArtist
function saveAtrist() {
    $("#saveArtist").click(function(){
        var array = []
        var name = document.querySelectorAll("#Artist");
        name.forEach((element => array.push(element.value)))
        $.post("./include/handlers/artistesHandler.php",
        {
            artistes:array
        })
    });
}

//Add
var MultiArtist = document.querySelector("#MultiArtist");
MultiArtist.addEventListener('click',function () {
    const node = document.getElementById("demo");
    const clone = node.cloneNode(true);
    document.querySelector(".modal-body").appendChild(clone);
})

// Delete
var MultiDelete = document.querySelector("#MultiDelete");
MultiDelete.addEventListener('click',function () {
    const list = document.querySelector(".modal-body");
    list.removeChild(list.lastElementChild);
    const listSong = document.querySelector("#demo");
    listSong.removeChild(listSong.lastElementChild);
})


//return info Category
function returnInfoCategory(id){
    let name = document.getElementById(id).children[1].innerHTML
    document.querySelector('#category').value=name
    document.querySelector('#id_category').value=id
}

//retrun info Artist
function returnInfoArtist(id){
    let name = document.getElementById(id).children[0].innerHTML
    document.querySelector('#Artist').value=name
    document.querySelector('#id_artist').value=id
}


document.getElementById('modal').addEventListener('click',function(){
    document.getElementById("form").reset();
    document.querySelector('.save').style.display=''
    document.querySelector('.edit').style.display='none'
    document.querySelector('.delete').style.display='none'
})

function displayBtn(){
    document.querySelector('.save').style.display='none'
    document.querySelector('.edit').style.display=''
    document.querySelector('.delete').style.display=''
}
    
// delete Category
function deleteCatigories(){
    $("#deleteCategory").click(function(){
        var id = document.querySelector("#id_category").value;
        $.post("./include/handlers/categoriesHandler.php",
        {
            deleteCategory:id
        })
    });
}

 // edit Category
function editCatigories(){
    $("#editCategory").click(function(){
        var id = document.querySelector("#id_category").value;
        var name = document.querySelector("#category").value;
        $.post("./include/handlers/categoriesHandler.php",
        {
            id_category:id,
            name:name
        })
    });
}



// delete Artist
$("#deleteArtist").click(function(){
    var id = document.querySelector("#id_artist").value;
    $.post("./include/handlers/artistesHandler.php",
    {
        deleteArtistes:id
    })
});

 // edit Artist
$("#editArtist").click(function(){
    var id = document.querySelector("#id_artist").value;
    var name = document.querySelector("#Artist").value;
    $.post("./include/handlers/artistesHandler.php",
    {
        id_Artist:id,
        name:name
    })
});




 // edit Artist
$("#saveSong").click(function(){

    var demo = document.querySelectorAll("#demo").length;
    var Title = document.querySelectorAll("#Title");
    var Song = document.querySelectorAll("#Song");
    var Add_the = document.querySelectorAll("#Add_the");
    var Duration = document.querySelectorAll("#Duration");

    var DataTitle = []
    var DataSong = []
    var DataAdd_the = []
    var DataDuration = []

    Title.forEach((element => DataTitle.push(element.value)))
    Song.forEach((element => DataSong.push(element.value)))
    Add_the.forEach((element => DataAdd_the.push(element.value)))
    Duration.forEach((element => DataDuration.push(element.value)))

    $.post("./include/handlers/songHandler.php",
    {
        nbr:demo,
        DataTitle:DataTitle,
        Song:DataSong,
        DataAdd_the:DataAdd_the,
        DataDuration:DataDuration

    })
});



$.post("./include/handlers/songHandler.php",
    {
        getSongs:true,
    },function(data){
    data = JSON.parse(data);
    var Artistes = document.querySelector("#Songs");
    for (let i = 0; i < data.length; i++) {
        Artistes.innerHTML+=`
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img
                        src="asset/img/album.jpg"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                        <div class="ms-3">
                        <h4 class="fw-bold mb-1">${data[i]['title']}</h4>
                        <p class="fw-bold mb-1">${data[i]['artist']}</p>
                        <p class="text-muted mb-0 me-5" style="overflow: hidden;display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;" data="${data[i]['song']}">${data[i]['song']}</p>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <span class="badge rounded-pill badge-success mb-3">${data[i]['category']} <i class="fas fa-play"></i></span>
                        <span class="badge rounded-pill badge-success">${data[i]['duration']} <i class="far fa-clock"></i></span>
                    </div>
                    </div>
                </div>
                <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                    <button class="btn btn-link m-0 text-reset" onclick="displayBtn()" type="button" data-ripple-color="primary" 
                    data-mdb-toggle="modal" data-mdb-target="#myModal">Delete<i class="fas fa-trash ms-2"></i>
                    </button>
                    <button class="btn btn-link m-0 text-reset" onclick="displayBtn()" type="button" data-ripple-color="primary"
                    data-mdb-toggle="modal" data-mdb-target="#myModal">Edit<i class="far fa-edit ms-2"></i>
                    </button>
                </div>
            </div>
        </div>`;
    }
})



getCategories()
getArtistes()

saveCategory()
saveAtrist()

deleteCatigories()


editCatigories()



$('#myModal').click(function(){
    $.post("./include/handlers/categoriesHandler.php",{
        getCategories:true
    },function (data) {
        // console.log(data)
        var select = $('#category');
        for (let i = 0; i < data.length; i++) {
            select.append($('<option>', {
                value: data[i]['id'],
                text: data[i]['name']
        }));
            
        }
        
    }
    )
})