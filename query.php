<?php
    session_start();

// ADD CATEGORY WORK FOR ADMIN(omama)
include('connection.php');
if(isset($_POST['add_cat'])){
    $category_name = $_POST['up_name'];
    $category_description = $_POST['up_description'];
    $file_name = $_FILES['up_file']['name'];
    $file_tmp_name = $_FILES['up_file']['tmp_name'];
    $file_size = $_FILES['up_file']['size'];
    $extension = pathinfo($file_name,PATHINFO_EXTENSION);
    $destination = "images/".$file_name;
    if($extension == "jpg" || $extension == "jpeg" || $extension == "png" ){
        if(move_uploaded_file($file_tmp_name , $destination)){
            $query = $pdo->prepare("insert into category (name, image, 	description) VALUES (:up_name, :up_file, :up_description)");
            $query->bindParam(':up_name',$category_name);
            $query->bindParam(':up_file',$file_name);
            $query->bindParam(':up_description',$category_description);
            $query->execute();
            echo "<script>alert('category added')</script>";

        }
    }
    else{
        echo "<script>alert('the file extension not matched')</script>";

    }

}

// UPDATE CATEGORY WORK FOR ADMIN(omama)
if (isset($_GET['id'])) {
    $up_id = $_GET['id'];
    $query = $pdo->prepare("select * from category where id = :id");
    $query->bindParam('id',$up_id);
    $query->execute();
    $category = $query->fetch(PDO::FETCH_ASSOC);
}


if(isset($_POST['update_category'])){
    $category_name = $_POST['up_name'];
    $category_description = $_POST['up_description'];
    $query = $pdo->prepare("UPDATE category SET name = :name, description = :up_description WHERE id = :id");    
    if (isset($_FILES["up_file"])) {
        $image = $_FILES['up_file']['name'];
        $imageExtension = pathinfo($image, PATHINFO_EXTENSION);
        $destination = "images/" . $image;
        $imageTmp_name = $_FILES['up_file']['tmp_name'];
        $imageSize = $_FILES['up_file']['size'];
        if ($imageSize < 5000000) {
            if ($imageExtension == "jpeg" || $imageExtension == "png" || $imageExtension == "jpg") {
                if (move_uploaded_file($imageTmp_name, $destination)) {
                    // Now, outside of the conditional block, bind the image parameter
                    $query = $pdo->prepare("UPDATE category SET name = :name, description = :up_description, image = :up_file WHERE id = :id");
                    $query->bindParam(':up_file', $image);
                }
            }
        }
    }    
    $query->bindParam(':name', $category_name);
    $query->bindParam(':up_description', $category_description);
    $query->bindParam(':id', $up_id);
    $query->execute();
    echo "<script>alert('category updated successfully');
    location.assign('admin-category.php');
    </script>";
}

// ADD AUTHORS WORK FOR ADMIN(omama)
include('connection.php');
if(isset($_POST['add_auth'])){
    $author_name = $_POST['au_name'];
    $author_email = $_POST['au_email'];
    $author_description = $_POST['au_description'];
    $file_name = $_FILES['au_file']['name'];
    $file_tmp_name = $_FILES['au_file']['tmp_name'];
    $file_size = $_FILES['au_file']['size'];
    $extension = pathinfo($file_name,PATHINFO_EXTENSION);
    $destination = "images/".$file_name;
    if($extension == "jpg" || $extension == "jpeg" || $extension == "png" ){
        if(move_uploaded_file($file_tmp_name , $destination)){
            $query = $pdo->prepare("insert into authors (name, image, email, description) VALUES (:au_name, :au_file, :au_email, :au_description)");
            $query->bindParam(':au_name',$author_name);
            $query->bindParam(':au_file',$file_name);
            $query->bindParam(':au_email',$author_email);
            $query->bindParam(':au_description',$author_description);
            $query->execute();
            echo "<script>alert('author added')</script>";

        }
    }
    else{
        echo "<script>alert('the file extension not matched')</script>";

    }

}
// UPDATE AUTHORS WORK FOR ADMIN(omama)
if (isset($_GET['id'])) {
    $ap_id = $_GET['id'];
    $query = $pdo->prepare("select * from authors where id = :id");
    $query->bindParam('id',$ap_id);
    $query->execute();
    $author = $query->fetch(PDO::FETCH_ASSOC);
}


if(isset($_POST['update_author'])){
    $author_name = $_POST['au_name'];
    $author_email = $_POST['au_email'];
    $author_description = $_POST['au_description'];
    $query = $pdo->prepare("UPDATE authors SET name = :name, email = :email, description = :au_description WHERE id = :id");    
    if (isset($_FILES["au_file"])) {
        $image = $_FILES['au_file']['name'];
        $imageExtension = pathinfo($image, PATHINFO_EXTENSION);
        $destination = "images/" . $image;
        $imageTmp_name = $_FILES['au_file']['tmp_name'];
        $imageSize = $_FILES['au_file']['size'];
        if ($imageSize < 5000000) {
            if ($imageExtension == "jpeg" || $imageExtension == "png" || $imageExtension == "jpg") {
                if (move_uploaded_file($imageTmp_name, $destination)) {
                    $query = $pdo->prepare("UPDATE authors SET name = :name, email = :email, description = :au_description, image = :au_file WHERE id = :id");
                    $query->bindParam(':au_file', $image);
                }
            }
        }
    }    
    $query->bindParam(':name', $author_name);
    $query->bindParam(':email', $author_email);
    $query->bindParam(':au_description', $author_description);
    $query->bindParam(':id', $ap_id);
    $query->execute();
    echo "<script>alert('author updated successfully');
    location.assign('admin-author.php');
    </script>";
}


// LOGIN WORK FOR(musfira)
if(isset($_POST['login'])){
    $email = $_POST['admin_email'];
    $pass = $_POST['admin_pass'];
    $query = $pdo->prepare("select * from users where email = :email  && password = :pass");
    $query->bindParam("email" , $email);
    $query->bindParam("pass" , $pass);
    $query->execute();
    $res = $query->fetch(PDO::FETCH_ASSOC); 

    if($res){
        $_SESSION['u_email']  = $res  ['email'];
        echo "<script>alert('login successfully');
        location.assign('index.php');
        </script>";
    }

}

// SIGN UP WORK(musfira)
if(isset($_POST['signup'])){
    $name = $_POST['sigup_name'];
    $email = $_POST['sigup_email'];
    $pass = $_POST['sigup_pass'];

    $query = $pdo->prepare("insert into users (name,email,password) values (:name , :email , :pass)");
    $query->bindParam('name',$name);
    $query->bindParam('email',$email);
    $query->bindParam('pass',$pass);
    $query->execute();

    echo "<script>alert('signup data added successfully');
    location.assign('sign-in.php');
    </script>";
}



// ADD BOOKS WORK FOR ADMIN(musfira)

if (isset($_POST['add_book'])) {
    $book_name = $_POST['b_name'];
    $book_price = $_POST['b_price'];
    $a_id = $_POST['a_id'];
    $c_id = $_POST['c_id'];
    $book_description = $_POST['b_description'];
    $file_name = $_FILES['up_image']['name'];
    $file_tmp_name = $_FILES['up_image']['tmp_name'];
    $file_size = $_FILES['up_image']['size'];
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $destination = "images/" . $file_name;
    $pdf_name = $_FILES['up_pdf']['name'];
    $pdf_tmp_name = $_FILES['up_pdf']['tmp_name'];
    $pdf_size = $_FILES['up_pdf']['size'];
    $pdf_extension = pathinfo($pdf_name, PATHINFO_EXTENSION);
    $pdf_destination = "pdfs/" . $pdf_name;

  
        if (($extension == "jpg" || $extension == "jpeg" || $extension == "png") && $pdf_extension == "pdf") {
            if (move_uploaded_file($file_tmp_name, $destination) && move_uploaded_file($pdf_tmp_name, $pdf_destination)) {
                $query = $pdo->prepare("insert into books (b_name, b_price, b_image, a_id, c_id, b_description, b_pdf) values (:name, :price, :image, :author_id, :category_id, :description, :pdf)");
                $query->bindParam(':name', $book_name);
                $query->bindParam(':price', $book_price);
                $query->bindParam(':image', $file_name);
                $query->bindParam(':author_id', $a_id);
                $query->bindParam(':category_id', $c_id);
                $query->bindParam(':description', $book_description);
                $query->bindParam(':pdf', $pdf_name);
                $query->execute();
                echo "<script>alert('Book added')</script>";
            } else {
                echo "<script>alert('File move operation failed. Please check your server configuration.')</script>";
            }
        } else {
            echo "<script>alert('The book extension or PDF extension not matched')</script>";
        }
    }




// Update BOOKS WORK FOR ADMIN(musfira)
if (isset($_GET['b_id'])) {
    $b_id = $_GET['b_id'];
    $query = $pdo->prepare("select * from books where b_id = :id");
    $query->bindParam(':id', $b_id);
    $query->execute();
    $book = $query->fetch(PDO::FETCH_ASSOC);
}
if (isset($_POST['up_add_book'])) {
    $book_name = $_POST['up_b_name'];
    $book_price = $_POST['up_b_price'];
    $a_id = $_POST['a_id'];
    $c_id = $_POST['c_id'];
    $book_description = $_POST['up_b_description'];
    $query = $pdo->prepare("insert into books (b_name, b_price, a_id, c_id, b_description) values (:name, :price, :author_id, :category_id, :description)");
    if (isset($_FILES['up_up_image'] , $_FILES['up_up_pdf'] )) {
        $file_name = $_FILES['up_up_image']['name'];
        $file_tmp_name = $_FILES['up_up_image']['tmp_name'];
        $file_size = $_FILES['up_up_image']['size'];
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $destination = "images/" . $file_name;
        $pdf_name = $_FILES['up_up_pdf']['name'];
        $pdf_tmp_name = $_FILES['up_up_pdf']['tmp_name'];
        $pdf_size = $_FILES['up_up_pdf']['size'];
        $pdf_extension = pathinfo($pdf_name, PATHINFO_EXTENSION);
        $pdf_destination = "pdfs/" . $pdf_name;
        if (move_uploaded_file($file_tmp_name, $destination) && move_uploaded_file($pdf_tmp_name, $pdf_destination) ) {
            $query = $pdo->prepare("update books set b_name = :name, b_price = :price, b_image = :image, a_id = :author_id, c_id = :category_id, b_description = :description, b_pdf = :pdf where b_id = :book_id");
            $query->bindParam(':image', $file_name);
            $query->bindParam(':pdf', $pdf_name);
        }
        else{
            echo "<script>alert('erorr');
            location.assign('admin-books.php');
            </script>";
        }
    }
        $query->bindParam(':name', $book_name);
        $query->bindParam(':price', $book_price);
        $query->bindParam(':author_id', $a_id);
        $query->bindParam(':category_id', $c_id);
        $query->bindParam(':description', $book_description);
        $query->bindParam(':book_id', $b_id);
        $query->execute();
        echo "<script>alert('book updated successfully');
        location.assign('admin-books.php');
        </script>";

}



// if(isset($_POST['up_add_book'])){
//     $book_name = $_POST['up_b_name'];
//     $book_price = $_POST['up_b_price'];
//     $a_id = $_POST['a_id'];
//     $c_id = $_POST['c_id'];
//     $book_description = $_POST['up_b_description'];
//     $query = $pdo->prepare("insert into books (b_name, b_price, a_id, c_id, b_description) values (:name, :price, :author_id, :category_id, :description)");  
//     if (isset($_FILES["up_up_image"])) {
//          $file_name = $_FILES['up_up_image']['name'];
//         $extension = pathinfo( $file_name, PATHINFO_EXTENSION);
//         $destination = "images/" .  $file_name;
//         $file_tmp_name = $_FILES['up_up_image']['tmp_name'];
//         $file_size = $_FILES['up_up_image']['size'];
//         if ($file_size < 5000000) {
//             if ($extension == "jpeg" || $extension == "png" || $extension == "jpg") {
//                 if (move_uploaded_file($file_tmp_name, $destination)) {
//                     $query = $pdo->prepare("update books set b_name = :name, b_price = :price, b_image = :image, a_id = :author_id, c_id = :category_id, b_description = :description where b_id = :book_id");
//                     $query->bindParam(':image', $file_name);
//                 }
//             }
//         }
//     }    


//     if (isset($_FILES["up_up_pdf"])) {
//         $pdf_name  = $_FILES['up_up_pdf']['name'];
//         $pdf_extension= pathinfo($pdf_name , PATHINFO_EXTENSION);
//         $pdf_destination  = "pdfs/" . $pdf_name;;
//         $pdf_tmp_name  = $_FILES['up_up_pdf']['tmp_name'];
//         $pdf_imageSize = $_FILES['up_up_pdf']['size'];
//         if ($pdf_imageSize < 5000000) {
//             if ( $pdf_extension == "jpeg" ||  $pdf_extension == "png" ||  $pdf_extension == "jpg") {
//                 if (move_uploaded_file( $pdf_tmp_name ,  $pdf_destination )) {
//                     $query = $pdo->prepare("update books set b_name = :name, b_price = :price, b_image = :image, a_id = :author_id, c_id = :category_id, b_description = :description, b_pdf = :pdf where b_id = :book_id");
//                     $query->bindParam(':pdf', $pdf_name);
//                 }
//             }
//         }
//     }    

//     $query->bindParam(':name', $book_name);
//     $query->bindParam(':price', $book_price);
//     $query->bindParam(':author_id', $a_id);
//     $query->bindParam(':category_id', $c_id);
//     $query->bindParam(':description', $book_description);
//     $query->bindParam(':book_id', $b_id);
//     $query->execute();
//     echo "<script>alert('book updated successfully');
//     location.assign('admin-books.php');
//     </script>";

// }



