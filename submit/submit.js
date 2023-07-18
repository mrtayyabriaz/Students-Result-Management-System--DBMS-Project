// ===================== Signup =====================
function Signup() {
  // upload data
  var form = document.getElementById("Signup_form"); //========= select form
  let data = new FormData(form); //======================== create form data

  let xhr = new XMLHttpRequest(); //======================= create new request
  xhr.onreadystatechange = function () {
    //======== on status ready
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      document.getElementById("Signup_status").innerHTML = this.response;
    }
  };

  xhr.open("POST", "submit/process_Signup.php"); //==================== Open

  xhr.send(data); //======== send data

  return false;
}

// ===================== Signup =====================

// ===================== Login =====================
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
    }
  };

  xhr.open("POST", "submit/process_login.php"); //==================== Open

  xhr.send(data); //======== send data

  return false;
}

// ===================== Login =====================












// =============================== Class =============================

// ================ Add ===============
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
        const node = document.createElement("li");
        const textnode = document.createTextNode(DataToAdd);
        node.appendChild(textnode);
        document.getElementById("classlist").appendChild(node);
        //===== show li in the list =====

        //===== clear input box =====
        document.getElementById("AddClassName").value = "";
        //===== clear input box =====
      }
    }
  };

  xhr.open("POST", "submit/classes.php"); //==================== Open

  xhr.send(data); //======== send data

  return false;
}

// =============================== Class =============================









// =============================== Subjects =============================

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
        const node = document.createElement("li");
        const textnode = document.createTextNode(DataToAdd);
        node.appendChild(textnode);
        document.getElementById("classlist").appendChild(node);
        //===== show li in the list =====
        
        //===== clear input box =====
        document.getElementById("AddSubjectName").value = "";
        //===== clear input box =====
      }else{
        document.getElementById("AddSubjectStatus").style.display = "block";
        document.getElementById("AddSubjectStatus").innerHTML = "Unknown Error";
      }
    }
  };

  xhr.open("POST", "submit/Subjects.php"); //==================== Open
  
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
        // console.log(DataToAdd.options[DataToAdd.selectedIndex].text);
        DataToAdd = DataToAdd.options[DataToAdd.selectedIndex].text; // text of selected option 
        const node = document.createElement("li");
        const textnode = document.createTextNode(DataToAdd);
        node.appendChild(textnode);
        document.getElementById("classlist").appendChild(node);
        //===== show li in the list =====
        
        //===== clear input box =====
        document.getElementById("AddSubjectToClassID").value = "";
        //===== clear input box =====
      }else{
        document.getElementById("AddSubjectStatus").style.display = "block";
        document.getElementById("AddSubjectStatus").innerHTML = "Unknown Error";
      }
    }
  };

  xhr.open("POST", "submit/Subjects.php"); //==================== Open
  
  xhr.send(data); //======== send data
  
  return false;
}
// ================ Add Subject To Class ===============

// =============================== Subjects =============================









// =============================== Dark Theme =============================

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

// =============================== Class =============================
