let showpass = (tex) => {
  let pas = document.getElementById("password");
  if (pas.type == "password") {
    pas.type = "text";
  } else if (pas.type == "text") {
    pas.type = "password";
  }

  if (tex.innerText == "Hide") {
    tex.innerText = "show";
    document.getElementById("showicon").classList.toggle("fa-eye-slash");
    document.getElementById("showicon").classList.toggle("fa-eye");
  } else if (tex.innerText == "show") {
    tex.innerText = "Hide";
    document.getElementById("showicon").classList.toggle("fa-eye");

    document.getElementById("showicon").classList.toggle("fa-eye-slash");
  }
  // tex.innerText="Hide";
};

//=========== remove elements =============
function remove(elem) {
  elem.remove();
}
function hide(elem) {
  elem.style.display = "none";
}
//=========== remove elements =============

//================= dark mood ==================
function ChangeTheme(thetheme) {
  if (thetheme == "Dark" || thetheme == "toogle") {

    const darkmood = document.getElementsByClassName("dark-theme");
    for (let i = 0; i < darkmood.length; i++) {
      darkmood[i].classList.toggle("dark-mood");
    }

    const darkmoodlight = document.getElementsByClassName("dark-theme-light");
    for (let i = 0; i < darkmoodlight.length; i++) {
      darkmoodlight[i].classList.toggle("dark-mood-light");
    }

    const ObjectBackgroundDark = document.getElementsByClassName("ObjectBackground");
    for (let i = 0; i < ObjectBackgroundDark.length; i++) {
      ObjectBackgroundDark[i].classList.toggle("ObjectBackgroundDark");
    }

    // ========== nevbar =========
    const nev = document.getElementById("nev-dark-mood");
    nev.classList.toggle("dark-mood-light");
    nev.classList.toggle("navbar-light");
    nev.classList.toggle("navbar-dark");

    const dropdark = document.getElementsByClassName("dropdown-item");
    for (let i = 0; i < dropdark.length; i++) {
      dropdark[i].classList.toggle("dark-mood-light");
    }
    const dropmenudark = document.getElementsByClassName("dropdown-menu");
    for (let i = 0; i < dropmenudark.length; i++) {
      dropmenudark[i].classList.toggle("dark-mood-light");
    }

    const nevlinkdarkmood = document.getElementsByClassName("nav-link active");
    for (let i = 0; i < nevlinkdarkmood.length; i++) {
      nevlinkdarkmood[i].classList.toggle("dark-mood-light");
    }
    // ========== logo =========
    document.getElementById("main-logo").classList.toggle("inverted");
    // ========== logo =========

    // ========== nevbar =========

    //=========== icon ===========
    sun = document.getElementById("sun");
    sun.classList.toggle("d-none");
    moon = document.getElementById("moon");
    moon.classList.toggle("d-none");
    //=========== icon ===========

    darktheme = darkmood[0].classList.contains("dark-mood");
    // console.log("Element" + darktheme);
  }

  if (thetheme == "toogle") {
    //======= set cookie to change theme on all pages ==========
    settheme(darktheme);
    //======== set cookie to change theme on all pages ==========
  }
}

//================= dark mood ==================
