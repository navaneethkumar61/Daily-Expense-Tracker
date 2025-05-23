<?php
  session_start();
  
  // Check if the user is logged in and retrieve the username
  if(isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
  } else {
      // Redirect to the login page or display a message if the user is not logged in
      header("Location: signin.php"); // Redirect to the login page
      exit();
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Sidebar Menu  | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link rel="stylesheet" href="css/flaticon.css" type="text/css">
     <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
nav{
    height: 80px;
    color: #ffffff;
    background-color: #11101D;
    justify-content:flex-end;
}
.profile {
    display: flex;
    align-items: center;
    flex-direction: column; /* Change to column layout */
    justify-content: flex-end;
    padding: 0px 0px;
    height: 100%;
    margin-left: 1000px;
    margin-top: -70px;
}
.logo {
    color: #ffffff;
    font-size: 44px;
    font-weight: bold;
    text-align: center; /* Center align the logo */
}
#avatar {
    width: 70px; /* Set width and height for the avatar */
    height: 70px;
    border-radius: 50%; /* Make it circular */
    overflow: hidden; /* Ensure the image doesn't overflow */
    margin-right: 10px; /* Add margin for spacing */
}

#avatar img {
    width: 100%; /* Make the image fill the container */
    height: 100%;
    object-fit: cover; /* Ensure the image fills the circle */
}
.sidebar{
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 78px;
  background: #11101D;
  padding: 6px 14px;
  z-index: 99;
  transition: all 0.5s ease;
}
.sidebar.open{
  width: 250px;
}
.sidebar .logo-details{
  height: 60px;
  display: flex;
  align-items: center;
  position: relative;
}
.sidebar .logo-details .icon{
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details .icon,
.sidebar.open .logo-details .logo_name{
  opacity: 1;
}
.sidebar .logo-details #btn{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 22px;
  transition: all 0.4s ease;
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details #btn{
  text-align: right;
}
.sidebar i{
  color: #fff;
  height: 60px;
  min-width: 50px;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
}
.sidebar .nav-list{
  margin-top: 20px;
  height: 100%;
}
.sidebar li{
  position: relative;
  margin: 8px 0;
  list-style: none;
}
.sidebar li .tooltip{
  position: absolute;
  top: -20px;
  left: calc(100% + 15px);
  z-index: 3;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 400;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0s;
}
.sidebar li:hover .tooltip{
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top: 50%;
  transform: translateY(-50%);
}
.sidebar.open li .tooltip{
  display: none;
}
.sidebar input{
  font-size: 15px;
  color: #FFF;
  font-weight: 400;
  outline: none;
  height: 50px;
  width: 100%;
  width: 50px;
  border: none;
  border-radius: 12px;
  transition: all 0.5s ease;
  background: #1d1b31;
}
.sidebar.open input{
  padding: 0 20px 0 50px;
  width: 100%;
}

.sidebar li a{
  display: flex;
  height: 100%;
  width: 100%;
  border-radius: 12px;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  background: #11101D;
}
.sidebar li a:hover{
  background: #FFF;
}
.sidebar li a .links_name{
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: 0.4s;
}
.sidebar.open li a .links_name{
  opacity: 1;
  pointer-events: auto;
}
.sidebar li a:hover .links_name,
.sidebar li a:hover i{
  transition: all 0.5s ease;
  color: #11101D;
}
.sidebar li i{
  height: 50px;
  line-height: 50px;
  font-size: 18px;
  border-radius: 12px;
}
.sidebar li.profile{
  position: fixed;
  height: 60px;
  width: 78px;
  left: 0;
  bottom: -8px;
  padding: 10px 14px;
  background: #1d1b31;
  transition: all 0.5s ease;
  overflow: hidden;
}
.sidebar.open li.profile{
  width: 250px;
}
.sidebar li .profile-details{
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
}
.sidebar li img{
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 6px;
  margin-right: 10px;
}
.sidebar li.profile .name,
.sidebar li.profile .job{
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  white-space: nowrap;
}
.sidebar li.profile .job{
  font-size: 12px;
}
.sidebar .profile #log_out{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  background: #1d1b31;
  width: 100%;
  height: 60px;
  line-height: 60px;
  border-radius: 0px;
  transition: all 0.5s ease;
}
.sidebar.open .profile #log_out{
  width: 50px;
  background: none;
}
.home-section{
  position: relative;
  background: #E4E9F7;
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
}
.sidebar.open ~ .home-section{
  left: 250px;
  width: calc(100% - 250px);
}
.home-section .text{
  display: inline-block;
  color: #11101d;
  font-size: 20px;
  font-weight: 500;
  margin: 18px
}
@media (max-width: 420px) {
  .sidebar li .tooltip{
    display: none;
  }
}
     </style>
   </head>
<body>
    <script src="https://kit.fontawesome.com/01bd2aaa86.js" crossorigin="anonymous"></script>
    <nav>
      <div class="logo"><i class="fa-solid fa-won-sign"></i>ealthVista</div>
        <div class="profile">
            <div id="avatar"></div>
            <div><?php echo "<h3>".strtoupper($username)."</h3>"; ?></div>
        </div>  
    </nav>
  <div class="sidebar">
    <div class="logo-details">
        <i class="fa-solid fa-won-sign"></i>
        <div class="logo_name">WealthVista</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      
      <li>
        <a href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="profile.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Update Profile</span>
       </a>
       <span class="tooltip">Update Profile</span>
     </li>
     <li>
       <a href="addexpense.php">
        <i class="fa-solid fa-circle-plus"></i>
                 <span class="links_name">Add Expense</span>
       </a>
       <span class="tooltip">Add Expense</span>
     </li>
     <li>
       <a href="manageexpense.html">
        <i class="fa-solid fa-bars-progress"></i>
                 <span class="links_name">Manage Expense</span>
       </a>
       <span class="tooltip">Manage Expense</span>
     </li>
     <li>
       <a href="reports.html">
               <i class='bx bx-pie-chart-alt-2' ></i>
              <span class="links_name">Reports</span>
       </a>
       <span class="tooltip">Reports</span>
     </li>
     <li>
       <a href="monthlycheckings.html">
        <i class="fa-solid fa-bullseye"></i>
           <span class="links_name">Goals</span>
       </a>
       <span class="tooltip">Goals</span>
     </li>
     <li>
       <a href="feedback.php">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Feedback</span>
       </a>
       <span class="tooltip">Feedback</span>
     </li>
     
     <li>
        <a href="logout.php">
            <i class='bx bx-log-out' id="log_out" ></i>
          <span class="links_name">Logout</span>
        </a>
        <span class="tooltip">Logout</span>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="text">
        <h1>Hi there, <?php echo $username; ?>!</h2>
        <p>Ready to take control of your finances?</p><p> Dive into your dashboard for insights, tools, and resources to help you succeed.</p>
    </div>
</section>
   
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  
  var randomString = Math.random().toString(36).substring(7);
    var robohashURL = "https://robohash.org/" + randomString + ".png";
    var imgElement = document.createElement("img");
    imgElement.src = robohashURL;
    imgElement.alt = "User Avatar";
    document.getElementById("avatar").appendChild(imgElement);


  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }

  </script>
</body>
</html>