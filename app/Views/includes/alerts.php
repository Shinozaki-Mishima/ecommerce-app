<?php 
    if(isset($_SESSION["message"])){
        $message = $_SESSION["message"];
?>

<div class="container"> 
    <div class="alert alert-primary">
      <strong>Notice!</strong> <?php echo $message; ?>
    </div>
</div>

<?php 
    unset($_SESSION["message"]);
}
?>