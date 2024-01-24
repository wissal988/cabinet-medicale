const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");

registerButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

loginButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});
modeSwitch.addEventListener("click", ()=>{
        body.classList.toggle("dark");

        if(body.classList.contains("dark")){
            modeText.innerText = "Mode sombre";

        }else{
            modeText.innerText = "Mode clair";
        }
    });