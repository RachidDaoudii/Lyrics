

<div class="d-flex justify-content-between pb-3">
    <h3>Songs</h3>
    <div class="d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" id="modal" class="btn btn-primary btn-floating btn-lg" data-mdb-toggle="modal" data-mdb-target="#myModal">
        <i class="fas fa-plus-circle"></i>
        </button>
    </div>
</div>
<div class="row" id="Songs">

</div>



 <!-- Modal -->
 <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Songs</h5>
         <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
       </div>
        <form action="" method="POST" id="form"  class="row g-3 needs-validation" novalidate>
                <div class="modal-body">
                    <div id="demo">
                        <div class="form-outline mb-3">
                        <input type="text" class="form-control" name="Title" id="Title" required />
                        <label for="Title" class="form-label">Title</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a title.</div>
                        </div>
                        <div class="form-outline mb-3">
                            <textarea name="" id="Song" class="form-control" cols="5" rows="5" required>

                            </textarea>
                            <!-- <input type="text"  id=""  /> -->
                            <label for="Song" class="form-label">Song</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please choose a song.</div>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="date" class="form-control" id="Add_the" required />
                            <label for="Add_the" class="form-label">Add the</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please choose a Add the.</div>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="number" class="form-control" id="Duration" required />
                            <label for="Duration" class="form-label">Duration</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please choose a duration.</div>
                        </div>
                        <div class="form-outline mb-3">
                            <select  name="name_Artist" id="name_Artist" class="form-select" aria-label="Filter select" required>
                                <option selected>Artistes</option>
                                <?php foreach($artistes as $Artist){
                                    echo '<option value='.$Artist['id'].'>'.$Artist['name'].'</option>';
                                }?>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please choose a Name Artist.</div>
                        </div>
                        <div class="form-outline mb-3">
                            <select  name="category" id="category" class="form-select" aria-label="Filter select" required>
                            <option selected>Categories</option>
                                <?php foreach($options as $option){
                                    echo '<option value='.$option['id'].'>'.$option['name'].'</option>';
                                }?>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please choose a Name Categories.</div>
                        </div>
                    </div>
                </div>
            <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-floating btn-lg me-3" id="MultiArtist">
                  <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn btn-danger btn-floating btn-lg me-3" id="MultiDelete">
                  <i class="fas fa-minus"></i>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" name="saveSong" id="saveSong" class="btn btn-primary save" >Save</button>
                <button type="submit" id="editSong" class="btn btn-warning edit" data-mdb-dismiss="modal" >Edit</button>
                <button type="submit" id="deleteSong" class="btn btn-danger delete" data-mdb-dismiss="modal" >Delete</button>
            </div>
        </form>
     </div>
    </div>
</div>