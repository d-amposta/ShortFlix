<header>
  <nav class="navbar navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php" class="navbar-brand">ShortFlix</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">
      <li>
      <a href="videos.php">See All Videos</a>
      </li>
      <li class="dropdown mobile_options">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php
  
                require('connection.php');

                $sql = "SELECT *
                    FROM videos
                    GROUP BY category";

                $result = mysqli_query($conn,$sql);

                if(mysqli_num_rows($result)>0){

                  while($row=mysqli_fetch_assoc($result)){
                    extract($row);

                    echo '<li>
                    <a href="search.php?query='.$row['category'].'">'.$row['category'].'</a></li>';
                    }
                  }
                      
                
              ?>
          </ul>
        </li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if(!empty($_SESSION['username'])){
            echo '<li class="desktop_options">
                    <a href="add-video.php"><span class="glyphicon glyphicon-plus"></span></a>
                  </li>
                  <li class="desktop_options">
                    <a href="profile.php?id='.$_SESSION['id'].'">'.$_SESSION['firstname'].'</a>
                  </li>
                  <li class="desktop_options">
                    <a href="logout.php">Log Out</a>
                  </li>
                  <li class="dropdown mobile_options">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'. $_SESSION['firstname'] .'<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                          <a href="add-video.php"><span class="glyphicon glyphicon-plus"></span> Add Video</a>
                        </li>
                        <li>
                          <a href="profile.php?id='.$_SESSION['id'].'">Change Password</a>
                        </li>
                        <li>
                          <a href="logout.php">Log Out</a>
                        </li>
                    </ul>
                  </li>';
          }else {
            echo '<li class="login_popup">
                    <p class="login navbar-text">Log In</p>
                  </li>';
          }
        ?>
      </ul>
      <form class="navbar-form navbar-right" method="GET" action="search.php">
          <div class="input-group">
            <input type="text" name="query" placeholder="Search..." class="form-control">
            <span class="input-group-btn">
              <input type="submit" class="btn btn-default" id="search-button"><span class="glyphicon glyphicon-search"></span>
            </span>
          </div>
        </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>

<div id="login-container">
      <form method="POST" action"<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div class="form-group">
          <label for="username">Username/Email</label>
          <input type="text" name="username" class="form-control"></input>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control"></input>
        </div>
        <input type="submit" name="login" value="Log In" class="btn btn-success"></input> 
      </form>
</div>
