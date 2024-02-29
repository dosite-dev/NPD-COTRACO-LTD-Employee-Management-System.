function toggleMoreInfo() {
    var add_employee = document.getElementById("add");
    add_employee.style.display = add_employee.style.display === "none" ? "block" : "none";
    var form_employee = document.getElementById("form");
    form_employee.style.marginTop = form_employee.style.marginTop === "" ? "30px" : "";
    
}