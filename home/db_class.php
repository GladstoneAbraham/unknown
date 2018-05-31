<?php
Class DBOP
{
  function insert_post($post_title,$post_content,$category_id,$user_id,$user,$publish,$conn)
  {
    $stmt = $conn->prepare('Insert into posts(post_title, user_id, username, post_content, published, category_id) values((:title),(:id),(:user),(:content),(:pub),(:cat_id))');
    $stmt->bindParam(':title',$post_title,PDO::PARAM_STR);
    $stmt->bindParam(':id',$user_id,PDO::PARAM_STR);
    $stmt->bindParam(':user',$user,PDO::PARAM_STR);
    $stmt->bindParam(':content',$post_content,PDO::PARAM_STR);
    $stmt->bindParam(':pub',$publish,PDO::PARAM_STR);
    $stmt->bindParam(':cat_id',$category_id,PDO::PARAM_STR);
    if($stmt->execute())
      return 1;
    else
      return 0;
  }
  function select($conn)
  {
     $sql = "SELECT * FROM posts WHERE published = 1";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     $posts = $stmt->fetchAll();
     return $posts;
  }
}
$db = new DBOP;
 ?>
