
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
                <div id="${data[i].id}" class="d-flex justify-content-between align-items-center ">
                    <div class="d-flex align-items-center">
                        <img
                        src="asset/img/album.jpg"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                        <div class="ms-3">
                        <h4 class="fw-bold mb-1">${data[i]['title']}</h4>
                        <p class="fw-bold mb-1" data="${data[i]['id_artist']}">${data[i]['artist']}</p>
                        <p class="text-muted mb-0 me-5" style="overflow: hidden;display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">${data[i]['song']}</p>
                        </div>
                    </div>
                    <div class="d-flex flex-column ">
                        <span class="badge rounded-pill badge-success mb-3" data="${data[i]['id_category']}">${data[i]['category']} <i class="fas fa-play"></i></span>
                        <span class="badge rounded-pill badge-success" data="${data[i]['date']}">${data[i]['date']} <i class="far fa-clock"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>`;
}
})


$("#Search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#Songs div").filter(function() {
        $(this).toggle($(this).find('h4').text().toLowerCase().indexOf(value) > -1 || $(this).find('p').text().toLowerCase().indexOf(value) > -1)
    });
});

// // getCategories
function getCategories() {
    $.post("../handlers/categoriesHandler.php",
    {
        getCategories:true,
    },function(data){
        data = JSON.parse(data);
        var tbody = document.querySelector("#tbody");
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
        }
    })
}

// saveCategory
function saveCategory() {
    $("#saveCategory").click(function(){
        var array = []
        var name = document.querySelectorAll("#category");
        name.forEach((element => array.push(element.value)))
        $.post("../handlers/categoriesHandler.php",
        {
            category:array
        })
    });
}

// getArtistes
function getArtistes() {
    $.post("../handlers/artistesHandler.php",
    {
        getArtistes:true,
    },function(data){
        data = JSON.parse(data);
        var Artistes = document.querySelector("#Artistes");
        // var 
        for (let i = 0; i < data.length; i++) {
            Artistes.innerHTML +=`
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
        $.post("../handlers/artistesHandler.php",
        {
            artistes:array
        })
    });
}

//Add
var el=0
var MultiArtist = document.querySelector("#MultiArtist");
MultiArtist.addEventListener('click',function () {
    el++
    const node = document.getElementById("demo");
    const clone = node.cloneNode(true);
    const form = document.createElement('h2').innerText = "Element"+el
    document.querySelector("#demo").appendChild(form);
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

function returnInfoSong(id) {
    let title = document.getElementById(id).children[0].children[1].children[0].innerHTML
    let Artist = document.getElementById(id).children[0].children[1].children[1].getAttribute("data")
    let Song = document.getElementById(id).children[0].children[1].children[2].innerHTML
    let date = document.getElementById(id).children[1].children[1].getAttribute("data")
    let category = document.getElementById(id).children[1].children[0].getAttribute("data")
    document.querySelector('#Title').value=title
    document.querySelector('#name_Artist').value=Artist
    document.querySelector('#Song').value=Song
    document.querySelector('#Add_the').value=date
    document.querySelector('#category').value=category
    document.querySelector('#id').value=id
}


document.getElementById('modal').addEventListener('click',function(){
    document.getElementById("form").reset();
    document.querySelector('.save').style.display=''
    document.querySelector('.edit').style.display='none'
    document.querySelector('.delete').style.display='none'
    document.querySelector('#MultiArtist').style.display=''
    document.querySelector('#MultiDelete').style.display=''
})

function displayBtn(){
    document.querySelector('.save').style.display='none'
    document.querySelector('.edit').style.display=''
    document.querySelector('.delete').style.display=''
    document.querySelector('#MultiArtist').style.display='none'
    document.querySelector('#MultiDelete').style.display='none'
}
    
// delete Category
function deleteCatigories(){
    $("#deleteCategory").click(function(){
        var id = document.querySelector("#id_category").value;
        $.post("../handlers/categoriesHandler.php",
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
        $.post("../handlers/categoriesHandler.php",
        {
            id_category:id,
            name:name
        })
    });
}



// delete Artist
$("#deleteArtist").click(function(){
    var id = document.querySelector("#id_artist").value;
    $.post("../handlers/artistesHandler.php",
    {
        deleteArtistes:id
    })
});

 // edit Artist
$("#editArtist").click(function(){
    var id = document.querySelector("#id_artist").value;
    var name = document.querySelector("#Artist").value;
    $.post("../handlers/artistesHandler.php",
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
    var Artistes = document.querySelectorAll("#name_Artist");
    var category = document.querySelectorAll("#category");

    var DataTitle = []
    var DataSong = []
    var DataAdd_the = []
    var DataDuration = []
    var DataArtistes = []
    var Datacategory = []


    Title.forEach((element => DataTitle.push(element.value)))
    Song.forEach((element => DataSong.push(element.value)))
    Add_the.forEach((element => DataAdd_the.push(element.value)))
    Artistes.forEach((element => DataArtistes.push(element.value)))
    category.forEach((element => Datacategory.push(element.value)))

    $.post("../handlers/songHandler.php",
    {
        nbr:demo,
        DataTitle:DataTitle,
        Song:DataSong,
        DataAdd_the:DataAdd_the,
        DataArtistes:DataArtistes,
        Datacategory:Datacategory

    })
});



$.post("../handlers/songHandler.php",
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
                    <div id="${data[i].id}" class="d-flex justify-content-between align-items-center media">
                        <div class="d-flex align-items-center">
                            <img
                            src="../../asset/img/album.jpg"
                            alt=""
                            style="width: 45px; height: 45px"
                            class="rounded-circle"
                            />
                            <div class="ms-3">
                            <h4 class="fw-bold mb-1">${data[i]['title']}</h4>
                            <p class="fw-bold mb-1" data="${data[i]['id_artist']}">${data[i]['artist']}</p>
                            <p class="text-muted mb-0 me-5" style="overflow: hidden;display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">${data[i]['song']}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column column">
                            <span class="badge rounded-pill badge-success mb-3" data="${data[i]['id_category']}">${data[i]['category']} <i class="fas fa-play"></i></span>
                            <span class="badge rounded-pill badge-success" data="${data[i]['date']}">${data[i]['date']} <i class="far fa-clock"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-0 bg-light p-2 d-flex justify-content-center">
                    <button class="btn btn-link m-0 text-reset" onclick="returnInfoSong(${data[i]['id']}),displayBtn()" type="button" data-ripple-color="primary"
                    data-mdb-toggle="modal" data-mdb-target="#myModal">Edit<i class="far fa-edit ms-2"></i>
                    </button>
                </div>
            </div>
        </div>`;
    }
})

// delete Song
$("#deleteSong").click(function(){
    var id = document.querySelector("#id").value;
    $.post("../handlers/songHandler.php",
    {
        deleteSong:id
    })
});

getCategories()
getArtistes()

saveCategory()
saveAtrist()

deleteCatigories()


editCatigories()



// edit Song
$("#editSong").click(function(){
    var id = document.querySelector("#id").value;
    var title = document.querySelector("#Title").value;
    var song = document.querySelector("#Song").value;
    var date = document.querySelector("#Add_the").value;
    var artist = document.querySelector("#name_Artist").value;
    var category = document.querySelector("#category").value;

    console.log(id);
    console.log(title);
    console.log(song);
    console.log(date);
    console.log(artist);
    console.log(category);
    $.post("../handlers/songHandler.php",
    {
        editSong:id,
        title:title,
        song:song,
        date:date,
        artist:artist,
        category:category
    })
});





