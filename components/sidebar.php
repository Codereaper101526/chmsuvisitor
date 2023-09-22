<?php
echo ' 
<div class="sidebarContainer">
<div class="sidebarIconContainer">
        <button onclick="window.location.href=\'./dashboard.php\'" class="btncontainer">
            <div class="sidebarIcon"> <img src="./icon/id-card.png" alt="" class="iconmod"> </div>
            <div class="iconLabel">Dashboard</div>
        </button>
    
         <button onclick="window.location.href=\'./archive.php\'" class="btncontainer">
            <div class="sidebarIcon"> <img src="./icon/file.png" alt="" class="iconmod"> </div>
            <div class="iconLabel">Archive</div>
        </button>

         <button onclick="window.location.href=\'./location.php\'" class="btncontainer">
            <div class="sidebarIcon"> <img src="./icon/destination.png" alt="" class="iconmod"> </div>
            <div class="iconLabel">Locations</div>
        </button>
</div>
<div class="sidebarLogoutContainer">
        <button onclick="window.location.href=\'./index.php\'" class="btncontainer">
            <div class="sidebarIcon"> <img src="./icon/logout.png" alt="" class="iconmod"> </div>
            <div class="iconLabel"> <strong>LOGOUT </strong></div>
        </button>
</div>
</div>';