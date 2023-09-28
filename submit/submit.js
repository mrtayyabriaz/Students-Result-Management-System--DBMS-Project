/*===================================================================================================
===================================== SignUp =======================================================
===================================================================================================*/

function Signup() {
  // upload data
  var form = document.getElementById("Signup_form"); //========= select form
  let data = new FormData(form); //======================== create form data

  let xhr = new XMLHttpRequest(); //======================= create new request
  xhr.onreadystatechange = function () {
    //======== on status ready
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      document.getElementById("signup_status").innerHTML = this.response;
    }
  };

  xhr.open("POST", "submit/process_Signup.php"); //==================== Open

  xhr.send(data); //======== send data

  return false;
}

/*===================================================================================================
===================================== SignUp =======================================================
===================================================================================================*/

/*===================================================================================================
===================================== Login =======================================================
===================================================================================================*/

function login() {
  // upload data
  var form = document.getElementById("login_form"); //========= select form
  let data = new FormData(form); //======================== create form data

  let xhr = new XMLHttpRequest(); //======================= create new request
  xhr.onreadystatechange = function () {
    //======== on status ready
    if (this.readyState == 4 && this.status == 200) {
      // console.log(this.response);
      document.getElementById("login_status").innerHTML = this.response;
      result = this.response;
      result = result.substring(0, 21);
      if (result == "<p class=signsuccess>") {
        console.log(result);
        setTimeout(() => {
          window.location.assign("TeacherPanel.php");
        }, 2500);
      }
    }
  };

  xhr.open("POST", "submit/process_login.php"); //==================== Open

  xhr.send(data); //======== send data

  return false;
}

/*===================================================================================================
===================================== Login =======================================================
===================================================================================================*/

/*===================================================================================================
===================================== Class =======================================================
===================================================================================================*/

// ==================================== Add ============================================
function AddClassfun() {
  // upload data
  var form = document.getElementById("AddClassForm"); //========= select form
  let data = new FormData(form); //======================== create form data

  let xhr = new XMLHttpRequest(); //======================= create new request
  xhr.onreadystatechange = function () {
    //======== on status ready
    if (this.readyState == 4 && this.status == 200) {
      // console.log(this.response);
      if (this.response == "success insert") {
        document.getElementById("AddClassStatus").style.display = "block";

        //===== show li in the list =====
        DataToAdd = document.getElementById("AddClassName").value;
        const nodea = document.createElement("a");
        const nodeli = document.createElement("li");
        const nodediv = document.createElement("div");
        const textnode = document.createTextNode(DataToAdd);
        nodediv.appendChild(textnode);
        nodediv.setAttribute("class", "subjectname col-8");
        // nodediv.classList.add('subjectname');
        nodea.appendChild(nodediv);
        nodeli.appendChild(nodea);
        console.log(nodeli);
        document.getElementById("classlist").appendChild(nodeli);
        //===== show li in the list =====

        //===== clear input box =====
        document.getElementById("AddClassName").value = "";
        //===== clear input box =====

        //===== set time to refrech =====
        setTimeout(() => {
          window.location.reload();
        }, 3000);
        //===== set time to refrech =====
      }
    }
  };

  xhr.open("POST", "submit/classes.php"); //==================== Open
  xhr.send(data); //======== send data
  return false;
}
// ==================================== Add ============================================

// ==================================== Delet ==========================================
function DeletClass(ClassID) {
  let xhr = new XMLHttpRequest(); //======================= create new request
  xhr.onreadystatechange = function () {
    //======== on status ready
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      theclassID = "TheClass" + ClassID;
      console.log(theclassID);
      document.getElementById(theclassID).remove();
    }
  };

  xhr.open("POST", "submit/classes.php"); //==================== Open
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //for POST method only
  data = "DeletClass=" + ClassID;
  xhr.send(data); //======== send data

  return false;
}
// ==================================== Delet ==========================================

/*===================================================================================================
===================================== Class =======================================================
===================================================================================================*/

/*===================================================================================================
===================================== Subjects =======================================================
===================================================================================================*/

// ================ Add Subject ===============
function AddSubjectfun() {
  console.log("AddSubjectfun");
  // upload data
  var form = document.getElementById("AddSubjectForm"); //========= select form
  let data = new FormData(form); //======================== create form data

  let xhr = new XMLHttpRequest(); //======================= create new request
  xhr.onreadystatechange = function () {
    //======== on status ready
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      if (this.response == "success insert") {
        document.getElementById("AddSubjectStatus").style.display = "block";

        //===== show li in the list =====
        DataToAdd = document.getElementById("AddSubjectName").value;
        const nodea = document.createElement("a");
        const nodeli = document.createElement("li");
        const nodediv = document.createElement("div");
        const textnode = document.createTextNode(DataToAdd);
        nodediv.appendChild(textnode);
        nodediv.setAttribute("class", "subjectname col-8");
        // nodediv.classList.add('subjectname');
        nodea.appendChild(nodediv);
        nodeli.appendChild(nodea);
        console.log(nodeli);
        document.getElementById("SubjectList").appendChild(nodeli);
        //===== show li in the list =====

        //===== clear input box =====
        document.getElementById("AddSubjectName").value = "";
        //===== clear input box =====

        //===== set time to refrech =====
        setTimeout(() => {
          window.location.reload();
        }, 3000);
        //===== set time to refrech =====
      } else {
        document.getElementById("AddSubjectStatus").style.display = "block";
        document.getElementById("AddSubjectStatus").innerHTML = "Unknown Error";
      }
    }
  };
  xhr.open("POST", "submit/subjects.php"); //==================== Open
  xhr.send(data); //======== send data
  return false;
}
// ================ Add Subject ===============

// ================ Add Subject To Class ===============
function AddSubjectToClassfun() {
  console.log("AddSubjectToClassfun");
  // upload data
  var form = document.getElementById("AddSubjectToClassForm"); //========= select form
  let data = new FormData(form); //======================== create form data

  let xhr = new XMLHttpRequest(); //======================= create new request
  xhr.onreadystatechange = function () {
    //======== on status ready
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      if (this.response == "success insert") {
        document.getElementById("AddSubjectStatus").style.display = "block";

        //===== show li in the list =====
        DataToAdd = document.getElementById("AddSubjectToClassID");
        DataToAdd = DataToAdd.options[DataToAdd.selectedIndex].text; // text of selected option

        // const nodebutton = document.createElement('<button class="col-2 btn thebutton edit" type="button"><a href="edit.php?SubjectID=33">Edit</a></button>');
        const nodea = document.createElement("a");
        const nodeli = document.createElement("li");
        const nodediv = document.createElement("div");
        const textnode = document.createTextNode(DataToAdd);
        nodediv.appendChild(textnode);
        nodediv.setAttribute("class", "subjectname col-8");
        // nodediv.classList.add('subjectname');
        nodea.appendChild(nodediv);
        nodeli.appendChild(nodea);
        // nodeli += '<button class="col-2 btn thebutton edit" type="button"><a href="edit.php?SubjectID=33">Edit</a></button>';
        // nodeli.appendChild('<button class="col-2 btn thebutton edit" type="button"><a href="edit.php?SubjectID=33">Edit</a></button>');
        console.log(nodeli);
        document.getElementById("SubjectList").appendChild(nodeli);
        //===== show li in the list =====

        //===== clear input box =====
        document.getElementById("AddSubjectToClassID").value = "";
        //===== clear input box =====

        //===== set time to refrech =====
        setTimeout(() => {
          window.location.reload();
        }, 3000);
        //===== set time to refrech =====
      } else if (this.response == "Already Added") {
        document.getElementById("AddSubjectStatus").style.display = "block";
        document.getElementById(
          "AddSubjectStatus"
        ).firstElementChild.innerHTML = "Subject Already Added to this class";
      } else {
        document.getElementById("AddSubjectStatus").style.display = "block";
        document.getElementById(
          "AddSubjectStatus"
        ).firstElementChild.innerHTML = this.response;
      }
    }
  };

  xhr.open("POST", "submit/subjects.php"); //==================== Open

  xhr.send(data); //======== send data

  return false;
}
// ================ Add Subject To Class ===============

// ============================= Delet Subject ===========================================

function DeletSubject(SubjectID) {
  let xhr = new XMLHttpRequest(); //======================= create new request
  xhr.onreadystatechange = function () {
    //======== on status ready
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      theSubjectIDToRemoveDiv = "TheSubject" + SubjectID;
      console.log(theSubjectIDToRemoveDiv);
      document.getElementById(theSubjectIDToRemoveDiv).remove();
    }
  };

  xhr.open("POST", "submit/subjects.php"); //==================== Open
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //for POST method only
  data = "DeletSubject=" + SubjectID;
  xhr.send(data); //======== send data

  return false;
}
// ================ Delet Subject===============

// ================ Delet Subject From Class start ===============
function DeletSubjectFromClass(SubjectID, ClassID) {
  let xhr = new XMLHttpRequest(); //======================= create new request
  xhr.onreadystatechange = function () {
    //======== on status ready
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      theSubjectIDToRemoveDiv = "TheSubject" + SubjectID;
      console.log(theSubjectIDToRemoveDiv);
      document.getElementById(theSubjectIDToRemoveDiv).remove();
    }
  };

  xhr.open("POST", "submit/subjects.php"); //==================== Open
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //for POST method only
  data = "DeletSubjectFromClass=" + SubjectID + "&ClassID=" + ClassID;
  xhr.send(data); //======== send data

  return false;
}
// ================ Delet Subject===============

/*===================================================================================================
======================================== Subjects ===================================================
===================================================================================================*/

/*===================================================================================================
===================================== Student =======================================================
===================================================================================================*/

// ================ Add Student To Class ===============
function AddStudentToClassfun() {
  console.log("AddStudentToClassfun");
  // upload data
  var form = document.getElementById("AddStudentToClassForm"); //========= select form
  let data = new FormData(form); //======================== create form data

  let xhr = new XMLHttpRequest(); //======================= create new request
  xhr.onreadystatechange = function () {
    //======== on status ready
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      if (this.response == "Student Insert SUCCESS") {
        document.getElementById("AddStudentStatus").style.display = "block";

        //===== show li in the list =====
        DataToAdd = document.getElementById("AddStudentToClassID");
        DataToAdd = DataToAdd.options[DataToAdd.selectedIndex].text; // text of selected option
        const nodea = document.createElement("a");
        const nodeli = document.createElement("li");
        const nodediv = document.createElement("div");
        const textnode = document.createTextNode(DataToAdd);
        nodediv.appendChild(textnode);
        nodediv.setAttribute("class", "subjectname col-8");
        // nodediv.classList.add('subjectname');
        nodea.appendChild(nodediv);
        nodeli.appendChild(nodea);
        console.log(nodeli);
        document.getElementById("StudentList").appendChild(nodeli);
        //===== show li in the list =====

        //===== clear input box =====
        document.getElementById("AddStudentToClassID").value = "";
        //===== clear input box =====

        //===== set time to refresh ======
        setTimeout(() => {
          window.location.reload();
        }, 3000);
        //===== set time to refresh ======
      } else if (this.response == "Student Already Added") {
        document.getElementById("AddStudentStatus").style.display = "block";
        document.getElementById(
          "AddStudentStatus"
        ).firstElementChild.innerHTML = "Student Already Added to this class";
      } else if (this.response == "POST ERROR") {
        document.getElementById("AddStudentStatus").style.display = "block";
        document.getElementById(
          "AddStudentStatus"
        ).firstElementChild.innerHTML = "POST ERROR";
      } else {
        document.getElementById("AddStudentStatus").style.display = "block";
        document.getElementById(
          "AddStudentStatus"
        ).firstElementChild.innerHTML = "Unknown Error";
      }
    }
  };

  xhr.open("POST", "submit/process_Student.php"); //==================== Open

  xhr.send(data); //======== send data

  return false;
}
// ================ Add Student To Class ===============

// ============================= Delet Student ===========================================

function DeletStudent(StudentID, ClassID) {
  let xhr = new XMLHttpRequest(); //======================= create new request
  xhr.onreadystatechange = function () {
    //======== on status ready
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      theStudentIDToRemoveDiv = "TheStudent" + StudentID;
      console.log(theStudentIDToRemoveDiv);
      document.getElementById(theStudentIDToRemoveDiv).remove();
    }
  };

  xhr.open("POST", "submit/process_Student.php"); //==================== Open
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //for POST method only
  data = "DeletStudent=" + StudentID + "&ClassID=" + ClassID;
  xhr.send(data); //======== send data

  return false;
}
// ================ Delet Student===============

/*===================================================================================================
===================================== Student =======================================================
===================================================================================================*/

/*===================================================================================================
========================================== Dark Theme ===============================================
===================================================================================================*/

function settheme(darktheme) {
  // upload data

  let xhr = new XMLHttpRequest(); //======================= create new request
  xhr.onreadystatechange = function () {
    //======== on status ready
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      // if (this.response == "success insert") {
      //   document.getElementById("AddClassStatus").style.display = "block";
      // }
    }
  };
  xhr.open("POST", "submit/thecookie.php"); //==================== Open

  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //for POST method only

  let data = "Dark=" + darktheme; //======================== create form data
  xhr.send(data); //======== send data

  return false;
}

/*===================================================================================================
========================================== Dark Theme ===============================================
===================================================================================================*/

// ================ POST request with form ===============
function SaveStudentResult() {
  console.log("SaveStudentResult");
  // upload data
  var form = document.getElementById("SaveStudentResult"); //========= select form
  let data = new FormData(form); //======================== create form data

  let xhr = new XMLHttpRequest(); //======================= create new request

  //======================= on status ready ===============================
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);

      if (this.response == "Saved success") {
        document.getElementById("SaveResultStatus").parentElement.style.display = "block";
        document.getElementById("SaveResultStatus").innerHTML =
          "Marks Saved successfully";
      } else if (this.response == "Unknown Error") {
        document.getElementById("SaveResultStatus").style.display = "block";
        document.getElementById("SaveResultStatus").innerHTML =
          "Unknown Error";
      } else {
        // document.getElementById("SaveResultStatus").style.display = "block";
        // document.getElementById("SaveResultStatus").firstElementChild.innerHTML =
        //   "Unknown Error";
      }
    }
  };

  //======================= on status ready ===============================
  xhr.open("POST", "submit/SaveStudentResult.php"); //==================== Open
  xhr.send(data); //======== send data
  return false;
}
// ================ POST request with form ===============
