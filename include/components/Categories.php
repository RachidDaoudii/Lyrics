<div class="d-flex justify-content-between pb-3">
    <h3>Categories</h3>
    <div class="d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" id="modal" class="btn btn-primary btn-floating btn-lg" data-mdb-toggle="modal" data-mdb-target="#myModal">
        <i class="fas fa-plus-circle"></i>
        </button>
    </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="tbody">
    
  </tbody>
</table>

 <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Categories</h5>
         <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
       </div>
        <form action="" method="post" id="form" class="row g-3 needs-validation" novalidate>
            <div class="modal-body">
                <input type="hidden" name="id_category" id="id_category" value="">
                <div class="form-outline mb-4" id="demo">
                    <input type="text" class="form-control" id="category" required />
                    <label for="category" class="form-label">name Category</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please choose a Category.</div>
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
                <button type="submit" id="saveCategory" class="btn btn-primary save"data-mdb-dismiss="modal" >Save</button>
                <button type="submit" id="editCategory" class="btn btn-warning edit" data-mdb-dismiss="modal" >Edit</button>
                
            </div>
        </form>
        <button type="submit" id="deleteCategory" class="btn btn-danger delete" data-mdb-dismiss="modal" >Delete</button>
     </div>
    </div>
</div>
