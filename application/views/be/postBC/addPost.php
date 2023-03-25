<link href="https://cdn.quilljs.com/1.2.2/quill.snow.css" rel="stylesheet">
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Blog Posts</span>
      <h3 class="page-title">Add New Post</h3>
    </div>
  </div>
  <!-- End Page Header -->
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <!-- Add New Post Form -->
      <div class="card card-small mb-3">
        <div class="card-body">
          <form class="add-new-post" action="<?=base_url('dashboard/addPost_action'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
							<label for="title">Title</label>
							<input class="form-control" type="text" name="title" placeholder="Product name" />
						</div>
            <div class="form-group">
							<label for="image">Image</label>
							<input name="image" class="form-control" type="file" placeholder="Your Post Image">
						</div>
            <div class="form-group">
              <label for="description">Description</label>
              <div id="editor"></div>
              <textarea name="description" id="justHtml" hidden="hidden"></textarea>              
            </div>
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
              <div class='card-body p-0'>
                <ul class="list-group list-group-flush">            
                  <li class="list-group-item d-flex px-3">
                    <a href="<?=base_url('dashboard/listPost')?>" class="btn btn-sm btn-outline-accent">
                    <i class="material-icons">save</i> Back</a>
                    <button type="submit" name="submit" value="draft" class="btn btn-sm btn-outline-accent">
                    <i class="material-icons">save</i> Save Draft</button>
                    <button type="submit" name="submit" value="publish" class="btn btn-sm btn-accent ml-auto">
                    <i class="material-icons">file_copy</i> Publish</button>
                  </li>
                </ul>
              </div>
            </div>
            <!-- / Post Overview -->
          </form>
        </div>
      </div>
      <!-- / Add New Post Form -->    
  </div>
</div>
<script src="https://cdn.quilljs.com/1.2.2/quill.min.js"></script>
<script src="<?=base_url('style/css/be/')?>scripts/image-resize.min.js"></script>
<script src="<?=base_url('style/css/be/')?>scripts/script.js"></script>
<script>
  var justHtmlContent = document.getElementById('justHtml');
  quill.on('text-change', function() {
    var justHtml = quill.root.innerHTML;
    justHtmlContent.innerHTML = justHtml;
  });
</script>