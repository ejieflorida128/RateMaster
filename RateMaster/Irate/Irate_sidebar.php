<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File-Rate Admin</title>
    
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
      <style>
        .nav__cont {
  position: fixed;
  width: 60px;
  top:0;
  height: 100vh;
  z-index: 100;
  background-color: #202020;
  overflow:hidden;
  transition:width .3s ease;
  cursor:pointer;
  box-shadow:4px 7px 10px rgba(0,0,0,.4);
  &:hover {
    width:200px;
  }
  @media screen and (min-width: 600px) {
    width: 80px;
  }
}

.nav {
  list-style-type: none;
  color:white;
  &:first-child {
    padding-top:1.5rem;
  }
}

.nav__items {
  margin-left: 50px;
  padding-bottom:4rem;
  font-family: 'roboto';
   a {
    position: relative;
    display:block;
    top:-35px;
    padding-left:25px;
    padding-right:15px;
    transition:all .3s ease;
    margin-left:25px;
    margin-right:10px;
    text-decoration: none;
    color:white;
    font-family: 'roboto';
    font-weight: 100;
    font-size: 1.35em;
    margin-top: 5px;
     &:after {
       content:'';
       width: 100%;
       height: 100%;
       position: absolute;
       top:0;
       left:0;
       border-radius:2px;
       background:radial-gradient(circle at 94.02% 88.03%, #54a4ff, transparent 100%);
       opacity:0;
       transition:all .5s ease;
       z-index: -10;
     }
  }
  &:hover a:after {
    opacity:1;
  }
   svg{
    width:26px;
    height:26px;
    position: relative;
    left:-25px;
    cursor:pointer;
    @media screen and(min-width:600px) {
      width:32px;
    height:32px;
left:-15px;
    }
  }
}

#logout{
  margin-top: 50px;
  
}

body {
  height: 100vh;
  background: radial-gradient(circle at 94.02% 88.03%, #54a4ff, transparent 100%),radial-gradient(circle at 25.99% 27.79%, #ff94fb, transparent 100%),radial-gradient(circle at 50% 50%, #000000, #000000 100%);
}

h1 {
  margin-top: 6rem;
  margin-left:80px;
  text-align: center;
  font-family: 'Roboto';
  font-weight: 100;
  font-size: 4rem;
  text-transform:uppercase;
  color:white;
  letter-spacing:6px;
  text-shadow:10px 10px 10px rgba(0,0,0,.3);
}
      </style>
</head>
<body>
<svg style="display:none;">
  <defs>

    <g id="home">
          <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
          <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
          <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
          </svg>
    </g>

    <g id="item">
    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
      <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
      <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z"/>
    </svg>
    </g>

    <g id="planner"  id = "logout">
        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="red" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
      <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
    </svg>
    </g>

  </defs>
</svg>


<nav class="nav__cont">
  <ul class="nav">
    <li class="nav__items ">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
        <use xlink:href="#home"></use>
      </svg>
      <a href="Iratepage.php">Dashboard</a>
    </li>

    <li class="nav__items ">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
        <use xlink:href="#item"></use>
      </svg>
      <a href="Irate.php">I-Rate</a>
    </li>
    
    
      
    <li class="nav__items " id = "logout">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
        <use xlink:href="#planner"></use></svg>
      <a href="../index.php" >Logout</a>
    </li>
        
  </ul>
</nav>

  




 <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>