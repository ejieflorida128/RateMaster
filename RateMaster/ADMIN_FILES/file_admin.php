<?php
include("file_sidebar.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File-Rate Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
    

    <div class="wrapper">
        <main>
                <h1 class = "rateText">File-Rate</h1>

                <div class="components">
                    <div class="section1">

                        <a href="f_logs.php">
                        <div class="box">
                                <div class="title">
                                        <h1>Activity Logs</h1>
                                </div>
                                <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="rgb(73, 73, 73)" class="bi bi-calendar-week-fill" viewBox="0 0 16 16">
                                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2M9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5m3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5M2 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                </div>
                                <div class="dis">
                                        <h6>Click here to proceed to File Rate Activity Logs</h6>
                                </div>
                            </div>
                        </a>


                    </div>
                    <div class="section2">

                                <a href="f_manage.php">
                                        <div class="box">
                                        <div class="title" style = "margin-left:-50px;">
                                            <h1>Manage Rate</h1>
                                        </div>
                                        <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="rgb(73, 73, 73)" class="bi bi-kanban-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm5 2h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1m-5 1a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1zm9-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1"/>
                                                </svg>
                                        </div>
                                        <div class="dis">
                                                <h6>Click here to proceed to File Rate Management</h6>
                                        </div>
                                    </div>
                                </a>

                    </div>

                                <div class="section3">

                                    <a href="f_user.php">
                                            <div class="box">
                                            <div class="title" style = "margin-left:7px;">
                                                <h1>Users </h1>
                                            </div>
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="rgb(73, 73, 73)" class="bi bi-people-fill" viewBox="0 0 16 16">
                                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                                </svg>
                                            </div>
                                            <div class="dis">
                                                    <h6>Click here to proceed to  User Management</h6>
                                            </div>
                                        </div>
                                    </a>

                                    </div>
                </div>
        </main>
    </div>


<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>