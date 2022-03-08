<?php if(session_id() ===""){ session_start();} ?>
<style>
.options{
    position: fixed;
    bottom: 0;
    width: 100%;
    max-width: 1200px;
    padding: 10px;
    text-align: center;
    background-color: black; 
    display: flex;
    border-top: 0.3px solid gray;
    }
.options button{
    background: none;
    border: none;
    outline: none;
    color:dodgerblue;
    font-size: 1.5em;
    width: 100%;
    transition: .5s;
    }
    .options button:hover{color: red}   
</style> 
  
<div class="options">   
    <button class="icon-home" onclick="location.href='../index.php';"></button>
    <button class="icon-globe" onclick="location.href='main.php';"></button>
    <button class="icon-grid" onclick="location.href='exercises.php';"> </button>
    <button class="icon-search" onclick="$('#divSearch').slideToggle();"></button>
    <?php if(isset($_SESSION['idstudent'])){  ?>
    <button class="icon-usercircle" onclick="location.href='account.php';"></button>
    <?php } ?>
</div> 

 