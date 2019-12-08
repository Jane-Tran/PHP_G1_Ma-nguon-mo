<?php
include("top-blog.php");
include("models/post.php");
$listp = Post::GetListPostFromDB();
?>

<body>
    <header class="container">
        <nav class="navbar navbar-expand-lg fixed-top">
            <a class="navbar-brand" href="index.php">
                <div class="row">
                    <div class="col-xs-3"><img class="logo" src="img/duckling.png" alt="logo" width="40px" /></div>
                    <div class="col-xs-9">Code - Life</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fas fa-house-damage"></i> Home </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file-alt"></i> Pages
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Page 1</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Page 2</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-list-alt"></i> Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Category 1</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Category 2</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="login-blog.php"><i class="fab fa-connectdevelop"></i>Login</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>
    <div class="jumbotron">
        <div class="container">
            <div id="detail" class="animated fadeInLeft">
                <h1>Coder - Life<span> Blog</span></h1>
                <p> Stay hungry, stay foolish.</p>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 ">
                    <!-- <div class="col-md-2 post-date">
                                <div class="day">30</div>
                                <div class="month">12</div>
                                <div class="year">2019</div>
                            </div>
                            <div class="col-md-8 post-title">
                                <a href="#">
                                    <h2>Đây là tiêu đề .........................</h2>
                                </a>
                                <p>Written by : <span>Huy Tran</span></p>
                            </div>
                            <div class="col-md-2 profile-picture">
                                <img src="" alt="Profile Picture">
                            </div> -->
                    <?php
                    if($listp!=null){
                        foreach ($listp as $value) {
                        ?>
                        <div class="card promoting-card narrower   ">
                            <img class="card-img-top" src="./upload/<?php echo $value->image ?>" alt="Card image cap">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $value->title ?></h2>
                                <p class="card-text"><?php echo $value->content ?></p>
                                <a href="#" class="btn btn-primary">Read More →</a>
                            </div>
                            <div class="card-footer ">
                                Posted on January 1, 2020 by
                                <a href="#">Huy</a>
                            </div>
                        </div>
                        <hr>
                    <?php } }?>

                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="widgets">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">Go!</button>
                            </span>
                        </div> <!-- End Input group-->
                    </div> <!-- End widgets-->

                    <div class="widgets">
                        <div class="popular">
                            <h4>Popular Post</h4>
                            <hr>
                           <?php if($listp!=null){
                                foreach ($listp as $value) {
                                ?>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <img src="./upload/<?php echo $value->image ?>" alt="popular1">
                                    </div>
                                    <div class="col-md-8  detail">
                                        <a href="#">
                                            <h4><?php echo $value->title ?></h4>
                                        </a>
                                        <p><i class="far fa-clock"></i> 10 May, 2020</p>
                                    </div>
                                </div>
                                <hr>
                            <?php } }?>

                        </div>

                        <div class="category">
                            <h4>Category</h4>
                            <hr>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <a href="#">Web Design</a>
                                            </li>
                                            <li>
                                                <a href="#">HTML</a>
                                            </li>
                                            <li>
                                                <a href="#">Freebies</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <a href="#">JavaScript</a>
                                            </li>
                                            <li>
                                                <a href="#">CSS</a>
                                            </li>
                                            <li>
                                                <a href="#">Tutorials</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End widgets-->

                </div>
            </div>
        </div>
    </section>
    <?php include("footer-blog.php") ?>