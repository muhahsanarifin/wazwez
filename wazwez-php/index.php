<?php 
  include_once('config.php');

  $retrieve = "SELECT * FROM tasks";
  $result = ($conn->query($retrieve));

  //Declare array to store the data of database
  $row =[];

  if ($result->num_rows > 0) {
    //Fetch all datas from mysql into array
    $row =$result->fetch_all(MYSQLI_ASSOC);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="author"	content="MUH. AHSAN">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="./assets/favicon/wazwez-favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <title>wazwez.</title>
  </head>
  <body>
    <header>
      <nav>
        <div class="navbar">
          <div class="logo">
            <a href="#"><img src="./assets/image/wazwez-logo.png" alt="wazwez"></a>
          </div>
          <div class="notification">
            <img src="./assets/icons/notification.svg" alt="notification">
          </div>
          <div class="user-profile">
            <img src="./assets/icons/Profile - User.svg" alt="User Profile">
            <p>Username</p>
            <i><img src="./assets/icons/Arrow - Down 2.svg" alt="Arrow Down 2"></i>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <div class="container">
        <section class="content"> <!--CONTENT SECTION-->
          <div class="task">					
            <div class="title-plus-cta">
              <div class="title-desc">
                <p>MY TASK</p>
                <div class="frame-title-desc">
                  <h2>To Do List</h2>
                  <p>Buat List Tugas Harian saya</p>
                </div>
              </div>
              <div class="button" id="btnCREATETASK">
                <i><img src="./assets/icons/Plus - 1.svg" alt=""></i>
                <p>Tambah Tugas</p>
              </div>
            </div>
            <div class="filter"> <!--FILTER SECTION-->
              <p>Sort By</p>
              <div class="dropdown"> <!--DROPDOWN SECTION-->
                <div class="dropdown-btn" id="dropdownBTN">
                  <span>By Tanggal</span>
                  <i><img src="./assets/icons/Arrow - Down 2 - Orange.svg" alt="Arrow Down"></i>
                </div>
                <div class="dropdown-content dropdown-content-show" id="showddCONTENT">
                  <label>
                    <p>By Tanggal</p>
                    <input type="radio" name="filterList">
                  </label>
                  <label>
                    <p>By Time</p>
                    <input type="radio" name="filterList">
                  </label>
                  <label>
                    <p>Terbaru</p>
                    <input type="radio" name="filterList">
                  </label>
                </div>
              </div>
            </div>
            <div class="add-task display-task" id="addTASK"> <!--ADD TASK-->
              <form action="insert-data.php" method="POST">
                <div class="insert-task">
                  <input type="checkbox" disabled>
                  <input type="text" id="insertTASK" name="Title" placeholder="Masukan Nama Tugas" required>
                </div>
                <div class="decs-date">
                  <label for="decsINPUT" class="crt-task-decs">
                    <img src="./assets/icons/menu.svg" alt="Menu">
                    <input type="text" id="decsINPUT" name="Description" placeholder="Deskripsi Tugas (Opsional)">
                  </label>
                  <label for="dateINPUT" class="crt-task-date">
                    <img src="./assets/icons/Calendar.svg" alt="Date">
                    <input type="text" id="dateINPUT" name="Date" placeholder="Tanggal & Waktu">
                  </label>
                </div>
                <button type="submit" name="Submit" class="submit-task"></button>
              </form>
            </div>
            <div class="result-task"> <!--RESULT TASK-->
              <ul class="task-list" id="taskLIST">
                <?php 
                  if(!empty($row))
                  foreach($row as $rows)
                  {
                ?>
                  <li class=" do-lists"> <!--LISTS-->
                    <div class="frame-result-task">
                      <div class="sub-frame-result-task">
                        <input type="checkbox">
                        <label><p class="title-task"><?php echo $rows['Title']; ?></p></label>
                        <span class="badge" id=""><p><?php echo $rows['Date']?></p></span>
                        <div class="frame-more-task">
                          <i class="more" onclick="clickMore(this)"><img src="./assets/icons/more-vertical-black.svg" alt="more"></i>
                          <div class="more-tasks open-more-task"> <!--MORE TASKS-->
                            <span class="rename-task"><a href="#"><i><img src="./assets/icons/Edit.svg" alt="Rename"></i><p>Rename Task</p></a></span>
                            <span class="delete-task" onclick="deleteTask(this)"><a href="delete-data.php?TaskId=<?php echo $rows["TaskId"]; ?>"><i><img src="./assets/icons/Delete.svg" alt="Delete"></i><p>Delete Task</p></a></span>
                          </div>
                        </div>
                      </div>
                      <p class="decs" id=""><?php echo $rows['Description']; ?></p>
                    </div>
                    <div class="accordion-button" onclick="AccordionClick(this)"> <!--ACCORDION SECTION-->
                      <i><img src="./assets/icons/Arrow - Down 2.svg" alt="Icon"></i>
                    </div>
                    <div class="accordion-content"> 
                      <ul class="sub-task-list">
                        <div class="frame-sub-task-list">
                          <p>Subtask</p>
                          <div class="botton-two">
                            <i><img src="./assets/icons/Plus - 2.svg" alt="Tambah tugas"></i>	
                            <p>Tambah</p>
                          </div>
                        </div>
                        <li class="sub-do-list">
                          <input type="checkbox">
                          <label><p class="title-sub-task">Title</p></label>
                          <i class="deleted-sub-do-list" id=""><img src="./assets/icons/trash.svg" alt="Icon"></i>
                        </li>
                      </ul>
                    </div>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </section>
        <section class="output"> <!--OUTPUT SECTION-->
          <div class="out-title">
            <i><img src="./assets/icons/Arrow - Right 2.svg" alt="Arrow Up 2"></i>
            <p>Terselesaikan</p>
            <span><p>(2 Tugas)</p></span>
          </div>
          <div class="completed-list-item">
            <!-- <ul class="completed-task">
              <li>Software Engineer</li>
              <li>Website Developer</li>
            </ul> -->
          </div>
        </section>
      </div>
    </main>
    <!-- <footer></footer> -->
    <script type="text/javascript" src="./js/script.js"></script>
  </body>
</html>