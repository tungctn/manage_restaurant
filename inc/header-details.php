<?php

global $list_res, $conn;
// session_start();
// for ($i=0; $i <$list_res ; $i++) { 
//     # code...

// }
$id = (int) $_GET['id'];
$sql = "SELECT * from `info` where `id` = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// print_r($row);
// echo $id;


?>

<!doctype html>
<html lang="en">

<head>
    <title>Restaurant</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
    <link rel="stylesheet" href="public/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        #backtop {
            background-color: orange;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            /* text-align: center; */
            align-items: center;
            justify-content: center;
            position: fixed;
            right: 20px;
            bottom: 40px;
        }
    </style>
    <!-- Navigation -->
    <nav class="py-2 bg-light border-bottom navbar-fixed-top">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item">
                    <a href="#" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                        <img src="public/image/res.png" alt="mdo" width="32" height="32">
                        <span class="fs-4">Restaurant</span></a>
                </li>
                <li class="nav-item"><a href="?page=home" class="nav-link link-dark px-2 active" aria-current="page">Trang
                        chủ</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Blog</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">About us</a></li>
                <li class="nav-item"><a href="?page=add" class="nav-link link-dark px-2">Add</a></li>
            </ul>
            <!-- Search -->
            <form class="d-flex">
                <input type="search" class="form-control" style="margin-right: 30px;" placeholder="Tìm kiếm" aria-label="Search">
            </form>
            <!-- End search -->
            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span><?php echo $_SESSION['user_login']; ?></span>
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                    <li><a class="dropdown-item" href="#">Thanh toán</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="?page=logout">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End navigation -->
    <!-- <div class='alert alert-danger alert-dismissible fade show position-fixed w-100' role='alert' id='failed'>
        <strong>Thanh cong</strong> Ban da cap nhat thanh cong!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div> -->
    <header class="mt-3">
        <div class="container">
            <div class="row border-bottom" style="padding-bottom: 20px;">
                <div class="col-md-4">
                    <img src="<?php echo $row['img']; ?>" class="img-fluid" style="width: 100%; height: 350px" alt="">
                </div>
                <div class="col-md-8">
                    <h2><?php echo $row['name']; ?></h2>
                    <nav>
                        <p><i class="fa-solid fa-location-dot"></i> <span><?php echo $row['local']; ?></span></p>
                        <p><i class="fa-solid fa-envelope"></i> <span><?php echo $row['email']; ?></span></p>
                        <p><i class="fa-solid fa-phone"></i> <span><?php echo $row['phone']; ?></span></p>
                    </nav>

                    <article>
                        <?php echo $row['detail'] ?>
                    </article>


                    <a href="?page=home" class="btn btn-primary mt-5">Quay lai trang chu</a>
                    <a href="<?php echo "?page=update&id={$id}"; ?>" class="btn btn-warning mt-5">Sua thong tin</a>
                    <form class="d-inline-block" action="" method="post">
                        <input class="btn btn-danger mt-5" type="submit" name="btn_delete" value="Xoa nha hang">
                    </form>
                    <?php if(isset($_POST['btn_delete'])) {
                        if($_SESSION['user_login'] == $row['user_add']) {
                            redict_to("?page=delete&id={$id}");
                        } else {
                            echo "<div style='top: 0;' class='alert alert-danger alert-dismissible fade show position-fixed' role='alert' id='failed'>
                            <strong>That bai</strong> Ban khong duoc chinh sua bai cua nguoi khac!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                        }
                    } 
                    ?>
                    
                </div>

            </div>
            <p class="" style="float: right; font-weight: bold; ">Nguoi them: <?php echo $row['user_add'];  ?></p>

        </div>
    </header>
    <!-- We will put our React component inside this div. -->
    
