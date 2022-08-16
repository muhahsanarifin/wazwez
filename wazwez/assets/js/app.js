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

// || Insert Task
const taskList = document.getElementById("taskList");

// || Input Task
document.getElementById("insertTask").addEventListener("input",handleChange);

function handleChange () {

}

// || Change Task
document.getElementById("insertTask").addEventListener("change", handleEnter);

function handleEnter () {
	taskList.insertAdjacentHTML(
    "afterbegin",
    ` <li class=" do-lists">
					<div class="frame-result-task">
						<div class="sub-frame-result-task">
							<input type="checkbox">
							<label><p class="title-task">${this.value}</p></label>
							<span class="badge" id=""><p>01-08-2022</p></span>
							<div class="frame-more-task">
								<i class="more" onclick="clickMore(this)"><img src="./assets/icons/more-vertical-black.svg" alt="more"></i>
								<div class="more-tasks open-more-task"> <!--MORE TASKS-->
									<span class="rename-task"><i><img src="./assets/icons/Edit.svg" alt="Rename"></i><p>Rename Task</p></span>
									<span class="delete-task" onclick="deleteTask(this)"><i><img src="./assets/icons/Delete.svg" alt="Delete"></i><p>Delete Task</p></span>
								</div>
							</div>
						</div>
						<p class="decs" id="">Description</p>
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

	this.value ="";
}

// Delete Task
function deleteTask(mtask) {
	mtask.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
}

// More
function clickMore(more) {
	more.classList.toggle("click-to-show");
	
	const moreTask = more.nextElementSibling;
		moreTask.classList.toggle("open-more-task");
}

// Accordion
function accordionClick(click) {
	click.classList.toggle("to-open");
	const subTASKLIST = click.nextElementSibling;
	if (subTASKLIST.style.maxHeight) {
		subTASKLIST.style.maxHeight = null;
	}else {
		subTASKLIST.style.maxHeight = subTASKLIST.scrollHeight + "px";
	}
}
