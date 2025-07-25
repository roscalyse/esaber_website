<?php 
include_once 'includes/header.php';
include_once 'includes/sidebar.php';

$settings=getSettingsById($conn, 1);
if(isset($_POST['submit'])){
    $id = $settings['id'];  
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $email = $_POST['email'];
    $original = $_POST['image_path'];
  $desc = $_POST['desc'];
  $upload_dir = "uploads/images";
  if(!file_exists($upload_dir)){
    mkdir($upload_dir,0777, true);
  }
  if(isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE){
    $url = share_file('image',$upload_dir);
  } else {
    $url = $original;
  }
  $results = updateSettings($conn, $id, $phone, $address, $email, $url, $desc);
  if($results){
 echo "<script>alert('Success')</script>";
  echo "<script>window.location.href='settings.php'</script>";
} else {
   echo "<script>alert('unsuccessfull')</script>";
  echo "<script>window.location.href='settings.php'</script>";

}
  }
 
?>


  <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header row" >
                    <h4>Edit Settings</h4>
                    <!-- <a href="hero.php" class="btn btn-sm btn-success">Edit Settings</a> -->
                  </div>
                  <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                      <div class="row">
                          <input type="text" name="id" value="<?=$settings['id']?>" hidden>
                          <div class="form-group col-lg-4">
                              <label>Contact</label>
                              <input type="text" value="<?=$settings['contact']?>" class="form-control" name="phone">
                          </div>
                           <div class="form-group col-lg-4">
                              <label>Address</label>
                              <input type="text" value="<?=$settings['address']?>" class="form-control" name="address">
                          </div>
                           <div class="form-group col-lg-4">
                              <label>Email</label>
                              <input type="email" value="<?=$settings['email']?>" class="form-control" name="email">
                          </div>
                           <div class="form-group col-lg-4">
                              <label>Logo</label><img src="<?=$settings['image']?>" width="35" alt="">
                              <input type="file" class="form-control" name="image">
                              <input type="text" name="image_path" value="<?=$settings['image']?>" hidden>
                          </div>
                          <div class="form-group col-lg-4">
                              <label>Short Company Description</label>
                              <textarea name="desc" class="form-control" id=""><?=$settings['description']?></textarea>
                              <!-- <input type="text" class="form-control" name="desc"> -->
                          </div>
                         
                          <div class="form-group col-lg-12">
                              <button class="btn btn-primary" name="submit">Submit</button>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php include_once 'includes/footer.php'; ?>
