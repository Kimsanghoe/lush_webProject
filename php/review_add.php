<?php
    require("./db_connect.php");

    session_start();

    if(isset($_SESSION["userId"])) {
        $uid = $_SESSION["userId"];

        $rating = $_POST["rating"] ?? "";
        $reviewText = $_POST["review-text"] ?? "";
        $pCode = $_POST["pCode"];
        $tempFile = $_FILES['_reviewImg']['tmp_name'];

        if(!($rating && $reviewText)) {
            errMsg("별점과 리뷰 내용은 반드시 작성해주셔야합니다.");
        }

        // echo "$rating<br>";
        // echo "$reviewText<br>";
        // echo "$pCode<br>";
        // echo "$tempFile<br>";

        if(!($tempFile === '')) {
            $fileTypeExt = explode("/", $_FILES['_reviewImg']['type']);
            $fileType = $fileTypeExt[0];
            $fileExt = $fileTypeExt[1];
            $extStatus = false;
            switch($fileExt) {
                case 'jpeg':
                case 'jpg':
                case 'gif':
                case 'bmp':
                case 'png':
                    $extStatus = true;
                    break;
                
                default :
                    errMsg('이미지 전용 확장자(jpg, bmp, gif, png)외에는 사용이 불가능합니다.');
                    break;
            }

            if($fileType == 'image') {
                if($extStatus) {
                    $resFile = "C:/xampp/htdocs/rnk/images/reviewImg/{$_FILES['_reviewImg']['name']}";

                    if($imageUpload = move_uploaded_file($tempFile, $resFile)) {
                        $resFile = substr($resFile, 15);
                        echo "업로드 성공";
                    } else {
                        errMsg('파일 업로드에 실패하였습니다.');
                    }
                } else {
                    errMsg('파일 확장자는 jpg, bmp, gif, png 이어야 합니다.');
                    exit;
                }
            } else {
                errMsg('이미지 파일이 아닙니다.');
                exit;
            }
        }

        $sql = $PDO->prepare("INSERT INTO product_review (uID, p_code, rating, content, reviewImg, reviewDate) VALUE (:uID, :p_code, :rating, :content, :reviewImg, now());");
        $sql->bindParam(':uID', $uid);
        $sql->bindParam(':p_code', $pCode);
        $sql->bindParam(':rating', $rating);
        $sql->bindParam(':content', $reviewText);
        $sql->bindParam(':reviewImg', $resFile);
        $sql->execute();

        header("location:../signUpComplete.php");
    } else {
        errMsg("로그인해야합니다.");
    }
?>