document.getElementById("btnCreateTask").addEventListener("click", btnCreateTask);

// || Add Task
function btnCreateTask() {
  document.querySelector("#addTask").classList.remove("display-task");
}

// || Dropdown
document.getElementById("dropDownButton").addEventListener("click", dropDownButton);

const contentShow = document.getElementById("showDropDownContent");

function dropDownButton() {
  contentShow.classList.toggle("dropdown-content-show");
}

document.addEventListener('keypress', function(e) {
  if (e.key === 'Enter') {
    const task = {
      title: document.getElementById("taskInput").value,
      decs: document.getElementById("decsInput").value,
      date: document.getElementById("dateInput").value
    }
    if (task?.title && task?.date) {
      handleEnter(task);
      document.getElementById("taskInput").value = "";
      document.getElementById("decsInput").value = "";
      document.getElementById("dateInput").value = "";
    }else {
      toast();
    }
  }
});

function handleEnter(task) {

const taskList = document.getElementById("taskList");

  taskList.insertAdjacentHTML(
    "afterbegin",
    ` <li class=" do-lists">
          <div class="frame-result-task">
            <div class="sub-frame-result-task">
              <input type="checkbox">
              <label><p class="title-task">${task.title}</p></label>
              <span class="badge" id=""><p>${task.date}</p></span>
              <div class="frame-more-task">
                <i class="more" onclick="clickMore(this)"><img src="./assets/icons/more-vertical-black.svg" alt="more"></i>
                <div class="more-tasks open-more-task"> <!--MORE TASKS-->
                  <span class="rename-task"><i><img src="./assets/icons/Edit.svg" alt="Rename"></i><p>Rename Task</p></span>
                  <span class="delete-task" onclick="deleteTask(this)"><i><img src="./assets/icons/Delete.svg" alt="Delete"></i><p>Delete Task</p></span>
                </div>
              </div>
            </div>
            <p class="decs">${task.decs}</p>
          </div>
          <div class="accordion-button" onclick="accordionClick(this)"> <!--ACCORDION SECTION-->
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
    `
  );
}

// Delete Task
function deleteTask(mtask) {
  mtask.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
}

// || More
function clickMore(more) {
  const moreTask = more.nextElementSibling;
    moreTask.classList.toggle("open-more-task");
}

// || Accordion
function accordionClick(click) {
  click.classList.toggle("rotated");
  click.classList.toggle("to-open");
  
  const subTaskList = click.nextElementSibling;
  if (subTaskList.style.maxHeight) {
    subTaskList.style.maxHeight = null;
  }else {
    subTaskList.style.maxHeight = subTaskList.scrollHeight + "px";
  }
}

// || Toast
let toast = function (){
  toastr.options = {
    "positionClass": "toast-top-center",
    "timeOut": "2000"
  }

  toastr["warning"]("Title & Date must be filled 😁");
}