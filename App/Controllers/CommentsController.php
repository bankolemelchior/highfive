<?php 
require_once "../App/Models/CommentsModel.php";


class CommentsController {

    /**
     * To sanitize the value from users
     * 
     * pass all variables through PHP's htmlspecialchars() function
     * Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
     * Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
     * 
     */

    public function form_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    

    /**
     * 
     * To get input from the comment form and insert it
     * 
     */

     public function articleComment() {    

        if(!empty($_POST['theComment'])) {

            $theComment = $this->form_input($_POST['theComment']);
            // echo json_encode($theComment);
            // die();
            $articleID = $_POST['artId'];
            $userID = $_POST['userId'];
            $date = date("y-m-d H:i:s");
            //Insert comment
            $comments = new CommentsModel();
            $comments->insertToComment($theComment, $userID, $articleID, $date);
            //All comment relative to an article
            $comments = new CommentsModel();
            $comment = $comments->articleComments($articleID);
    
            echo json_encode($comment);
            die();
          
        } else {

            echo json_encode('le else');
            die();


        }

    }

    public function toDeletComment() {
        // echo json_encode($_POST);
        // die();
        $comID = $_POST['commentId'];
        $articleID = $_POST['artID'];

        $comments = new CommentsModel();
        $comment = $comments->deleteComments($comID);

        //All comment relative to an article
        $comments = new CommentsModel();
        $usersCOm = $comments->articleComments($articleID);

        echo json_encode($usersCOm);

    }   

   


}
