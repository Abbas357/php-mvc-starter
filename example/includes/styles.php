<link rel="icon" type="image/ico" href="<?php echo BASE_URL; ?>assets/images/favicon.ico">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/font/css/font-awesome.min.css"/> 
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/font/css/icons.css"/> 
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
<?php 
   $design = $userClass->getDesignData($user_id);
?>
<script>
      document.documentElement.style.setProperty('--primary', "<?php if(isset($design->primaryColor)){echo $design->primaryColor; } ?>");
      document.documentElement.style.setProperty('--secondary', "<?php if(isset($design->secondaryColor)){echo $design->secondaryColor; } ?>");
      document.documentElement.style.setProperty('--success', "<?php if(isset($design->linksColor)){echo $design->linksColor; } ?>");
   window.onload = function(){
      document.body.style.background = "#E5E5E5 url('<?php if(isset($design->background)){echo BASE_URL.$design->background; } ?>') 100% 100% fixed";
   }
</script>